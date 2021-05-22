<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addUser']))
{
    $name = $_POST['username'];
    $phone = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if($password == $confirmpassword)
    {

        $checkemail = "SELECT email FROM users WHERE email='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);

        if(mysqli_num_rows($checkemail_run)>0)
        {
            //Taken Already exists
            $_SESSION['status'] = "Email id is already taken.!";
            header("Location: index.php");
        }
        else
        {
            //Available = Record not found
            $user_query = "INSERT INTO users (username,phonenumber,email,password) VALUES ('$name','$phone','$email','$password')";
            $user_query_run = mysqli_query($con, $user_query);

            if($user_query_run)
            {
                $_SESSION['status'] = "User Added Successfully";
                header("Location: index.php");
            }
            else
            {
                $_SESSION['status'] = "User Registration Failed";
                header("Location: index.php");
            }
        }

        
    }
    else
    {
        $_SESSION['status'] = "Password and confirm password does not match.!";
        header("Location: registered.php");
    }

    

}


?>

<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['addfeedback']))
{
    $name = $_POST['name'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $user_id = $_POST['auth'];

    $user_query = "INSERT INTO feedback (user_ID,f_date,f_description) VALUES ('$user_id','$date','$message')";
    $user_query_run = mysqli_query($con, $user_query);

    if($user_query_run)
    {
        $_SESSION['status'] = "User Added Successfully";
        header("Location: feedback.php");
    }
    else
    {
        $_SESSION['status'] = "User Registration Failed";
        header("Location: feedback.php");
    }
        
}


?>
<?php
if(isset($_POST['login_btn']))
{
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    header('Location: ../admin/login.php');
    exit(0);
}
if(isset($_POST['signup_btn']))
{
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    
    header('Location: ../admin/signup.php');
    exit(0);
}
if(isset($_POST['adminlogin_btn']))
{
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    
    header('Location: ../admin/adminlogin.php');
    exit(0);
}

if(isset($_POST['check_Emailbtn']))
{
    $email = $_POST['email'];

    $checkemail = "SELECT email FROM users WHERE email='$email'";
    $checkemail_run = mysqli_query($con, $checkemail);

    if(mysqli_num_rows($checkemail_run)>0)
    {
        echo "Email id already taken.!";
    }
    else
    {
        echo "It's Available";
    }
}

?>