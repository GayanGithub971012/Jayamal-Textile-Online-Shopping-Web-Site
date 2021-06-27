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

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/style-starter.css">
  <link rel="shortcut icon" href="images/logo.png">
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
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Customized Uniform</strong></div>
        </div>
      </div>
    </div>
    

    <div class="site-section">
      <div class="container">
      <?php
      include('../admin/message.php');
    ?>
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Customized Uniform</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <form action="code.php" method="POST">
              <div class="p-3 p-lg-5 border">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="exampleFormControlSelect1" class="text-black">Uniform Category<span class="text-danger">*</span></label>
                        <select class="form-control" name="messagetype" id="messagetype" onchange="text_box_show()">
                          <?php

                          $query = "SELECT * FROM categoryprice";
                          $query_run = mysqli_query($con, $query);

                          if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $uni) {
                          ?>
                              <option value="<?= $uni['c_name'] ?>"><?= $uni['c_name'] ?></option>
                            <?php
                            }
                          } else {
                            ?>
                            <P>No Record Found</p>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="institution" class="text-black">Institution<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="institution" name="institution" placeholder="Enter your institution" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="color" class="text-black">Color<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="Color of uniform" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="fabric_type" class="text-black">Fabric Type<span class="text-danger">*</span></label>
                        <select class="form-control" name="fabric_type" id="fabric_type">
                          <?php

                          $query = "SELECT fabric_Type FROM fabric";
                          $query_run = mysqli_query($con, $query);

                          if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $uni) {
                          ?>

                              <option><?= $uni['fabric_Type'] ?></option>

                            <?php
                            }
                          } else {
                            ?>
                            <P>No Record Found</p>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_qty" class="text-black">Quantity</label>
                        <input type="text" class="form-control" id="c_qty" name="c_qty" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="img" class="text-black">Add Image</label>
                      <input type="file" name="img" id="img" class="form-control btn-sm" >
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="extra_note" class="text-black">Extra Note</label>
                        <textarea name="extra_note" id="extra_note" cols="30" rows="7" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12">
                        <input type="submit" class="btn btn-dark btn-lg btn-block" name="AddCuniform" value="Add to Cart">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div id="Pre_school_frock" style="display:none;">
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ps_shoulder_length" class="text-black">Shoulder Length</label>
                          <input type="text" class="form-control" id="ps_shoulder_length" name="ps_shoulder_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ps_sleeve_length" class="text-black">Sleeve Length</label>
                          <input type="text" class="form-control" id="ps_sleeve_length" name="ps_sleeve_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ps_sleeve_circumference" class="text-black">Sleeve Circumference</label>
                          <input type="text" class="form-control" id="ps_sleeve_circumference" name="ps_sleeve_circumference" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ps_arm_hole" class="text-black">Arm Hole</label>
                          <input type="text" class="form-control" id="ps_arm_hole" name="ps_arm_hole" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ps_chest" class="text-black">Chest</label>
                          <input type="text" class="form-control" id="ps_chest" name="ps_chest" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ps_waist" class="text-black">Waist</label>
                          <input type="text" class="form-control" id="ps_waist" name="ps_waist" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ps_shoulder_to_waist" class="text-black">Shoulder to Waist</label>
                          <input type="text" class="form-control" id="ps_shoulder_to_waist" name="ps_shoulder_to_waist" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ps_full_length" class="text-black">Full Length</label>
                          <input type="text" class="form-control" id="ps_full_length" name="ps_full_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ps_hip" class="text-black">Hip</label>
                          <input type="text" class="form-control" id="ps_hip" name="ps_hip" >
                        </div>
                      </div>
                    </div>
                    <div id="School_frock" style="display:none;">
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sch_shoulder_length" class="text-black">Shoulder Length</label>
                          <input type="text" class="form-control" id="sch_shoulder_length" name="sch_shoulder_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sch_sleeve_length" class="text-black">Sleeve Length</label>
                          <input type="text" class="form-control" id="sch_sleeve_length" name="sch_sleeve_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sch_sleeve_circumference" class="text-black">Sleeve Circumference</label>
                          <input type="text" class="form-control" id="sch_sleeve_circumference" name="sch_sleeve_circumference" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sch_arm_hole" class="text-black">Arm Hole</label>
                          <input type="text" class="form-control" id="sch_arm_hole" name="sch_arm_hole" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sch_chest" class="text-black">Chest</label>
                          <input type="text" class="form-control" id="sch_chest" name="sch_chest" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sch_waist" class="text-black">Waist</label>
                          <input type="text" class="form-control" id="sch_waist" name="sch_waist" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sch_shoulder_to_waist" class="text-black">Shoulder to Waist</label>
                          <input type="text" class="form-control" id="sch_shoulder_to_waist" name="sch_shoulder_to_waist" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sch_full_length" class="text-black">Full Length</label>
                          <input type="text" class="form-control" id="sch_full_length" name="sch_full_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sch_hip" class="text-black">Hip</label>
                          <input type="text" class="form-control" id="sch_hip" name="sch_hip" >
                        </div>
                      </div>
                    </div>
                    <div id="Skirt" style="display:none;">
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ski_chest" class="text-black">Chest</label>
                          <input type="text" class="form-control" id="ski_chest" name="ski_chest" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ski_waist" class="text-black">Waist</label>
                          <input type="text" class="form-control" id="ski_waist" name="ski_waist" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ski_full_length" class="text-black">Full Length</label>
                          <input type="text" class="form-control" id="ski_full_length" name="ski_full_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="ski_hip" class="text-black">Hip</label>
                          <input type="text" class="form-control" id="ski_hip" name="ski_hip" >
                        </div>
                      </div>
                    </div>
                    <div id="Shirt" style="display:none;">
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="shi_shoulder_length" class="text-black">Shoulder Length</label>
                          <input type="text" class="form-control" id="shi_shoulder_length" name="shi_shoulder_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="shi_sleeve_length" class="text-black">Sleeve Length</label>
                          <input type="text" class="form-control" id="shi_sleeve_length" name="shi_sleeve_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="shi_sleeve_circumference" class="text-black">Sleeve Circumference</label>
                          <input type="text" class="form-control" id="shi_sleeve_circumference" name="shi_sleeve_circumference" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="shi_arm_hole" class="text-black">Arm Hole</label>
                          <input type="text" class="form-control" id="shi_arm_hole" name="shi_arm_hole" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="shi_chest" class="text-black">Chest</label>
                          <input type="text" class="form-control" id="shi_chest" name="shi_chest" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="shi_waist" class="text-black">Waist</label>
                          <input type="text" class="form-control" id="shi_waist" name="shi_waist" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="shi_full_length" class="text-black">Full Length</label>
                          <input type="text" class="form-control" id="shi_full_length" name="shi_full_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="shi_shoulder_to_waist" class="text-black">Shoulder to Waist</label>
                          <input type="text" class="form-control" id="shi_shoulder_to_waist" name="shi_shoulder_to_waist" >
                        </div>
                      </div>
                    </div>
                    <div id="Short" style="display:none;">
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sho_full_length" class="text-black">Full Length</label>
                          <input type="text" class="form-control" id="sho_full_length" name="sho_full_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sho_front_crotch" class="text-black">Front Crotch</label>
                          <input type="text" class="form-control" id="sho_front_crotch" name="sho_front_crotch" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sho_hip" class="text-black">Hip</label>
                          <input type="text" class="form-control" id="sho_hip" name="sho_hip" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sho_waist" class="text-black">Waist</label>
                          <input type="text" class="form-control" id="sho_waist" name="sho_waist" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="sho_bottom" class="text-black">Bottom</label>
                          <input type="text" class="form-control" id="sho_bottom" name="sho_bottom" >
                        </div>
                      </div>
                    </div>
                    <div id="Trouser" style="display:none;">
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="tro_full_length" class="text-black">Full Length</label>
                          <input type="text" class="form-control" id="tro_full_length" name="tro_full_length" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="tro_front_crotch" class="text-black">Front Crotch</label>
                          <input type="text" class="form-control" id="tro_front_crotch" name="tro_front_crotch" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="tro_hip" class="text-black">Hip</label>
                          <input type="text" class="form-control" id="tro_hip" name="tro_hip" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="tro_waist" class="text-black">Waist</label>
                          <input type="text" class="form-control" id="tro_waist" name="tro_waist" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="tro_bottom" class="text-black">Bottom</label>
                          <input type="text" class="form-control" id="tro_bottom" name="tro_bottom" >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
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
                <li class="address dark">Kiridigalla road,Polgolla,Gokarella,Kurunegala</li>
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

  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
    $(document).ready(function() {
      // Send product details in the server
      $(".addItemBtn").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var uni_institition = $form.find(".uni_institition").val();
        var uni_color = $form.find(".uni_color").val()
        var uni_fabric_type = $form.find(".uni_fabric_type").val();
        var uni_qty = $form.find(".uni_qty").val();
        var uni_img = $form.find(".uni_img").val()
        var uni_extra_note = $form.find(".uni_extra_note").val();

        var shoulder_length = $form.find(".shoulder_length").val();
        var sleeve_length = $form.find(".sleeve_length").val()
        var sleeve_circumference = $form.find(".sleeve_circumference").val();
        var arm_hole = $form.find(".arm_hole").val()
        var chest = $form.find(".chest").val();
        var waist = $form.find(".waist").val();
        var shoulder_to_waist = $form.find(".shoulder_to_waist").val()
        var full_length = $form.find(".full_length").val();
        var hip = $form.find(".hip").val();
        var bottom = $form.find(".bottom").val()
        var front_crotch = $form.find(".front_crotch").val();

        $.ajax({
          url: 'code.php',
          method: 'post',
          data: {
            uni_institition: uni_institition,
            uni_color: uni_color,
            uni_fabric_type: uni_fabric_type,
            uni_qty: uni_qty,
            uni_img: uni_img,
            uni_extra_note: uni_extra_note,
            shoulder_length: shoulder_length,
            sleeve_length: sleeve_length,
            sleeve_circumference: sleeve_circumference,
            arm_hole: arm_hole,
            chest: chest,
            waist: waist,
            shoulder_to_waist: shoulder_to_waist,
            full_length: full_length,
            hip: hip,
            bottom: bottom,
            front_crotch: front_crotch
          },
          success: function(response) {
            $("#message").html(response);
            window.scrollTo(0, 0);
            load_cart_item_number();
          }
        });
      });


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
  <script src="js/customized_uniform.js"></script>
</body>

</html>