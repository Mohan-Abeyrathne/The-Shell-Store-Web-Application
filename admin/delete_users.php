<?php
if(isset($_GET['delete_users'])){

    $delete_id = intval($_GET['delete_users']);


    $delete_query = "DELETE FROM `user_table` WHERE user_id = $delete_id";
    $run_delete = mysqli_query($con, $delete_query);

    if($run_delete){
        echo "<script>alert('User account deleted successfully!')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
        exit();
    }
}
?>