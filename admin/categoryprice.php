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
                                Category
                                <a href="product-add.php" class="btn btn-primary float-right">Add</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Size2 Price</th>
                                        <th>Size4 Price</th>
                                        <th>Size6 Price</th>
                                        <th>Size8 Price</th>
                                        <th>Size10 Price</th>
                                        <th>Size12 Price</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM categoryprice";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0 )
                                    {
                                        foreach($query_run as $cate)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $cate['c_name']?></td>
                                                <td><?= $cate['size2_price']?></td>
                                                <td><?= $cate['size4_price']?></td>
                                                <td><?= $cate['size6_price']?></td>
                                                <td><?= $cate['size8_price']?></td>
                                                <td><?= $cate['size10_price']?></td>
                                                <td><?= $cate['size12_price']?></td>
                                                <td>
                                                    <a href="product-edit.php?prod_id=<?php echo $prod_item['id']; ?>"class="btn btn-success">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="prod_delete_id" value="<?= $cate['c_name']; ?>">
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
                                            <td colspan="9">No Record Found</td>
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