<?php
session_start();
include('config/dbcon.php');

if (isset($_POST['addUser'])) {
    $name = $_POST['username'];
    $phone = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($password == $confirmpassword) {

        $checkemail = "SELECT email FROM users WHERE email='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);

        if (mysqli_num_rows($checkemail_run) > 0) {
            //Taken Already exists
            $_SESSION['status'] = "Email id is already taken.!";
            header("Location: index.php");
        } else {
            //Available = Record not found
            $user_query = "INSERT INTO users (username,phonenumber,email,password) VALUES ('$name','$phone','$email','$password')";
            $user_query_run = mysqli_query($con, $user_query);

            if ($user_query_run) {
                $_SESSION['status'] = "User Added Successfully";
                header("Location: index.php");
            } else {
                $_SESSION['status'] = "User Registration Failed";
                header("Location: index.php");
            }
        }
    } else {
        $_SESSION['status'] = "Password and confirm password does not match.!";
        header("Location: registered.php");
    }
}


?>

<?php
include('config/dbcon.php');

if (isset($_POST['addfeedback'])) {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $user_id = $_POST['auth'];

    $user_query = "INSERT INTO feedback (user_ID,f_date,f_description) VALUES ('$user_id','$date','$message')";
    $user_query_run = mysqli_query($con, $user_query);

    if ($user_query_run) {
        $_SESSION['status'] = "User Added Successfully";
        header("Location: feedback.php");
    } else {
        $_SESSION['status'] = "User Registration Failed";
        header("Location: feedback.php");
    }
}


?>
<?php
if (isset($_POST['login_btn'])) {
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    header('Location: ../admin/login.php');
    exit(0);
}
if (isset($_POST['signup_btn'])) {
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    header('Location: ../admin/signup.php');
    exit(0);
}
if (isset($_POST['logout_btn'])) {
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['status'] = "Logged out successfully";
    header('Location: index.php');
    exit(0);
}

if (isset($_POST['user_btn'])) {
    header('Location: userprofile.php');
}

if (isset($_POST['adminlogin_btn'])) {
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    header('Location: ../admin/adminlogin.php');
    exit(0);
}

if (isset($_POST['check_Emailbtn'])) {
    $email = $_POST['email'];

    $checkemail = "SELECT email FROM users WHERE email='$email'";
    $checkemail_run = mysqli_query($con, $checkemail);

    if (mysqli_num_rows($checkemail_run) > 0) {
        echo "Email id already taken.!";
    } else {
        echo "It's Available";
    }
}

?>
<?php
// Add products into the cart table
if (isset($_SESSION['auth_user'])) {
    if (isset($_POST['u_id'])) {
        $user_id = $_SESSION['auth_user']['user_id'];
        $u_id = $_POST['u_id'];
        $u_qty = $_POST['u_qty'];
        $u_size = $_POST['u_size'];

        $query = "SELECT * FROM uniform WHERE uniform_ID = '$u_id'";
        $result = $con->query($query);
        $row = mysqli_fetch_assoc($result);
        $c_name = $row['c_name'];

        if ($u_size == 'size2') {
            $query1 = "SELECT * FROM categoryprice WHERE c_name = '$c_name'";
            $result1 = $con->query($query1);
            $row1 = mysqli_fetch_assoc($result1);
            $price = $row1['size2_price'];
        } elseif ($u_size == 'size4') {
            $query1 = "SELECT * FROM categoryprice WHERE c_name = '$c_name'";
            $result1 = $con->query($query1);
            $row1 = mysqli_fetch_assoc($result1);
            $price = $row1['size4_price'];
        } elseif ($u_size == 'size6') {
            $query1 = "SELECT * FROM categoryprice WHERE c_name = '$c_name'";
            $result1 = $con->query($query1);
            $row1 = mysqli_fetch_assoc($result1);
            $price = $row1['size6_price'];
        } elseif ($u_size == 'size8') {
            $query1 = "SELECT * FROM categoryprice WHERE c_name = '$c_name'";
            $result1 = $con->query($query1);
            $row1 = mysqli_fetch_assoc($result1);
            $price = $row1['size8_price'];
        } elseif ($u_size == 'size10') {
            $query1 = "SELECT * FROM categoryprice WHERE c_name = '$c_name'";
            $result1 = $con->query($query1);
            $row1 = mysqli_fetch_assoc($result1);
            $price = $row1['size10_price'];
        } elseif ($u_size == 'size12') {
            $query1 = "SELECT * FROM categoryprice WHERE c_name = '$c_name'";
            $result1 = $con->query($query1);
            $row1 = mysqli_fetch_assoc($result1);
            $price = $row1['size12_price'];
        }

        $total_price = $price * $u_qty;
        $user_query = "INSERT INTO orderdetails (uniform_ID,user_ID,selected_size,price,quantity,total_price) VALUES('$u_id','$user_id','$u_size','$price','$u_qty','$total_price')";
        $user_query_run = mysqli_query($con, $user_query);

        if ($user_query_run) {

            header("Location: uniform-single.php");
        } else {

            header("Location: uniform-single.php");
        }
    }
} else {
}
?>
<?php
// Get no.of items available in the cart table
if (isset($_SESSION['auth_user'])) {
    if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
        $user_id = $_SESSION['auth_user']['user_id'];
        $stmt = $con->prepare("SELECT * FROM orderdetails WHERE user_ID ='$user_id'");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;

        echo $rows;
    } else {
        $rows = 0;
        echo $rows;
    }
}
?>
  <?php
    // Remove single items from cart
    if (isset($_GET['remove'])) {
        $id = $_GET['remove'];

        $stmt = $con->prepare('DELETE FROM orderdetails WHERE order_ID=?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Item removed from the cart!';
        header('location:cart.php');
    }

    // Set total price of the product in the cart table
    if (isset($_POST['qty'])) {
        $qty = $_POST['qty'];
        $o_id = $_POST['o_id'];
        $price = $_POST['price'];

        $tprice = $qty * $price;



        $user_query = "UPDATE orderdetails SET quantity= $qty,total_price=$tprice WHERE order_ID= $o_id";
        $user_query_run = mysqli_query($con, $user_query);
        if ($user_query_run) {

            header("Location: cart.php");
        }
    }
    // Checkout and save customer info in the orders table
    if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
        $user_id = $_POST['user_id'];
        $products = $_POST['products'];
        $grand_total = $_POST['grand_total'];
        $address = $_POST['address'];
        $district = $_POST['district'];
        $postal = $_POST['postal'];
        $due_date = $_POST['due_date'];
        $order_date = date("Y-m-d");




        $data = '';

        $stmt = $con->prepare('INSERT INTO orders (user_ID,orders,order_date,due_date,delivery_address,district,postal_code)VALUES(?,?,?,?,?,?,?)');
        $stmt->bind_param('sssssss', $user_id, $products, $order_date, $due_date, $address, $district, $postal);
        $stmt->execute();
        $stmt2 = $con->prepare('DELETE FROM orderdetails');
        $stmt2->execute();
        $data .= '<div class="site-section">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                        <span class="icon-check_circle display-3 text-warning"></span>
                        <h2 class="display-3 text-black">Thank you!</h2>
                        <p class="lead mb-5">You order was successfuly completed.</p>
                        <p><a href="index.php" class="btn btn-sm btn-dark">Back to shop</a></p>
                        </div>
                    </div>
                    </div>
                </div>';
        echo $data;
    }
    ?>

