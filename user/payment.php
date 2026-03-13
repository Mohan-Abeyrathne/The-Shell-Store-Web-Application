<!-- connect db file -->
<?php
include('../includes/connect.php');
include_once('../functions/common_function.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    
    <!-- bootsrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="./css/style.css">

    <style>
        .pay_img{
            width: 60%;
            margin: auto;
            display: block;
        }
    </style>
</head>
<body>
    <!-- user id php -->
    <?php 

    $ip= getUserIpAddr();
    $get_user="SELECT * FROM `user_table` WHERE
    user_ip='$ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    
    ?>
    <div class="container">
        <h2 class="text-center text-dark">Payment info</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <a href="#" target="_blank"><img class="pay_img" src="../images/Visa-Logo-Free-Download-PNG - Copy.png" alt=""></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>" target="_blank"><h2 class="text-center">Click Here to Pay!</h2></a>
            </div>
        </div>

        <div class="text-center pt-5">
            <button class='bg-secondary px-3 py-2 border-0'><a href='../index.php' class='text-light text-decoration-none'>back to home</a></button>
        </div>
    
    </div>
</body>
</html>