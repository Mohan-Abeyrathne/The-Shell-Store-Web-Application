<!-- connect db file -->
<?php
include('../includes/connect.php');
include_once('../functions/common_function.php');
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];


}

//getting total items,price
$ip=getUserIpAddr();
$total_price=0;

$cart_query_price="SELECT * FROM `cart_details` WHERE
ip_address='$ip'";

$result_cart_price=mysqli_query($con,$cart_query_price);
$invoice_number=mt_rand();
$status='pending';
$count_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];

    $quantity_of_product=$row_price['quantity'];
    if($quantity_of_product==0){
        $quantity_of_product=1; 
        }

    $select_products="SELECT * FROM `products` WHERE
    product_id=$product_id";
    $result_price=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_price)){
    $product_price_val = $row_product_price['product_price']; 
    $total_price += ($product_price_val * $quantity_of_product); 
}

}

// getting qnty form cart
$get_cart="SELECT * FROM `cart_details`";
$run_cart=mysqli_query($con,$get_cart);

$get_item_quantity=mysqli_fetch_array($run_cart);
$subtotal=$total_price; 


$insert_orders="INSERT INTO `user_orders` (user_id,amount_due,invoice_number,
total_products,order_date,order_status) VALUES
($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";

$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    echo "<script>alert('Order Added!')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

//pending orders
$run_cart_query="SELECT * FROM `cart_details` WHERE ip_address='$ip'";
$run_cart_loop = mysqli_query($con, $run_cart_query);

while($row_cart = mysqli_fetch_array($run_cart_loop)){
    $product_id = $row_cart['product_id'];
    $product_quantity = $row_cart['quantity'];
    if($product_quantity == 0) { $product_quantity = 1; }

    $insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) 
                                VALUES ($user_id, $invoice_number, $product_id, $product_quantity, '$status')";
    mysqli_query($con, $insert_pending_orders);
}

//deleet items form cart

$empty_cart="DELETE FROM `cart_details` WHERE
ip_address='$ip'";

$result_delete=mysqli_query($con,$empty_cart);


?>
