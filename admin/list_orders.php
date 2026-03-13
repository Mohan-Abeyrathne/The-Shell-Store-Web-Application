<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-primary text-light">
        <?php 
        $all_orders = "SELECT * FROM `user_orders`";
        $run_all = mysqli_query($con, $all_orders);
        $row_count = mysqli_num_rows($run_all);

        if($row_count == 0){
            echo "</thead></table><h2 class='text-danger text-center mt-5'>No orders yet!</h2>";
        } else {
            echo "<tr>
                    <th>SI NO</th>
                    <th>Due Amount</th>
                    <th>Invoice NO</th>
                    <th>Total products</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>";

            $number = 0;
            while($row_data = mysqli_fetch_assoc($run_all)){
                $order_id = $row_data['order_id'];
                $amount_due = $row_data['amount_due'];
                $invoice_number = $row_data['invoice_number'];
                $total_products = $row_data['total_products'];
                $order_date = $row_data['order_date'];
                $order_status = $row_data['order_status'];
                $number++;

                echo "<tr>
                    <td>$number</td>
                    <td>Rs.$amount_due</td>
                    <td>$invoice_number</td>
                    <td>$total_products</td>
                    <td>$order_date</td>
                    <td>$order_status</td>
                    <td>
                        <a href='#' data-bs-toggle='modal' data-bs-target='#deleteOrder$order_id'>
                            <i class='fa-solid fa-trash' style='color:crimson'></i>
                        </a>
                    </td>
                </tr>

                <div class='modal fade' id='deleteOrder$order_id' tabindex='-1' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-body'>
                                <h4>Are you sure you want to delete Order #$invoice_number?</h4>
                                <p class='text-danger'>This will remove the order record from the database.</p>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>
                                <a href='index.php?delete_orders=$order_id' class='btn btn-primary text-decoration-none'>Yes, Delete</a>
                            </div>
                        </div>
                    </div>
                </div>";
            }
            echo "</tbody>";
        }
        ?>
</table>