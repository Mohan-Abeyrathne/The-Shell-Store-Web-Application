<!-- connect db file -->
<?php

include('./includes/connect.php');
include('functions/common_function.php');
session_start(); 

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>

    <!-- bootsrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="./css/style.css">

    <style>
.horizontal-wrapper {
    display: flex;
    overflow: hidden;
    user-select: none;
}

.horizontal-content {
    display: flex;
    white-space: nowrap;
    animation: scroll-glide 25s linear infinite;
}

.horizontal-content span {
    font-size: 1.7rem;
    font-weight: 300;
    letter-spacing: 1px;
    padding-right: 50px;
    color: #3d4c8f;
}

.horizontal-content big {
    font-weight: 700;
    text-transform: uppercase;
    color: #0dcef0; 
}

@keyframes scroll-glide {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
}


.horizontal-wrapper:hover .horizontal-content {
    animation-play-state: paused;
    cursor: pointer;
}

.nsbm-discount-bar {
    background: #000;
    color: #fff;
    font-size: 0.9rem;
    letter-spacing: 1px;
    text-transform: uppercase;
}
.nsbm-discount-bar strong {
    color: #0dcaf0;
}


    </style>
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
                <a class="btn btn-outline-light mx-2" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="display_all.php">Products</a>
                </li>
                
                <?php
                    if(isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                <a class='nav-link' href='./user/profile.php'>My Account</a>
                </li>";
                    }else{
                        echo "<li class='nav-item'>
                <a class='nav-link' href='./user/user_registration.php'>Register</a>
                </li>";
                    }
                ?>
                
                
                <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
                </li>
                
                <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
                    <sup class="cart-count">
                    <?php cart_item(); ?>
                    </sup></a>
                
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Total: Rs.<?php total_cart_price(); ?>/=</a>
                </li>
            </ul>
            <form class="d-flex" action="search_product.php" method="get">
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
            <a class='nav-link' href='./user/profile.php'>Welcome ".$_SESSION['username']."!</a>
        </li>";
        }

        if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a class='nav-link' href='./user/user_loging.php'>Login</a>
        </li>";
        }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='./user/logout.php'>Logout</a>
        </li>";
        }
        
        ?>
        
        </ul>
    </nav>

    <!-- section 3 -->
<!-- section header -->
<div class="bg-light py-4 overflow-hidden border-top border-bottom">
    <div class="horizontal-wrapper">
        <div class="horizontal-content">
<span>
    <big>THE SHELL STORE</big> &nbsp; | &nbsp; 
    <i>Sculpted by the Sea, Curated for the Soul.</i> &nbsp; | &nbsp; 
    <b>Sustainably Sourced</b> &nbsp; | &nbsp; 
    Premium Coastal Decor for Modern Spaces &nbsp; | &nbsp; 
</span>
<span>
    <big>THE SHELL STORE</big> &nbsp; | &nbsp; 
    <i>Sculpted by the Sea, Curated for the Soul.</i> &nbsp; | &nbsp; 
    <b>Sustainably Sourced</b> &nbsp; | &nbsp; 
    Premium Coastal Decor for Modern Spaces &nbsp; | &nbsp; 
</span>
        </div>
    </div>
</div>
<div class="nsbm-discount-bar text-center py-2">
    <span class="badge bg-info me-2">OFFER</span> 
    Exclusive <strong>10% DISCOUNT</strong> for <strong>NSBM COMMUNITY</strong>
</div>


    <!-- section 4 -->
    <div class="row m-2">
        <div class="col-md-2 bg-light p-0">
            <!-- sidenav -->
            <!-- categories to be displayed -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                </li>

                <?php 
                getcategories();


                ?>
            </ul>
            <!-- categories to be displayed -->
            <!-- <ul class="navbar-nav me-auto text-center">
            //     <li class="nav-item bg-info">
            //         <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            //     </li>
            //     <li class="nav-item bg-light">
            //         <a href="#" class="nav-link text-info">Category-1</a>
            //     </li>
            //     <li class="nav-item bg-light">
            //         <a href="#" class="nav-link text-info">Category-2</a>
            //     </li>
            //     <li class="nav-item bg-light">
            //         <a href="#" class="nav-link text-info">Category-3</a>
            //     </li>
            // </ul> -->
        </div>
        <div class="col-md-10">
            <!-- products -->
            <div class="row px-1">
                <!-- fetching products -->
                <?php 
                getproducts();

                get_unique_categories();

                // $ip = getUserIpAddr();
                // echo 'User Real IP - ' . $ip;

                
                ?>
                <!-- <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./images/shell1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-outline-light bg-info">Add to cart</a>
                            <a href="#" class="btn btn-outline-info">View more</a>
                        </div>
                    </div>
                </div> -->
                
            </div>
        </div>


    </div>







    <!-- last section - footer-->
    <?php
    include("./includes/footer.php")
    ?>



    <!-- bootsrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</body>
</html>