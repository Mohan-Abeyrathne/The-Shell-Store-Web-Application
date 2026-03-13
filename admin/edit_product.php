<?php
if(isset($_GET['edit_product'])){
    $edit_id=$_GET['edit_product'];

    $get_product="SELECT * FROM `products` 
    WHERE product_id=$edit_id";
    $result=mysqli_query($con,$get_product);
    $row = mysqli_fetch_assoc($result);

    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_price = $row['product_price'];

    // fetching dynmic cat 
    $select_category="SELECT * FROM `categories` 
    WHERE category_id=$category_id";
    $result_cat=mysqli_query($con,$select_category);
    if (!$result_cat) {
    die(mysqli_error($con));
}
    $row_cat= mysqli_fetch_assoc($result_cat);
    $category_title=$row_cat['category_title'];
    $category_id=$row_cat['category_id'];
    // echo $category_title;

}



?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-lable">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" required
            value="<?php echo htmlspecialchars($product_title); ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-lable">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" class="form-control" required
            value="<?php echo htmlspecialchars($product_description);?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-lable">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" required 
            value="<?php echo htmlspecialchars($product_keywords);?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-lable">Product Category</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_id?>"><?php echo $category_title?></option>
                <?php 
                    // fetching all cat 
                    $select_category_all="SELECT * FROM `categories`";
                    $result_cat_all=mysqli_query($con,$select_category_all);
                    if (!$result_cat_all) {
                    die(mysqli_error($con));
                }
                    while($row_cat_all= mysqli_fetch_assoc($result_cat_all)){
                        $category_title=$row_cat_all['category_title'];
                        $category_id=$row_cat_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    
                
                ?>
                
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-lable">Product Image 1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required>
            <img src="./product_images/<?php echo $product_image1?>" class="prduct_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-lable">Product Image 2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required>
            <img src="./product_images/<?php echo $product_image2?>" class="prduct_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-lable">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required
            value="<?php echo ($product_price);?>">
        </div>
        <div class="w-50 m-auto">
            <input class="btn btn-info px-3 mb-3" type="submit" name="edit_product" value="Update Product">
        </div>
    </form>
</div>

<!-- edit products -->
<?php 
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    
    $temp_product_image1=$_FILES['product_image1']['tmp_name'];
    $temp_product_image2=$_FILES['product_image2']['tmp_name'];

    if($product_title=='' or$product_desc=='' or $product_keywords=='' or
    $product_category=='' or $product_image1=='' or $product_image2=='' or $product_price==''){
        echo "<script>alert('Please fill all!')</script>";
    }else{
        // Only move files if new ones are selected
    if(!empty($product_image1)){
    move_uploaded_file($temp_product_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_product_image2,"./product_images/$product_image2");

    }

    $run_insert="UPDATE `products` SET product_title='$product_title',
    product_description='$product_desc', product_keywords='$product_keywords',
    category_id=$product_category, product_image1='$product_image1',
    product_image2='$product_image2', product_price=$product_price, date=NOW()
    WHERE product_id=$edit_id";

    $result_run_insert=mysqli_query($con,$run_insert);
    if(!$result_run_insert){
        die(mysqli_error($con));
    }
    
    if($result_run_insert){
        echo "<script>alert('Successfully Added!')</script>";
        echo "<script>window.open('./index.php?view_products','_self')</script>";
        exit();

    }

    }


}


?>