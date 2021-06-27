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
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Size Chart</strong></div>
        </div>
      </div>
    </div>
    <h1 class="text-center">SIZE CHART</h1>
    <div class="container">
      <div class="row">

        <div class="col-6">
          <div class=" table-responsive p-0">
            <h2>Pre school frock</h2>
            <table class="table table-hover  text-nowrap">
              <thead>
                <tr>
                  <th>Size</th>
                  <th>2</th>
                  <th>4</th>
                  <th>6</th>
                  <th>8</th>
                  <th>10</th>
                  <th>12</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Center Back</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Chest</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Waist</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Shoulder</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Bottom</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-6">
          <img src="images/size_chart/preschool_frock.png" alt="" class="center">
        </div>

      </div>
      <div class="row">

        <div class="col-6">
          <div class=" table-responsive p-0">
            <h2>School frock</h2>
            <table class="table table-hover  text-nowrap">
              <thead>
                <tr>
                  <th>Size</th>
                  <th>2</th>
                  <th>4</th>
                  <th>6</th>
                  <th>8</th>
                  <th>10</th>
                  <th>12</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Center Back</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Chest</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Waist</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Shoulder</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Bottom</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-6">
          <img src="images/size_chart/school_frock.png" alt="" class="center">
        </div>

      </div>
      <div class="row">

        <div class="col-6">
          <div class=" table-responsive p-0">
            <h2>Skirt</h2>
            <table class="table table-hover  text-nowrap">
              <thead>
                <tr>
                  <th>Size</th>
                  <th>2</th>
                  <th>4</th>
                  <th>6</th>
                  <th>8</th>
                  <th>10</th>
                  <th>12</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Center Back</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Chest</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Waist</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Shoulder</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Bottom</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-6">
          <img src="images/size_chart/skirt.png" alt="" class="center">
        </div>

      </div>
      <div class="row">

        <div class="col-6">
          <div class=" table-responsive p-0">
            <h2>Shirt</h2>
            <table class="table table-hover  text-nowrap">
              <thead>
                <tr>
                  <th>Size</th>
                  <th>2</th>
                  <th>4</th>
                  <th>6</th>
                  <th>8</th>
                  <th>10</th>
                  <th>12</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Center Back</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Chest</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Waist</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Shoulder</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Bottom</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-6">
          <img src="images/size_chart/shirt.png" alt="" class="center">
        </div>

      </div>
      <div class="row">

        <div class="col-6">
          <div class=" table-responsive p-0">
            <h2>Short</h2>
            <table class="table table-hover  text-nowrap">
              <thead>
                <tr>
                  <th>Size</th>
                  <th>2</th>
                  <th>4</th>
                  <th>6</th>
                  <th>8</th>
                  <th>10</th>
                  <th>12</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Center Back</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Chest</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Waist</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Shoulder</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Bottom</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-6">
          <img src="images/size_chart/short.png" alt="" class="center">
        </div>

      </div>
      <div class="row">

        <div class="col-6">
          <div class=" table-responsive p-0">
            <h2>Trouser</h2>
            <table class="table table-hover  text-nowrap">
              <thead>
                <tr>
                  <th>Size</th>
                  <th>2</th>
                  <th>4</th>
                  <th>6</th>
                  <th>8</th>
                  <th>10</th>
                  <th>12</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Center Back</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Chest</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Waist</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Shoulder</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
                <tr>
                  <td>Bottom</td>
                  <td>19</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                  <td>XX</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <img src="images/size_chart/trouser.png" alt="" class="center">
        </div>

      </div>
    </div>
    <div class="container">
      <div class="row ">
        
          <a href="uniform-single.php" class="col-md-2 mb-3 btn btn-dark btn-block ">Back to uniform</a>

        

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
                <li class="address dark">Kiridigalla road,Polgolla,Gokarella,Kurunegala</li>
                <li class="phone"><a href="tel://23923929210">+94 77 946 9179</a></li>
                <li class="email"><a href="mailto:jayamalitext@gmail.com">jayamalitext@gmail.com</a>
                </li>
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

</body>

</html>