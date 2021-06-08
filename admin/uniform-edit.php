<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit - Uniform</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Edit - Uniform
              </h3>
              <a href="uniform.php" class="btn btn-danger btn-sm float-right">BACK</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <form action="code.php" method="POST">
                    <div class="modal-body">
                      <?php
                      if (isset($_GET['U_id'])) {
                        $uniform_ID = $_GET['U_id'];
                        $query = "SELECT * FROM uniform WHERE uniform_ID ='$uniform_ID' LIMIT 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                          foreach ($query_run as $row) {
                      ?>
                            <input type="hidden" name="uniform_ID" value="<?php echo $row['uniform_ID'] ?>">
                            <div class="form-group">
                              <lable for="">Uniform ID</lable>
                              <input type="text" name="uniform_ID" value="<?php echo $row['uniform_ID'] ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                              <lable for="">Uniform Description</lable>
                              <input type="text" name="u_description" value="<?php echo $row['u_description'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                              <lable for="">Uniform Image</lable>
                              <input type="file" name="u_image" class="form-control btn-sm">
                            </div>
                            <div class="form-group">
                              <lable for="">Unifrom Name</lable>
                              <input type="text" name="u_name" value="<?php echo $row['u_name'] ?>" class="form-control">
                            </div>
                            <div class="form-group">

                              <lable for="">Category Name</lable>
                              <select class="form-control" name="c_name" class="form-control">
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

                      <?php
                          }
                        } else {
                          echo "<h4>No Record Found.!</h4>";
                        }
                      }
                      ?>

                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="editUniform" class="btn btn-info">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>