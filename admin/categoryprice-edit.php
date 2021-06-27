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
            <li class="breadcrumb-item active">Edit - Category</li>
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
                Edit - Category
              </h3>
              <a href="categoryprice.php" class="btn btn-danger btn-sm float-right">BACK</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <form action="code.php" method="POST">
                    <div class="modal-body">
                      <?php
                      if (isset($_GET['category_name'])) {
                        $category_name = $_GET['category_name'];
                        $query = "SELECT * FROM categoryprice WHERE c_name ='$category_name' LIMIT 1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                          foreach ($query_run as $row) {
                      ?>
                            <input type="hidden" name="c_name" value="<?php echo $row['c_name'] ?>">
                            <div class="form-group">
                              <lable for="">Category Name</lable>
                              <input type="text" name="c_name" value="<?php echo $row['c_name'] ?>" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                              <lable for="">Size2 Price</lable>
                              <input type="text" name="size2_price" value="<?php echo $row['size2_price'] ?>" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                              <lable for="">Size4 Price</lable>
                              <input type="text" name="size4_price" value="<?php echo $row['size4_price'] ?>" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                              <lable for="">Size6 Price</lable>
                              <input type="text" name="size6_price" value="<?php echo $row['size6_price'] ?>" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                              <lable for="">Size8 Price</lable>
                              <input type="text" name="size8_price" value="<?php echo $row['size8_price'] ?>" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                              <lable for="">Size10 Price</lable>
                              <input type="text" name="size10_price" value="<?php echo $row['size10_price'] ?>" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                              <lable for="">Size12 Price</lable>
                              <input type="text" name="size12_price" value="<?php echo $row['size12_price'] ?>" class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                              <lable for="">Average Price</lable>
                              <input type="text" name="avg_price" value="<?php echo $row['avg_price'] ?>" class="form-control" placeholder="Phone Number" readonly>
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
                      <button type="submit" name="editCategory" class="btn btn-info">Update</button>
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