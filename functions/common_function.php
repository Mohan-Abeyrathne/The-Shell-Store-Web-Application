<?php
// include connct file
// include('./includes/connect.php');


// getting products
function getproducts(){
    global $con;
    if(!isset($_GET['category'])){
                
                $select_query = "SELECT * FROM `products` ORDER BY rand() LIMIT 0,9";
                $result_query = mysqli_query($con,$select_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title'];
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $product_id=$row['product_id'];

                    echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text fw-bold text-primary'>Rs.$product_price/=</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-light bg-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-outline-info'>View more</a>
                            </div>
                        </div>
                    </div>";
                
                    }
                }

}

// getting all products
function get_all_products(){
    global $con;
                    // check products added or not
                if(!isset($_GET['category'])){
                
                $select_query = "SELECT * FROM `products` ORDER BY rand()";
                $result_query = mysqli_query($con,$select_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title'];
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $product_id=$row['product_id'];

                    echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text fw-bold text-primary''>Rs.$product_price/=</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-light bg-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-outline-info'>View more</a>
                            </div>
                        </div>
                    </div>";
                
                    }
                }
}

// getting unique categories
function get_unique_categories(){
    global $con;
    // getting unique categories
                // check products added or not
                if(isset($_GET['category'])){
                    $category_id = $_GET['category'];
                
                $select_query = "SELECT * FROM `products` WHERE category_id = $category_id";
                $result_query = mysqli_query($con,$select_query);

                $num_of_rows = mysqli_num_rows($result_query);
                if($num_of_rows==0){
                    echo"<h2 class='text-center text-danger'>Currently unavailable!</h2>";
                }

                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $product_id=$row['product_id'];

                    echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text fw-bold text-primary''>Rs.$product_price/=</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-light bg-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-outline-info'>View more</a>
                            </div>
                        </div>
                    </div>";
                
                    }
                }
}

// displaying categories in sidenav
function getcategories(){
    global $con;
                    $select_categories = "SELECT * FROM `categories`";
                $result_categories = mysqli_query($con,$select_categories);
                // $row_data = mysqli_fetch_assoc($result_category);
                // echo $row_data['category_title'];
                while($row_data = mysqli_fetch_assoc($result_categories)){
                    $category_title = $row_data['category_title'];
                    $category_id = $row_data['category_id'];
                    echo "<li class='nav-item bg-light'>
                            <a href='index.php?category=$category_id'class='nav-link text-info'>$category_title</a>
                        </li>";
                }
}

// searching peoducts
function search_product(){
    global $con;
    // check products added or not
                if(isset($_GET['search_data_product'])){
                    $search_data_value = $_GET['search_data'];
                $search_query = "SELECT * FROM `products` WHERE product_keywords LIKE
                '%$search_data_value%'";

                $result_query = mysqli_query($con,$search_query);

                $num_of_rows = mysqli_num_rows($result_query);
                if($num_of_rows==0){
                    echo"<h2 class='text-center text-danger'>No results match!</h2>";
                }

                $result_query = mysqli_query($con,$search_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title'];
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $product_id=$row['product_id'];

                    echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text fw-bold text-primary''>Rs.$product_price/=</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-light bg-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-outline-info'>View more</a>
                            </div>
                        </div>
                    </div>";
                
                        }
                    }
}

// view mmore function
function view_more(){
    global $con;
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
            $product_id=$_GET['product_id'];

                $select_query = "SELECT * FROM `products` WHERE product_id=$product_id";
                $result_query = mysqli_query($con,$select_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title'];
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_image2=$row['product_image2'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $product_id=$row['product_id'];

                    echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text fw-bold text-primary''>Rs.$product_price/=</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-light bg-info'>Add to cart</a>
                                <a href='index.php' class='btn btn-outline-info'>Back to Home</a>
                            </div>
                        </div>
                    </div>

                <div class='col-md-8'>
                <!-- related images -->
                <div class='row'>
                    <div class='col-md-12'>
                        <h3 class='text-primary mb-2'>More Images</h3>
                    </div>
                    <div class='col-md-12 my-1'>
                        <h4 class='card-title text-center text-info'>$product_title</h4>
                        <img src='./admin/product_images/$product_image2' class='card-img-top mb-2' alt='$product_title'>
                        <p class='card-text text-center fs-5 mb-1'>$product_description</p>
                    </div>
                </div>
                </div>";
                
                    }
                }
}
}

// get ip function
function getUserIpAddr()
{
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    //ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //ip pass from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
return $ip;
}

// echo 'User Real IP - ' . getUserIpAddr();

// cart function
function cart(){
    global $con;
if(isset($_GET['add_to_cart'])){

        $ip = getUserIpAddr();
        $get_product_id = $_GET['add_to_cart'];

        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip' AND
        product_id=$get_product_id";
        $result_query = mysqli_query($con,$select_query);

        $num_of_rows = mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo"<script>alert('Already exist in cart!')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }else{
            $add_query = "INSERT INTO `cart_details` (product_id,ip_address,quantity)
            VALUES ($get_product_id,'$ip',0)";
            $result_query = mysqli_query($con,$add_query);
            echo"<script>alert('Item is added to cart!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }

}

// function to get cart item number
function cart_item(){
    global $con;
if(isset($_GET['add_to_cart'])){

        $ip = getUserIpAddr();

        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result_query = mysqli_query($con,$select_query);

        $count_cart_items = mysqli_num_rows($result_query);
        }else{
        $ip = getUserIpAddr();

        $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result_query = mysqli_query($con,$select_query);

        $count_cart_items = mysqli_num_rows($result_query);
        }

        echo $count_cart_items;
    }

    // Total price function

    function total_cart_price(){
        global $con;
        $ip = getUserIpAddr();
        $total=0;

        $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
        $result = mysqli_query($con,$cart_query);

        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];

            $select_products="SELECT * FROM `products` WHERE product_id='$product_id'";
            $result_products = mysqli_query($con,$select_products);

            while($row_product_price=mysqli_fetch_array($result_products)){
                $product_price=array($row_product_price['product_price']);
                $product_values=array_sum($product_price);
                $total += $product_values;

            }
        }
    echo $total;
    }

// geet user order details
function get_user_order_details(){
    global $con;
    $username = $_SESSION['username'];

    $get_details = "SELECT * FROM `user_table`
    WHERE username='$username'";
    $result_query = mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="SELECT * FROM `user_orders` WHERE
                    user_id=$user_id AND order_status='pending'";
                        $result_order_query = mysqli_query($con,$get_orders);
                        $row_count=mysqli_num_rows($result_order_query);
                        if($row_count>0){
                            echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders!</h3>
                            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                        }else{
                            echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>0</span> pending orders!</h3>
                            <p class='text-center'><a href='../index.php' class='text-dark'>Continue Shopping</a></p>";
                        
                        }

                }
            
            }
        }

    }


    }



?>