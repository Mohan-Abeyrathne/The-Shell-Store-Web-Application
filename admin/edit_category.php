<?php
if(isset($_GET['edit_category'])){
    $edit_category=$_GET['edit_category'];

    $get_cat = "SELECT * FROM `categories` WHERE
    category_id=$edit_category";

    $result_cat = mysqli_query($con,$get_cat);
    $row=mysqli_fetch_assoc($result_cat);
    $cat_title=$row['category_title'];
}

if(isset($_POST['edit_cat'])){
    $category_title=$_POST['category_title'];

    $update_cat="UPDATE `categories` SET category_title='$category_title'
    WHERE category_id=$edit_category";

    $run_update=mysqli_query($con,$update_cat);
    if($run_update){
        echo "<script>alert('Successfully Ediited!')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
        exit();
    }
}

?>



<div class="container mt-3">
    <h1 class="text-center text-success">Edit Category</h1>
    <form action="" method="post" class=" text-center">
        <div class="form-outine mb-4 w-50 m-auto">
        <label for="cat_title" class="form-lable">Category Title</label>
        <input type="text" name="category_title" id="category_title" class="form-control" required
        value="<?php echo $cat_title; ?>">
        </div>
        <input type="submit" value="Update" class="btn btn-primary px-3 mb-3" name="edit_cat">
    </form>
</div>