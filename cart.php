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
    <title>Ecommerce Website - Cart Details</title>

    <!-- bootsrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <style>
        .cart_img{
    width: 80px;
    height: 80px;
    object-fit: contain; 
    /* imgs not get squized */
}
    </style>
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
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="display_all.php">Products</a>
                </li>
                
                <li class="nav-item">
                <a class="nav-link" href="./user/user_registration.php">Register</a>
                </li>
                
                <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
                </li>
                
                <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
                    <sup class="cart-count">
                    <?php cart_item(); ?>
                    </sup></a>
                </li>
                
            </ul>
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
            <a class='nav-link' text-decaration-none href='#'>Welcome Guest</a>
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
<!-- table-cart -->
<div class="containers">
    <div class="row m-2">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            
                <!-- php code for dynmic data -->
                <?php 
                global $con;
                $ip = getUserIpAddr();
                $total=0;

                $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                $result = mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);

                if($result_count>0){
                    echo"<thead>
                            <tr>
                                <th>Product Titlle</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total price</th>
                                <th>Remove</th>
                                <th colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        <tbody>";

                    while($row=mysqli_fetch_array($result)){
                        $product_id=$row['product_id'];
                        $cart_quantity=$row['quantity']; // Get current qty

                        $select_products="SELECT * FROM `products` WHERE product_id='$product_id'";
                        $result_products = mysqli_query($con,$select_products);

                        while($row_product_price=mysqli_fetch_array($result_products)){
                            $price_table=$row_product_price['product_price'];
                            $product_title=$row_product_price['product_title'];
                            $product_image1=$row_product_price['product_image1'];

                            // Calculate subtotal
                            $total += ($price_table * ($cart_quantity > 0 ? $cart_quantity : 1));
                ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                
                    <td><input name="qty[<?php echo $product_id ?>]" type="number" value="<?php echo $cart_quantity ?>" class="text-center form-input w-50"></td>
                    <td><?php echo $price_table ?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                    <td>
                        <input class="px-3 py-2 border-2 mx-3" name="update_cart" type="submit" value="Update cart">
                        <input class="px-3 py-2 border-2 mx-3" name="remove_cart" type="submit" value="Remove cart">
                    </td>
                </tr>
                <?php 
                        }
                    }
                } else {
                    echo "<h2 class='text-center text-danger'>Cart is empty!</h2>";
                }
                ?>
            </tbody>
        </table>

        <?php 
        if(isset($_POST['update_cart'])){
            foreach($_POST['qty'] as $id => $quantity){
                $quantity = intval($quantity);
                $update_cart = "UPDATE `cart_details` SET quantity=$quantity WHERE ip_address='$ip' AND product_id=$id";
                mysqli_query($con, $update_cart);
            }
            echo "<script>window.open('cart.php','_self')</script>";
        }

        if(isset($_POST['remove_cart'])){
            if(isset($_POST['removeitem'])){
                foreach($_POST['removeitem'] as $remove_id){
                    $delete_query = "DELETE FROM `cart_details` WHERE product_id=$remove_id AND ip_address='$ip'";
                    mysqli_query($con, $delete_query);
                }
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
        ?>

        <!-- subtotal -->
        <div class="d-flex mb-3">
            <?php 
            if($result_count>0){
                echo " <h4 class='px-3'>Subtotal: <strong class='text-primary'>Rs. $total/=</strong></h4>
                <input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-info px-3 py-2 border-0 mx-3 text-light'>
                <button class='bg-secondary px-3 py-2 border-0'><a href='./user/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
            } else {
                echo "<input type='submit' value='Continue Shopping' name='continue_shopping' class='bg-info px-3 py-2 border-0 mx-3 text-light'>";
            }

            if(isset($_POST['continue_shopping'])){
                echo "<script>window.open('index.php','_self')</script>";
            }
            ?>
        </div>
        </form>
    </div>
</div>

</form>

<!-- remove item -->
<?php 
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
    if (!empty($_POST['removeitem'])){
    foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query="DELETE FROM `cart_details` WHERE product_id=$remove_id";
        $run_del=mysqli_query($con,$delete_query);
        echo "<script>window.open('cart.php','_self')</script>";
    }
    }else{
        echo "<script>alert('Select at least one item!');</script>";
    }

    }
}

echo remove_cart_item();

?>



    <!-- last section - footer-->
    <?php
    include("./includes/footer.php")
    ?>


    </div>

    <!-- bootsrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
</body>
</html>