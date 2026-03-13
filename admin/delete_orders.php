<?php
if(isset($_GET['delete_orders'])){

    $delete_id = intval($_GET['delete_orders']);

    $delete_query = "DELETE FROM `user_orders` WHERE order_id = $delete_id";
    $run_delete = mysqli_query($con, $delete_query);

    if($run_delete){
        echo "<script>alert('Order deleted successfully!')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
        exit();
    }
}
?>