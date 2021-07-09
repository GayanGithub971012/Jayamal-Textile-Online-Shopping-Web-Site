<?php
session_start();
include('config/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Jayamal Textiles Web Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="shortcut icon" href="images/logo.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/style-starter.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">


</head>

<body>

  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">JAYAMAL TEXTILES</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li>
                    <h5>Hello
                      <?php
                      if (isset($_SESSION['auth'])) {
                        echo $_SESSION['auth_user']['user_name'];
                      } else {
                        echo "Not Logged in";
                      }
                      ?>
                    </h5>
                  </li>
                  <li>

                    <div class="dropdown">
                      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon icon-person"></span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <form action="code.php" method="POST">
                          <button type="submit" name="login_btn" class="dropdown-item">Login</button>
                          <button type="submit" name="signup_btn" class="dropdown-item">Sign Up</button>
                          <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                          <button type="submit" name="user_btn" class="dropdown-item">User Profile</button>
                          <button type="submit" name="adminlogin_btn" class="dropdown-item">Admin Panel</button>
                        </form>
                      </div>
                    </div>



                  </li>
                  <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                  <li>
                    <a class="site-cart" href="cart.php">
                      <span class="icon icon-shopping_cart"></span>
                      <span id="cart-item" class="count bg-warning text-secondary"></span>
                    </a>
                  </li>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h5 class="modal-title text-dark" id="exampleModalLabel">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="logincode.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="User Name">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addUser" class="btn btn-dark">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h5 class="modal-title text-dark" id="exampleModalLabel">Sign Up</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="code.php" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                  <input type="text" name="phonenumber" class="form-control" placeholder="Phone Number">
                </div>
                <div class="form-group">
                  <span class="email_error"></span>
                  <input type="email" name="email" class="form-control email_id" placeholder="Email">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addUser" class="btn btn-dark">Sign Up</button>
              </div>
            </form>
          </div>
        </div>
      </div>







      <nav class="site-navigation text-right text-md-center bg-warning" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="index.php">Home</a></li>
            <li><a href="feedback.php.">Feedback</a></li>
            <li><a href="sizechart.php">Size Chart</a></li>
            <li class="has-children">
              <a href="uniform.php">Uniform</a>
              <ul class="dropdown">
                <li><a href="uniform.php">Uniform</a></li>
                <li><a href="customizeduniform.php">Customized Uniform</a></li>
              </ul>
            </li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Uniform</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">
            <div class="row col-md-12" id="pre_school_frock">
              <h3 class="text-center text-black mb-5">Pre School Frock</h3>
            </div>
            <div class="row mb-5">
            
              
              <?php

              $query = "SELECT * FROM uniform WHERE c_name = 'Pre school frock'";
              $query_run = mysqli_query($con, $query);

              if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $uni) {
              ?>
                  <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                      <figure class="block-4-image">
                        <a href="uniform-single.php?uniform_id=<?php echo $uni['uniform_ID']; ?>"><?php echo '<img src="data:image;base64,' . base64_encode($uni['u_image']) . '" alt="Image placeholder" style="width: 400px;height:300px;" class="img-fluid">'; ?></a>
                      </figure>
                      <div class="block-4-text p-4">
                        <h3><a href="uniform-single.php"><?= $uni['u_name'] ?></a></h3>
                        <p class="mb-0"><?= $uni['u_description'] ?></p>

                      </div>
                    </div>
                  </div>

                <?php
                }
              } else {
                ?>
                <P>No Record Found</p>
              <?php
              }
              ?>
            </div>
            <div class="row col-md-12" id="school_frock">
            <h3 class="text-center text-black mb-5">School Frock</h3>
            </div>
            <div class="row mb-5">
            
              
              <?php

              $query = "SELECT * FROM uniform WHERE c_name = 'School frock'";
              $query_run = mysqli_query($con, $query);

              if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $uni) {
              ?>


                  <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                      <figure class="block-4-image">
                        <a href="uniform-single.php?uniform_id=<?php echo $uni['uniform_ID']; ?>"><?php echo '<img src="data:image;base64,' . base64_encode($uni['u_image']) . '" alt="Image placeholder" style="width: 400px;height:300px;" class="img-fluid">'; ?></a>
                      </figure>
                      <div class="block-4-text p-4">
                        <h3><a href="uniform-single.php"><?= $uni['u_name'] ?></a></h3>
                        <p class="mb-0"><?= $uni['u_description'] ?></p>

                      </div>
                    </div>
                  </div>

                <?php
                }
              } else {
                ?>
                <P>No Record Found</p>
              <?php
              }
              ?>
            </div>
            <div class="row col-md-12" id="shirt">
            <h3 class="text-center text-black mb-5">Shirt</h3>
            </div>
            <div class="row mb-5">
            
              
              <?php

              $query = "SELECT * FROM uniform WHERE c_name = 'Shirt'";
              $query_run = mysqli_query($con, $query);

              if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $uni) {
              ?>


                  <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                      <figure class="block-4-image">
                        <a href="uniform-single.php?uniform_id=<?php echo $uni['uniform_ID']; ?>"><?php echo '<img src="data:image;base64,' . base64_encode($uni['u_image']) . '" alt="Image placeholder" style="width: 400px;height:300px;" class="img-fluid">'; ?></a>
                      </figure>
                      <div class="block-4-text p-4">
                        <h3><a href="uniform-single.php"><?= $uni['u_name'] ?></a></h3>
                        <p class="mb-0"><?= $uni['u_description'] ?></p>

                      </div>
                    </div>
                  </div>

                <?php
                }
              } else {
                ?>
                <P>No Record Found</p>
              <?php
              }
              ?>
            </div>
            <div class="row col-md-12" id="short">
            <h3 class="text-center text-black mb-5">Short</h3>
            </div>
            <div class="row mb-5">
            
              
              <?php

              $query = "SELECT * FROM uniform WHERE c_name = 'Short'";
              $query_run = mysqli_query($con, $query);

              if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $uni) {
              ?>


                  <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                      <figure class="block-4-image">
                        <a href="uniform-single.php?uniform_id=<?php echo $uni['uniform_ID']; ?>"><?php echo '<img src="data:image;base64,' . base64_encode($uni['u_image']) . '" alt="Image placeholder" style="width: 400px;height:300px;" class="img-fluid">'; ?></a>
                      </figure>
                      <div class="block-4-text p-4">
                        <h3><a href="uniform-single.php"><?= $uni['u_name'] ?></a></h3>
                        <p class="mb-0"><?= $uni['u_description'] ?></p>

                      </div>
                    </div>
                  </div>

                <?php
                }
              } else {
                ?>
                <P>No Record Found</p>
              <?php
              }
              ?>
            </div>
            <div class="row col-md-12" id="skirt">
            <h3 class="text-center text-black mb-5">Skirt</h3>
            </div>
            <div class="row mb-5">
            
              
              <?php

              $query = "SELECT * FROM uniform WHERE c_name = 'Skirt'";
              $query_run = mysqli_query($con, $query);

              if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $uni) {
              ?>


                  <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                      <figure class="block-4-image">
                        <a href="uniform-single.php?uniform_id=<?php echo $uni['uniform_ID']; ?>"><?php echo '<img src="data:image;base64,' . base64_encode($uni['u_image']) . '" alt="Image placeholder" style="width: 400px;height:300px;" class="img-fluid">'; ?></a>
                      </figure>
                      <div class="block-4-text p-4">
                        <h3><a href="uniform-single.php"><?= $uni['u_name'] ?></a></h3>
                        <p class="mb-0"><?= $uni['u_description'] ?></p>

                      </div>
                    </div>
                  </div>

                <?php
                }
              } else {
                ?>
                <P>No Record Found</p>
              <?php
              }
              ?>
            </div>
            <div class="row col-md-12" id="trouser">
            <h3 class="text-center text-black mb-5">Trouser</h3>
            </div>
            <div class="row mb-5">
            
              
              <?php

              $query = "SELECT * FROM uniform WHERE c_name = 'Trouser'";
              $query_run = mysqli_query($con, $query);

              if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $uni) {
              ?>


                  <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                      <figure class="block-4-image">
                        <a href="uniform-single.php?uniform_id=<?php echo $uni['uniform_ID']; ?>"><?php echo '<img src="data:image;base64,' . base64_encode($uni['u_image']) . '" alt="Image placeholder" style="width: 400px;height:300px;" class="img-fluid">'; ?></a>
                      </figure>
                      <div class="block-4-text p-4">
                        <h3><a href="uniform-single.php"><?= $uni['u_name'] ?></a></h3>
                        <p class="mb-0"><?= $uni['u_description'] ?></p>

                      </div>
                    </div>
                  </div>

                <?php
                }
              } else {
                ?>
                <P>No Record Found</p>
              <?php
              }
              ?>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0" >
            <div class="border p-4 rounded mb-4 list-group">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Categories</h3>
              <a href="#pre_school_frock">Pre School Frock</a>
              <a href="#school_frock">School Frock</a>
              <a href="#skirt">Skirt</a>
              <a href="#short">Short</a>
              <a href="#shirt">Shirt</a>
              <a href="#trouser">Trouser</a>
            </div>

            
          </div>
        </div>



      </div>
    </div>

    <footer class="site-footer border-top bg-warning">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="feedback.php">Feedback</a></li>
                  <li><a href="sizechart.php">Size Chart</a></li>
                  <li><a href="uniform.php">Uniform</a></li>
                  <li><a href="aboutus.php">About Us</a></li>
                  <li><a href="contactus.php">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address text-dark">Kiridigalla road,Polgolla,Gokarella,Kurunegala</li>
                <li class="phone"><a href="tel://23923929210">+94 77 946 9179</a></li>
                <li class="email"><a href="mailto:jayamalitext@gmail.com">jayamalitext@gmail.com</a></li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-dark" value="Send">
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="text-center">
          © 2020 Copyright:
          <a class="text-dark" href="https://mdbootstrap.com/">www.jayamalitext.com</a>
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>

  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
    $(document).ready(function() {

      // Load total no.of items added in the cart and display in the navbar
      load_cart_item_number();

      function load_cart_item_number() {
        $.ajax({
          url: 'code.php',
          method: 'get',
          data: {
            cartItem: "cart_item"
          },
          success: function(response) {
            $("#cart-item").html(response);
          }
        });
      }
    });
  </script>
<script type="text/javascript">
  $(document).ready(function(){

    filter_data();
    function filter_data()
    {
      var fetch = 'fetch_data';
      var brand = get_filter('brand');

      $.ajax({
        url: 'code.php',
        method: 'POST',
        data: {
          fetch:fetch,
          brand:brand
          },
        success:function(data){
          $(".filter_data").html(data);
          
        }

      });     

    }
   

    function get_filter(class_name){
      var filter = [];
      $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());
      });
      return filter;
    }

    $('.comman_selector').click(function(){
      filter_data();
    });

  });
</script>


</body>

</html>