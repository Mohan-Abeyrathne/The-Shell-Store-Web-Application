<!-- connect db file -->
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
    <title>Hello, <?php echo $_SESSION['username']?>!</title>

    <!-- bootsrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
    <!-- first section -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container-fluid">
            <img src="./images/logo.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../display_all.php">Products</a>
                </li>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="profile.php">My Account</a>
                </li>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
                </li>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i>
                    <sup class="cart-count">
                    <?php cart_item(); ?>
                    </sup></a>
                </li>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Total: Rs.<?php total_cart_price(); ?>/=</a>
                </li>
            </ul>
            <form class="d-flex" action="../search_product.php" method="get">
                <input class="form-control me-2" name="search_data" type="search" placeholder="Search" aria-label="Search">
                <!-- <button class="btn btn-outline-light" type="submit">
                    Search
                </button> -->
                <input type="submit" name="search_data_product" value="Search" class="btn btn-outline-light">
            </form>
            </div>
        </div>
    </nav>

    <!-- cart function -->
    <?php 
    cart();

    ?>

    <!-- section 2 -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm border-bottom">
        <ul class="navbar-nav me-auto">
        
        <?php 
        if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='profile.php'>Welcome ".$_SESSION['username']."!</a>
        </li>";
        }

        if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='user_loging.php'>Login</a>
        </li>";
        }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
        }
        
        ?>
        
        </ul>
    </nav>

    <!-- section 3 -->
    <div class="bg-light p-5">
        <h2 class="text-center">The SHell Store</h2>
        <p class="text-center"><Big>The Modern & Minimalist</Big> Choice Discover nature’s most 
            intricate sculptures. We specialize in premium, responsibly sourced seashells delivered with care 
            to collectors and coastal enthusiasts worldwide.</p>
    </div>

    <!-- section 4 -->

    <div class="row p-0">
        <div class="col-md-2 py-2">
            <ul class="navbar-nav bg-light text-center">
                <li class="nav-item bg-primary">
                <a class="nav-link text-light" href="#"><h4>My Profile</h4></a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-primary" href="profile.php">Pending orders</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-primary" href="profile.php?edit_account">Edit Account</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-primary" href="profile.php?my_orders">My Orders</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-primary" href="#">Delete Account</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-primary" href="logout.php">Logout</a>
                </li>
            </ul>

        </div>

        <div class="col-md-10 py-2 text-center">
            <?php 
            get_user_order_details();
            if(isset($_GET['edit_account'])){
                include('edit_account.php');
            }
            if(isset($_GET['my_orders'])){
                include('user_order.php');
            }
            ?>
        </div>
    </div>





    <!-- last section - footer-->
    <?php
    include("../includes/footer.php")
    ?>


    </div>

    <!-- bootsrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</body>
</html>