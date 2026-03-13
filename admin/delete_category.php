<?php
if(isset($_GET['delete_category'])){
    $category_id = intval($_GET['delete_category']);


    $del_products = "DELETE FROM `products` WHERE category_id = $category_id";
    $run_del_products=mysqli_query($con, $del_products);

    $del_category = "DELETE FROM `categories` WHERE category_id = $category_id";
    $run_del = mysqli_query($con, $del_category);

    if($run_del){  
        echo "<script>alert('Category and associated products deleted!')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
        exit();
    }
}
?>