<?php
include('config/dbcon.php');
include('authentication.php');

include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php include('message.php'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Fabric
                                <a href="product-add.php" class="btn btn-primary float-right">Add</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fabric Type</th>
                                        <th>Fabric Information</th>
                                        <th>Extra Cost</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM fabrics";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0 )
                                    {
                                        foreach($query_run as $fab)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $fab['fabric_type']?></td>
                                                <td><?= $fab['fabric_info']?></td>
                                                <td><?= $fab['extra_cost']?></td>
                                                <td>
                                                    <a href="product-edit.php?prod_id=<?php echo $prod_item['id']; ?>"class="btn btn-success">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="prod_delete_id" value="<?= $fab['fabric_type']; ?>">
                                                        <button type="submit" name="prod_delete_btn" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>