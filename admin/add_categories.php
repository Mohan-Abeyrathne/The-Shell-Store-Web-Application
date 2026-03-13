<?php
include('../includes/connect.php');
if(isset($_POST['add_cat'])){
    $category_title=$_POST['cat_title'];

    // select data from datbase
    $select_query = "SELECT * FROM `categories` WHERE category_title='$category_title' ";
    $result_select=mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_select);
    if($number>0){
                echo "<script>alert('This category is already existed!')</script>";

    }else{
    $insert_query = "INSERT INTO `categories` (category_title) 
                    VALUES  ('$category_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Category has been added successfully!')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
        exit();

    }

    }
}

?>

<h2 class="text-center">Add Categories!</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="addon-wrapping">
            <i class="fa-solid fa fa-plus"></i>
        </span>
        <input type="text" class="form-control" required placeholder="Add Here!" name="cat_title" aria-describedby="addon-wrapping">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-1 p-2 my-2" name="add_cat" value="Add Categories">
    </div>
</form>