<?php
session_start();
include('config/dbcon.php');

if(isset($_POST['login_btn']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $log_query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $log_query_run = mysqli_query($con, $log_query);

    if(mysqli_num_rows($log_query_run) > 0)
    {
        foreach($log_query_run as $row)
        {
            $user_id = $row['user_ID'];
            $user_name = $row['username'];
            $user_email = $row['email'];
            $user_phone = $row['phonenumber'];
            $uType_ID = $row['uType_ID'];
        } 

        $_SESSION['auth'] = "$uType_ID";
        $_SESSION['auth_user'] = [
            'user_id' =>$user_id,
            'user_name' =>$user_name,
            'user_email' =>$user_email,
            'user_phone' =>$user_phone
        ];
        $_SESSION['status'] = "Logged In Successfully";
        header('Location: index.php');

    }
    else
    {
        $_SESSION['status'] = "Invalid Email of password";
        header('Location: login.php');
    }

    
}
else
{
    $_SESSION['status'] = "Access Denied";
    header('Location: login.php');
}
