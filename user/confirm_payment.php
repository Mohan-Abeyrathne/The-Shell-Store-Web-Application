<!-- connect db file -->
<?php

include('../includes/connect.php');
session_start(); 

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];

    $select_data="SELECT * FROM `user_orders`
    WHERE order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
        $invoice_number=$row_fetch['invoice_number'];
        $amount_due=$row_fetch['amount_due'];
    
}

if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number']; 
    $amount = $_POST['amount'];                 
    $payment_mode = $_POST['payment_mode'];
    
    
    $insert_query = "INSERT INTO `user_payments` (order_id, invoice_number, amount, payment_mode) 
                    VALUES ($order_id, $invoice_number, $amount, '$payment_mode')";
    $result = mysqli_query($con, $insert_query);

    if($result){
        $update_query = "UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
        mysqli_query($con, $update_query);
        
        echo "<script>alert('Payment Successfully completed!')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
        <!-- bootsrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="./css/style.css">

</head>
<body class="bg-light">
    
    <div class="container my-5">
        <h1 class="text-center text-success w-50 m-auto">Conirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number"
                value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-primary">Amount:</label>
                <input type="text" class="form-control w-50 m-auto" name="amount"
                value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
            <select name="payment_mode" class="form-select w-50 m-auto">
                <option disabled >Select Payment Option</option>
                <option >Bank Card</option>
                <option >Cash on Delivery</option>
                <option >Pay offline</option>
            </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
    
</body>
</html>