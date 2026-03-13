<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
        <!-- bootsrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="./css/style.css">


        <style>
    .background-div {
        position: relative; /* Necessary to contain the background layer */
        min-height: 100vh;  /* Ensures it covers the full screen height */
        z-index: 1;         /* Keeps content above the background layer */
    }

    .background-div::before {
        content: "";
        position: absolute;
        top: 0; 
        left: 0; 
        right: 0; 
        bottom: 0;
        background-image: url('../images/bg-log-image.png'); /* Replace with your image URL */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.5;      /* Adjust this value (0.1 to 1.0) to change transparency */
        z-index: -1;       /* Places the image behind your form and text */
    }

    /* Optional: Add a card look to the form for better readability */
form {
    background: rgba(255, 255, 255, 0); /* Semi-transparent white */
    backdrop-filter: blur(2px);         /* Frosted glass blur effect */
    -webkit-backdrop-filter: blur(15px); /* Safari support */
    
    border: 1px solid rgba(255, 255, 255, 0.3); /* Subtle "glass edge" */
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.3); /* Depth shadow */
}

    </style>
</head>
<body>
    <div class="background-div p-5">
    <div class="container-fluid my-3">
        <h2 class="text-center">Hey there!</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-lable1 mb-1">Username: </label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter username" autocomplete="off" name="user_username" required>
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-lable1 mb-1">Email: </label>
                        <input type="text" id="user_email" class="form-control" placeholder="Enter email" autocomplete="off" name="user_email" required>
                    </div>
                    <!-- pass -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-lable1 mb-1">Password: </label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter password" autocomplete="off" name="user_password" required>
                    </div>
                    <!-- confirm pass -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-lable1 mb-1">Password: </label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" name="conf_user_password" required>
                    </div>
                    <!-- address -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-lable1 mb-1">Address: </label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter Address" autocomplete="off" name="user_address" required>
                    </div>
                    <!-- conact -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-lable1 mb-1">Contact No: </label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter contact No" autocomplete="off" name="user_contact" required>
                    </div>
                    <div class="text-center mt-4 pt-2">
                        <input type="submit" value="Register" class="text-light bg-info py-2 px-3 border-light rounded-3" name="user_register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="user_loging.php" class="text-danger"> Login</a></p>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

</body>
</html>

<?php 
    //insert into db
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getUserIpAddr();

//select data to check
$select_query="SELECT * FROM `user_table` WHERE
username='$user_username' OR
user_email='$user_email'";
$result=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
if($row_count>0){
    echo "<script>alert('Username or email already exist!')</script>";
}
else if($user_password!=$conf_user_password){
    echo "<script>alert('Passwords do not match!')</script>";
    echo "<script>window.open('user_registration.php','_self')</script>";
}

else{

    $insert_query="INSERT INTO `user_table` (username,user_email,
    user_password,user_ip,user_address,user_mobile)
    VALUES ('$user_username','$user_email','$hash_password',
    '$user_ip','$user_address',$user_contact)";

    $result_query = mysqli_query($con,$insert_query);
    if($result_query){
        echo "<script>alert('Registration successful!')</script>";
    }
    else{
        die(mysqli_error($con));
    }
}

// selecting cart item
$select_cart_item="SELECT * FROM `cart_details` WHERE
ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_item);
$row_count=mysqli_num_rows($result_cart);
if($row_count>0){
    $_SESSION['username']= $user_username;
        echo "<script>alert('You have items in cart!')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";

}else{
            echo "<script>window.open('../index.php','_self')</script>";

}

}




?>