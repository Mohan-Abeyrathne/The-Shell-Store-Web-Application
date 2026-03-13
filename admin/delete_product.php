<?php
    if(isset($_GET['delete_product'])){
        $del_id=$_GET['delete_product'];
    }

    $del_query="DELETE FROM `products` WHERE
    product_id=$del_id";

    $result_del = mysqli_query($con,$del_query);
    if($result_del){
        echo "<script>alert('Product Deleted!')</script>";
        echo "<script>window.open('./index.php?view_products','_self')</script>";
        exit();

    }


?>