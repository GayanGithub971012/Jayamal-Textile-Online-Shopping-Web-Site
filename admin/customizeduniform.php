<?php
include('config/dbcon.php');
include('authentication.php');

include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>
<!--Delete User Modal -->
<div class="modal fade" id="DeletModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="cud_uni_id" class="delete_cus_uni_id">
          <p>
            Are you sure. you want to delete this data?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="deleteCusuniform" class="btn btn-primary">Yes, Delete.!</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Delete User Model-->

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
                            <table class="table table-bordered table-striped">
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
                                                <td><?= $cus['cu_ID'] ?></td>
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
                                                <td><?= $cus['fabric_Type'] ?></td>
                                                <td>
                                                    <button type="button" value="<?php echo $cus['cu_ID']; ?>" class="btn btn-danger deletebtn">Delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="18">No Record Found</td>
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
<script>
  $(document).ready(function() {
    $('.deletebtn').click(function(e) {
      e.preventDefault();

      var user_id = $(this).val();
      $('.delete_cus_uni_id').val(user_id);
      $('#DeletModal').modal('show');

    });
  });
</script>
<?php include('includes/footer.php'); ?>