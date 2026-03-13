<?php
include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
</head>
<body>
    <h3 class="text-center text-success">All Products</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-primary text-light">
            <tr class="text-center">
                <th>SI NO</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-light text-dark">
            <?php 
            $get_products = "SELECT * FROM `products`";
            $result = mysqli_query($con, $get_products);
            $number = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $number++;
            ?>
                
            <tr class="text-center">   
                <td><?php echo $number; ?></td>
                <td><?php echo $product_title; ?></td>
                <td><img src='./product_images/<?php echo $product_image1; ?>' class='product_img' style='width:50px; height:50px; object-fit:contain;'></td>
                <td><?php echo $product_price; ?>/=</td>
                <td>
                    <?php 
                    $get_count = "SELECT SUM(quantity) AS total_sold FROM `orders_pending` WHERE product_id=$product_id";
                    $result_count = mysqli_query($con, $get_count);
                    $row_data = mysqli_fetch_assoc($result_count);
                    $total_sold = $row_data['total_sold'];
                    echo ($total_sold == "") ? "0" : $total_sold;
                    ?>
                </td>
                <td><?php echo $status; ?></td>
                
                <td>
                    <a href='index.php?edit_product=<?php echo $product_id ?>'>
                        <i class='fa-solid fa-pencil-square' style='color:cornflowerblue'></i>
                    </a>
                </td>
                
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteProd<?php echo $product_id ?>">
                        <i class='fa-solid fa-trash' style='color:crimson'></i>
                    </a>
                </td>
            </tr>

            <div class="modal fade" id="deleteProd<?php echo $product_id ?>" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body text-start">
                            <h4>Are you sure you want to delete "<?php echo $product_title; ?>"?</h4>
                            <p class="text-danger">This action will remove the product from your store permanently.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <a href='index.php?delete_product=<?php echo $product_id ?>' class="btn btn-primary text-decoration-none">Yes, Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>