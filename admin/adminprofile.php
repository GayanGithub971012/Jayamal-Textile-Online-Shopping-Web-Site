<?php
include('authentication.php');
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!--User Modal -->
  <div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="code.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <lable for=""> User Name</lable>
              <input type="text" name="username" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <lable for="">Phone Number</lable>
              <input type="text" name="phonenumber" class="form-control" placeholder="Phone Number">
            </div>
            <div class="form-group">
              <lable for="">Email Id</lable>
              <span class="email_error"></span>
              <input type="email" name="email" class="form-control email_id" placeholder="Email">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <lable for="">Password</lable>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <lable for="">Confirm Password</lable>
                  <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addUser" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End User Modal -->

  <!--User Modal -->
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
            <button type="submit" name="DeleteUserbtn" class="btn btn-primary">Yes, Delete.!</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Delete User -->



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
            <li class="breadcrumb-item active">Registered Users</li>
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
          <?php
          if (isset($_SESSION['status'])) {
            echo "<h1>" . $_SESSION['status'] . "</h1>";
            unset($_SESSION['status']);
          }
          ?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title text-center">
                Registered User
              </h3>
              <a href="# " data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right">Add User</a>
            </div>
            <!-- /.card-header -->
            
          </div>

        </div>
      </div>
    </div>

  </section>
</div>
<?php include('includes/script.php'); ?>

<script>
    $(document).ready(function() {

    $('.email_id').keyup(function(e) {
      var email = $('.email_id').val();

      $.ajax({
        type: "POST",
        url: "code.php",
        data: {
          'check_Emailbtn': 1,
          'email': email,
        },
        success: function(response) {
          $('.email_error').text(response);
        }
      });
    });
  });
</script>





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