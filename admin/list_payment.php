<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-primary text-light">
    <?php 
    $all_payments = "SELECT * FROM `user_payments`";
    $run_all = mysqli_query($con, $all_payments);
    $row_count = mysqli_num_rows($run_all);

    if($row_count == 0){
        echo "</thead></table><h2 class='text-danger text-center mt-5'>No payments yet!</h2>";
    } else {
        echo "<tr>
                <th>SI NO</th>
                <th>Invoice NO</th>
                <th>Amount</th>
                <th>Payment type</th>
                <th>Order Date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>";

        $number = 0;
        while($row_data = mysqli_fetch_assoc($run_all)){
            $payment_id = $row_data['payment_id'];
            $amount = $row_data['amount'];
            $invoice_number = $row_data['invoice_number'];
            $payment_mode = $row_data['payment_mode'];
            $date = $row_data['date'];
            $number++;

            echo "<tr>
                <td>$number</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td>
                    <a href='#' data-bs-toggle='modal' data-bs-target='#deletePay$payment_id'>
                        <i class='fa-solid fa-trash' style='color:crimson'></i>
                    </a>
                </td>
            </tr>

            <div class='modal fade' id='deletePay$payment_id' tabindex='-1' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-body text-start'>
                            <h4>Confirm Deletion</h4>
                            <p>Are you sure you want to delete the payment record for Invoice <b>#$invoice_number</b>?</p>
                            <p class='text-danger'><small>This will remove the payment history for this transaction.</small></p>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>
                            <a href='index.php?delete_payment=$payment_id' class='btn btn-primary text-decoration-none'>Yes, Delete</a>
                        </div>
                    </div>
                </div>
            </div>";
        }
        echo "</tbody>";
    }
    ?>
</table>