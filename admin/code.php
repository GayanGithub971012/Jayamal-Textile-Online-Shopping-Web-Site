<?php
session_start();
include('config/dbcon.php');
include('config/dbcon.php');

if(isset($_POST['category_save']))
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $trending = $_POST['trending'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';
   
    $category_query = "INSERT INTO categories (name,description,trending,status) VALUES ('$name','$description','$trending','$status')";
    $cate_query_run = mysqli_query($con, $category_query);

    if($cate_query_run)
    {
        $_SESSION['status'] = "Categories Inserted Successfully";
        header("Location: category.php");
    }
    else
    {
        $_SESSION['status'] = "Categories Inserted Failed";
        header("Location: category.php");
    }
}

if(isset($_POST['category_update']))
{
    $cate_id = $_POST['cate_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $trending = $_POST['trending'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE categories SET name='$name', description='$description', trending='$trending', status='$status' WHERE id='$cate_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Category Updated Successfully";
        header("Location: category.php");
    }
    else
    {
        $_SESSION['status'] = "Category Updating Failed";
        header("Location: category.php");
    }

}

if(isset($_POST['cate_delete_btn']))
{
    $cate_id = $_POST['cate_delete_id'];
   
    $query = "DELETE FROM categories WHERE id='$cate_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Category Deleted Successfully";
        header("Location: category.php");
    }
    else
    {
        $_SESSION['status'] = "Category Deleting Failed";
        header("Location: category.php");
    }

}

if(isset($_POST['logout_btn']))
{
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    
    $_SESSION['status'] = "Logged out successfully";
    header('Location: login.php');
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
            header("Location: registered.php");
        }
        else
        {
            //Available = Record not found
            $user_query = "INSERT INTO users (username,phonenumber,email,password) VALUES ('$name','$phone','$email','$password')";
            $user_query_run = mysqli_query($con, $user_query);

            if($user_query_run)
            {
                $_SESSION['status'] = "User Added Successfully";
                header("Location: registered.php");
            }
            else
            {
                $_SESSION['status'] = "User Registration Failed";
                header("Location: registered.php");
            }
        }

        
    }
    else
    {
        $_SESSION['status'] = "Password and confirm password does not match.!";
        header("Location: registered.php");
    }

    

}

if(isset($_POST['addUser_website']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $phone = $_POST['phonenumber'];
    $address = $_POST['address'];
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
            header("Location: signup.php");
        }
        else
        {
            //Available = Record not found
            $user_query = "INSERT INTO users (username,phonenumber,email,password) VALUES ('$username','$phone','$email','$password')";
            $user_query_run = mysqli_query($con, $user_query);
            $user_query1 = "INSERT INTO customer (firstname,lastname,address) VALUES ('$firstname','$lastname','$address')";
            $user_query_run1 = mysqli_query($con, $user_query1);

            if($user_query_run)
            {
                $_SESSION['status'] = "User Added Successfully";
                header("Location: login.php");
            }
            else
            {
                $_SESSION['status'] = "User Registration Failed";
                header("Location: signup.php");
            }
        }    
    }
    else
    {
        $_SESSION['status'] = "Password and confirm password does not match.!";
        header("Location: registered.php");
    }

    

}

if(isset($_POST['updateUser']))
{
    $user_id = $_POST['user_id'];
    $name = $_POST['username'];
    $phone = $_POST['phonenumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $uType_ID = $_POST['uType_ID'];

    $query = "UPDATE users SET username='$name', phonenumber='$phone', email='$email', password='$password', uType_ID='$uType_ID' WHERE user_ID='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Updated Successfully";
        header("Location: registered.php");
    }
    else
    {
        $_SESSION['status'] = "User Updating Failed";
        header("Location: registered.php");
    }

}

if(isset($_POST['DeleteUserbtn']))
{
    $user_id = $_POST['delete_id'];
   
    $query = "DELETE FROM users WHERE user_ID='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "User Deleted Successfully";
        header("Location: registered.php");
    }
    else
    {
        $_SESSION['status'] = "User Deleting Failed";
        header("Location: registered.php");
    }

}
?>