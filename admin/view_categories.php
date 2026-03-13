<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-primary">
        <tr>
            <th>SI NO</th>
            <th>Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $select_cat="SELECT * FROM `categories`";
        $num=0;
        $result_cat=mysqli_query($con,$select_cat);
        while($row=mysqli_fetch_assoc($result_cat)){
            $cat_id=$row['category_id'];
            $cat_title=$row['category_title'];
            $num++;
        ?>
        <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $cat_title; ?></td>

            <td><a href='index.php?edit_category=<?php echo $cat_id?>' class='text-light'><i class='fa-solid fa-pencil-square' style='color:cornflowerblue'></i></a></td>
                    
            <td>
                <a href='#' class="text-light" data-bs-toggle="modal" data-bs-target="#delete<?php echo $cat_id ?>">
                    <i class='fa-solid fa-trash' style='color:crimson'></i>
                </a>
            </td>
        </tr>

        <div class="modal fade" id="delete<?php echo $cat_id ?>" data-bs-backdrop="static" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>Are you sure you want to delete "<?php echo $cat_title; ?>"?</h3>
                        <p class="text-danger"><b>Warning:</b> This will delete all associated products too!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary">
                        
                        <a href='index.php?delete_category=<?php echo $cat_id; ?>' class=" btn-primary text-decoration-none">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </tbody>
</table>