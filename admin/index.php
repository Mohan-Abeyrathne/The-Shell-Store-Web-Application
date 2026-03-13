<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

if(!isset($_SESSION['admin_name'])){
    echo "<script>window.open('../user/user_loging.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    
    <style>
        body{
            overflow-x: hidden;
        }
        .prduct_img{
            width: 20%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome <?php echo $_SESSION['admin_name']; ?></a>
                    </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="bg-light">
            <h3 class="text-center p-4 shadow-sm border-bottom">Manage Details</h3>
        </div>

        <div class="row m-2">
            <div class="col-md-12 bg-light p-1 d-flex align-items-center">
                <div class="p-5">
                    <a href="#"><img src="../images/admin.png" alt="" class="admin-image"></a>
                    <p class="text-dark text-center"><?php echo $_SESSION['admin_name']; ?></p>
                </div>
                <div class="button text-center">
                    <button class="my-3 btn-lg btn-outline-success"><a href="add_products.php" class="nav-link text-dark">Add Products</a></button>
                    <button class="my-3 btn-lg btn-outline-primary"><a href="index.php?view_products" class="nav-link text-dark">View Products</a></button>
                    <button class="my-3 btn-lg btn-outline-success"><a href="index.php?add_category" class="nav-link text-dark">Add Categories</a></button>
                    <button class="my-3 btn-lg btn-outline-primary"><a href="index.php?view_categories" class="nav-link text-dark">View Categories</a></button>
                    <button class="my-3 btn-lg btn-outline-secondary"><a href="index.php?list_orders" class="nav-link text-dark">Orders</a></button>
                    <button class="my-3 btn-lg btn-outline-warning"><a href="index.php?list_payment" class="nav-link text-dark">Payments</a></button>
                    <button class="my-3 btn-lg btn-outline-info"><a href="index.php?list_users" class="nav-link text-dark">Users</a></button>
                    <button class="my-3 btn-lg btn-outline-danger"><a href="logout.php" class="nav-link text-dark">Logout</a></button>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <?php 
            if(isset($_GET['add_category'])){
                include('add_categories.php');

            }
            if(isset($_GET['view_products'])){
                include('view_products.php');

            }
        
            if(isset($_GET['edit_product'])){
                include('edit_product.php');

            }

            if(isset($_GET['delete_product'])){
                include('delete_product.php');

            }

            if(isset($_GET['view_categories'])){
                include('view_categories.php');

            }
            
            if(isset($_GET['edit_category'])){
                include('edit_category.php');

            }
            
            if(isset($_GET['delete_category'])){
                include('delete_category.php');

            }
            
            if(isset($_GET['list_orders'])){
                include('list_orders.php');

            }
            
            if(isset($_GET['delete_orders'])){
                include('delete_orders.php');

            }
            
            if(isset($_GET['list_payment'])){
                include('list_payment.php');

            }

            if(isset($_GET['delete_payment'])){
                include('delete_payment.php');

            }

            if(isset($_GET['list_users'])){
                include('list_users.php');

            }

            if(isset($_GET['delete_users'])){
                include('delete_users.php');

            }

            ?>
        </div>

    <?php
    include("../includes/footer.php")
    ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>