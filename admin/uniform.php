<?php
include('config/dbcon.php');
include('authentication.php');

include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>
<!--Add Uniform Modal -->
<div class="modal fade" id="AddUniform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <lable for="">Unifrom ID</lable>
            <input name="uniform_ID" class="form-control" placeholder="Unifrom ID">
          </div>
          <div class="form-group">
            <lable for="">Unifrom Description</lable>
            <textarea name="u_description" class="form-control" placeholder="Unifrom Description"></textarea>
          </div>
          <div class="form-group">
            <lable for="">Uniform Image</lable>
            <input type="file" name="image" id="image" class="form-control btn-sm">
          </div>
          <div class="form-group">
            <lable for="">Uniform Name</lable>
            <input type="text" name="u_name" class="form-control" placeholder="Unifrom Name">
          </div>
          <div class="form-group">

            <lable for="">Category Name</lable>
            <select class="form-control" name="c_name" class="form-control" placeholder="Category Name">
              <?php

              $query = "SELECT c_name FROM categoryprice";
              $query_run = mysqli_query($con, $query);

              if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $cnm) {
              ?>

                  <option><?= $cnm['c_name'] ?></option>

                <?php
                }
              } else {
                ?>

                <p>No Record Found</p>

              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="addUniform" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Uniform User Modal -->
<!--Delete Uniform Modal -->
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
          <input type="hidden" name="delete_id" class="delete_unifrom_id">
          <p>
            Are you sure. you want to delete this data?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="deleteUniform" class="btn btn-primary">Yes, Delete.!</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Delete Uniform Model-->
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
                Uniform
                <a href="" data-toggle="modal" data-target="#AddUniform" class="btn btn-primary float-right">Add Uniform</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Uniform ID</th>
                    <th>Uniform Description</th>
                    <th>Uniform Name</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $query = "SELECT * FROM uniform";
                  $query_run = mysqli_query($con, $query);

                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $uni) {
                  ?>
                      <tr>
                        <td><?= $uni['uniform_ID'] ?></td>
                        <td><?= $uni['u_description'] ?></td>
                        <td><?= $uni['u_name'] ?></td>
                        <td><?= $uni['c_name'] ?></td>
                        <td>
                          <a href="uniform-edit.php?U_id=<?php echo $uni['uniform_ID']; ?>" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                          <button type="button" value="<?php echo $uni['uniform_ID']; ?>" class="btn btn-danger deletebtn">Delete</a>
                        </td>
                      </tr>
                    <?php
                    }
                  } else {
                    ?>
                    <tr>
                      <td colspan="7">No Record Found</td>
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
      $('.delete_unifrom_id').val(user_id);
      $('#DeletModal').modal('show');

    });
  });
</script>

<?php include('includes/footer.php'); ?>