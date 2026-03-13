<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-primary text-light">
    <?php 
    $all_users = "SELECT * FROM `user_table`";
    $run_all = mysqli_query($con, $all_users);
    $row_count = mysqli_num_rows($run_all);

    if($row_count == 0){
        echo "</thead></table><h2 class='text-danger text-center mt-5'>No users!</h2>";
    } else {
        echo "<tr>
                <th>SI NO</th>
                <th>User ID</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Address</th>
                <th>User Mobile</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>";

        $number = 0;
        while($row_data = mysqli_fetch_assoc($run_all)){
            $user_id = $row_data['user_id'];
            $username = $row_data['username'];
            $user_email = $row_data['user_email'];
            $user_address = $row_data['user_address'];
            $user_mobile = $row_data['user_mobile'];
            $number++;

            echo "<tr>
                <td>$number</td>
                <td>$user_id</td>
                <td>$username</td>
                <td>$user_email</td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td>
                    <a href='#' data-bs-toggle='modal' data-bs-target='#deleteUser$user_id'>
                        <i class='fa-solid fa-trash' style='color:crimson'></i>
                    </a>
                </td>
            </tr>

            <div class='modal fade' id='deleteUser$user_id' tabindex='-1' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-body text-start'>
                            <h4>Are you sure?</h4>
                            <p>Do you really want to delete the account for <b>$username</b>?</p>
                            <p class='text-danger'><small>This action will permanently remove this user from the system.</small></p>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>
                            <a href='index.php?delete_users=$user_id' class='btn btn-primary text-decoration-none'>Yes, Delete</a>
                        </div>
                    </div>
                </div>
            </div>";
        }
        echo "</tbody>";
    }
    ?>
</table>