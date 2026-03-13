<?php
include('../includes/connect.php');

if(isset($_POST['add_product'])){

    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //access images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];

    //access image tmp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];

    //check empty condition
    if($product_title=='' or $description=='' or $product_keywords==''
    or $product_category=='' or $product_price=='' or $product_image1==''
    or $product_image2==''){
        echo"<script>alert('Please fill all the fields!')</script>";
        

    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");

        //insert query
        $add_products="INSERT INTO `products`(product_title,product_description,product_keywords,
        category_id,product_image1,product_image2,product_price,date,status) 
        VALUES('$product_title','$description','$product_keywords','$product_category',
        '$product_image1','$product_image2',$product_price,NOW(),'$product_status')";

        $result_query=mysqli_query($con,$add_products);
        if($result_query){
            echo"<script>alert('Successfully added!')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        exit();

        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products-Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../css/style.css">


</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Add Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="Product title" class="form-lable">Product Title:</lable>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required>
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="Description" class="form-lable">Description:</lable>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required>
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_keywords" class="form-lable">Product keywords:</lable>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required>
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a category</option>
                    <?php 
                        $select_query="SELECT * FROM `categories`";
                        $result_query = mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo"<option value='$category_id'>$category_title</option>";
                        }
                    
                    ?>
                    <!-- <option value="" disabled>Select a category</option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option> -->
                </select>
            </div>
            <!-- images -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_image1" class="form-lable">Image 1:</lable>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_image2" class="form-lable">Image 2:</lable>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required>
            </div>
            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <lable for="product_price" class="form-lable">Product price:</lable>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required>
            </div>
            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="add_product" class="btn btn-info mb-3 px-3" value="Add Product">
            </div>
        </form>
    </div>
    







    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>