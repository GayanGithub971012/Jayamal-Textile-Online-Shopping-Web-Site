<?php
include('config/dbcon.php');
include('authentication.php');

include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>
<!--Add User Modal -->
<div class="modal fade" id="AddCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <lable for="">Category Name</lable>
            <input type="text" name="categoryname" class="form-control" placeholder="Category Name">
          </div>
          <div class="form-group">
            <lable for="">Size2 Price</lable>
            <input type="text" name="size2price" class="form-control" placeholder="Size2 Price">
          </div>
          <div class="form-group">
            <lable for="">Size4 Price</lable>
            <input type="text" name="size4price" class="form-control" placeholder="Size4 Price">
          </div>
          <div class="form-group">
            <lable for="">Size6 Price</lable>
            <input type="text" name="size6price" class="form-control" placeholder="Size6 Price">
          </div>
          <div class="form-group">
            <lable for="">Size8 Price</lable>
            <input type="text" name="size8price" class="form-control" placeholder="Size8 Price">
          </div>
          <div class="form-group">
            <lable for="">Size10 Price</lable>
            <input type="text" name="size10price" class="form-control" placeholder="Size10 Price">
          </div>
          <div class="form-group">
            <lable for="">Size12 Price</lable>
            <input type="text" name="size12price" class="form-control" placeholder="Size12 Price">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="addCategory" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Add User Modal -->
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
          <input type="hidden" name="delete_id" class="delete_user_id">
          <p>
            Are you sure. you want to delete this data?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="deleteCategory" class="btn btn-primary">Yes, Delete.!</button>
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
        <div class="col-md-12">
          <?php include('message.php'); ?>
          <div class="card">
            <div class="card-header">
              <h4>
                Category
                <a href="" data-toggle="modal" data-target="#AddCategory" class="btn btn-primary float-right">Add Category</a>
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
                    <th>Average Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  $query = "SELECT * FROM categoryprice";
                  $query_run = mysqli_query($con, $query);

                  if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $cate) {
                  ?>
                      <tr>
                        <td><?= $cate['c_name'] ?></td>
                        <td><?= $cate['size2_price'] ?></td>
                        <td><?= $cate['size4_price'] ?></td>
                        <td><?= $cate['size6_price'] ?></td>
                        <td><?= $cate['size8_price'] ?></td>
                        <td><?= $cate['size10_price'] ?></td>
                        <td><?= $cate['size12_price'] ?></td>
                        <td><?= $cate['avg_price'] ?></td>
                        <td>
                          <a href="categoryprice-edit.php?category_name=<?php echo $cate['c_name']; ?>" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                          <button type="button" value="<?php echo $cate['c_name']; ?>" class="btn btn-danger deletebtn">Delete</a>
                        </td>
                      </tr>
                    <?php
                    }
                  } else {
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

<script>
  $(document).ready(function() {
    $('.deletebtn').click(function(e) {
      e.preventDefault();

      var user_id = $(this).val();
      $('.delete_user_id').val(user_id);
      $('#DeletModal').modal('show');

    });
  });
</script>


<?php include('includes/footer.php'); ?>