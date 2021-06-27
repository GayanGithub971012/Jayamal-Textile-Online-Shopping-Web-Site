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
            <li class="breadcrumb-item active">Edit - Fabrics</li>
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
                Edit - Fabrics
              </h3>
              <a href="fabrics.php" class="btn btn-danger btn-sm float-right">BACK</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <form action="code.php" method="POST">
                    <div class="modal-body">
                      <?php
                      if (isset($_GET['fabric_type'])) {
                        $fabric_type = $_GET['fabric_type'];
                        $query = "SELECT * FROM fabric WHERE fabric_Type ='$fabric_type' LIMIT 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                          foreach ($query_run as $row) {
                      ?>
                            <input type="hidden" name="f_type" value="<?php echo $row['fabric_Type'] ?>">
                            <div class="form-group">
                              <lable for="">Fabric Type</lable>
                              <input type="text" name="f_type" value="<?php echo $row['fabric_Type'] ?>" class="form-control" placeholder="Fabric Type">
                            </div>
                            <div class="form-group">
                              <lable for="">Fabric information</lable>
                              <input type="text" name="f_information" value="<?php echo $row['fabric_Info'] ?>" class="form-control" placeholder="Fabric Information">
                            </div>
                            <div class="form-group">
                              <lable for="">Extra Cost</lable>
                              <input type="text" name="f_extra_cost" value="<?php echo $row['extra_cost'] ?>" class="form-control" placeholder="Extra Cost">
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
                      <button type="submit" name="editFabric" class="btn btn-info">Update</button>
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