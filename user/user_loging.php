<?php
include('../includes/connect.php');
include_once('../functions/common_function.php');
@session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container-fluid my-5">
        <h2 class="text-center">Hey there!</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-lable1 mb-1">Username: </label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter username" autocomplete="off" name="user_username" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-lable1 mb-1">Password: </label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter password" autocomplete="off" name="user_password" required>
                    </div>

                    <div class="text-center mt-4 pt-2">
                        <input type="submit" value="Login" class="text-light bg-info py-2 px-3 border-light rounded-3" name="user_login">
                        <p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="./user_registration.php" class="text-danger"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 

if(isset($_POST['user_login'])){

    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    // admin
    $select_admin = "SELECT * FROM `admin_table` WHERE admin_name='$user_username'";
    $result_admin = mysqli_query($con, $select_admin);
    $admin_count = mysqli_num_rows($result_admin);

    if($admin_count > 0){
        $admin_data = mysqli_fetch_assoc($result_admin);
        if(password_verify($user_password, $admin_data['admin_password'])){
            $_SESSION['admin_name'] = $user_username;
            echo "<script>alert('Welcome Admin!')</script>";
            echo "<script>window.open('../admin/index.php','_self')</script>";
            exit();
        }
    }

    // user
    $select_query="SELECT * FROM `user_table` WHERE username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $ip=getUserIpAddr();

    //cart item
    $select_query_cart="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);

    if($row_count>0){
        if(password_verify($user_password,$row_data['user_password'])){
            $_SESSION['username']= $user_username;
            
            //cart vs homepage redirect
            if($row_count==1 and $row_count_cart==0){
                echo "<script>alert('Login Successful!')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }else{
                echo "<script>alert('Login successful!')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid login!')</script>";
        }
    }else{
        echo "<script>alert('Invalid login!')</script>";
    }
}
?>