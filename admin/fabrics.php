<?php
include('config/dbcon.php');
include('authentication.php');

include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>
<!--Add Fabric Fabric-->
<div class="modal fade" id="AddFabric" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Fabrics</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <lable for="">Fabric Type</lable>
            <input type="text" name="f_type" class="form-control" placeholder="Fabric Type">
          </div>
          <div class="form-group">
            <lable for="">Fabric Information</lable>
            <input type="text" name="f_information" class="form-control" placeholder="Fabric Information">
          </div>
          <div class="form-group">
            <lable for="">Extra Cost</lable>
            <input type="text" name="f_extra_cost" class="form-control" placeholder="Extra Cost">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="addFabric" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--Delete Fabric-->
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
          <input type="hidden" name="fabric_type" class="delete_fabric_type">
          <p>
            Are you sure. you want to delete this data?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="deletefabric" class="btn btn-primary">Yes, Delete.!</button>
        </div>
      </form>
    </div>
  </div>
</div>

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
                                Fabrics
                                <a href="fabric-add.php" data-toggle="modal" data-target="#AddFabric" class="btn btn-primary float-right">Add Fabrics</a>
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

                                    $query = "SELECT * FROM fabric";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $fab) {
                                    ?>
                                            <tr>
                                                <td><?= $fab['fabric_Type'] ?></td>
                                                <td><?= $fab['fabric_Info'] ?></td>
                                                <td><?= $fab['extra_cost'] ?></td>
                                                <td>
                                                  <a href="fabric-edit.php?fabric_type=<?php echo $fab['fabric_Type']; ?>" class="btn btn-success">Edit</a>
                                                </td>
                                                <td>
                                                  <button type="button" value="<?php echo $fab['fabric_Type']; ?>" class="btn btn-danger deletebtn">Delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
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

<script>
  $(document).ready(function() {
    $('.deletebtn').click(function(e) {
      e.preventDefault();

      var f_type = $(this).val();
      $('.delete_fabric_type').val(f_type);
      $('#DeletModal').modal('show');

    });
  });
</script>
<?php include('includes/footer.php'); ?>