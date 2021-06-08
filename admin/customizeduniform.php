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
                <div class="col-md-16">
                    <?php include('message.php'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Customized Uniform
                                <a href="product-add.php" class="btn btn-primary float-right">Add</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Uniform ID</th>
                                        <th>Color</th>
                                        <th>Design Image</th>
                                        <th>Institution</th>
                                        <th>Extra Note</th>
                                        <th>Shoulder Length</th>
                                        <th>Sleeve Length</th>
                                        <th>Sleeve Circumference</th>
                                        <th>Arm Hole</th>
                                        <th>Chest</th>
                                        <th>Waist</th>
                                        <th>Shoulder To Waist</th>
                                        <th>Full Length</th>
                                        <th>Front Crotch</th>
                                        <th>Hip</th>
                                        <th>Bottom</th>
                                        <th>Fabric Type</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM customizeduniform";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $cus) {
                                    ?>
                                            <tr>
                                                <td><?= $cus['uniform_ID'] ?></td>
                                                <td><?= $cus['color'] ?></td>
                                                <td><?= $cus['design_image'] ?></td>
                                                <td><?= $cus['institution'] ?></td>
                                                <td><?= $cus['extra_note'] ?></td>
                                                <td><?= $cus['shoulder_length'] ?></td>
                                                <td><?= $cus['sleeve_length'] ?></td>
                                                <td><?= $cus['sleeve_circumference'] ?></td>
                                                <td><?= $cus['arm_hole'] ?></td>
                                                <td><?= $cus['chest'] ?></td>
                                                <td><?= $cus['waist'] ?></td>
                                                <td><?= $cus['shoulder_to_waist'] ?></td>
                                                <td><?= $cus['full_length'] ?></td>
                                                <td><?= $cus['front_crotch'] ?></td>
                                                <td><?= $cus['hip'] ?></td>
                                                <td><?= $cus['bottom'] ?></td>
                                                <td><?= $cus['fabric_type'] ?></td>
                                                <td>
                                                    <a href="product-edit.php?prod_id=<?php echo $prod_item['id']; ?>" class="btn btn-success">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="prod_delete_id" value="<?= $cus['uniform_ID']; ?>">
                                                        <button type="submit" name="prod_delete_btn" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="19">No Record Found</td>
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