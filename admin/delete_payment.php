<?php
if(isset($_GET['delete_payment'])){

    $payment_id = intval($_GET['delete_payment']);

    $delete_query = "DELETE FROM `user_payments` WHERE payment_id = $payment_id";
    $run_delete = mysqli_query($con, $delete_query);

    if($run_delete){
        echo "<script>alert('Payment record deleted successfully!')</script>";
        echo "<script>window.open('./index.php?list_payment','_self')</script>";
        exit();
    }
}
?>