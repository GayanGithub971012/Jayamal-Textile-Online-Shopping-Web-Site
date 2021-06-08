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


//email check function for signup
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

//user table add data from website
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

//user table add data from admin panel
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

//user table edit data from admin panel
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

//user table delete data from admin panel
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

//categoryprice table add data from admin panel
if(isset($_POST['addCategory']))
{
    $categoryname = $_POST['categoryname'];
    $size2price = $_POST['size2price'];
    $size4price = $_POST['size4price'];
    $size6price = $_POST['size6price'];
    $size8price = $_POST['size8price'];
    $size10price = $_POST['size10price'];
    $size12price = $_POST['size12price'];
    
    
    $cate_query = "INSERT INTO categoryprice (c_name, size2_price, size4_price, size6_price, size8_price, size10_price, size12_price) VALUES ('$categoryname','$size2price','$size4price','$size6price','$size8price','$size10price','$size12price')";
    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        $_SESSION['status'] = "Category Added Successfully";
        header("Location: categoryprice.php");
    }
    else
    {
        $_SESSION['status'] = "Category Add Failed";
        header("Location: categoryprice.php");
    }
      

}

//categoryprice table edit data from admin panel
if(isset($_POST['editCategory']))
{
    $c_name = $_POST['c_name'];
    $size2_price = $_POST['size2_price'];
    $size4_price = $_POST['size4_price'];
    $size6_price = $_POST['size6_price'];
    $size8_price = $_POST['size8_price'];
    $size10_price = $_POST['size10_price'];
    $size12_price = $_POST['size12_price'];

    $query = "UPDATE categoryprice SET c_name='$c_name', size2_price='$size2_price', size4_price='$size4_price', size6_price='$size6_price', size8_price='$size8_price', size10_price='$size10_price', size12_price='$size12_price' WHERE c_name='$c_name' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Category Updated Successfully";
        header("Location: categoryprice.php");
    }
    else
    {
        $_SESSION['status'] = "Category Updating Failed";
        header("Location: categoryprice.php");
    }

}

//categoryprice table delete data from admin panel
if(isset($_POST['deleteCategory']))
{
    $category_name = $_POST['delete_id'];
   
    $query = "DELETE FROM categoryprice WHERE c_name='$category_name' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Category Deleted Successfully";
        header("Location: categoryprice.php");
    }
    else
    {
        $_SESSION['status'] = "Category Deleting Failed";
        header("Location: categoryprice.php");
    }

}

//Unifrom table add data from admin panel
if(isset($_POST['addUniform']))
{
    $uniform_ID = $_POST['uniform_ID'];
    $u_description = $_POST['u_description'];
    $u_name = $_POST['u_name'];
    $c_name = $_POST['c_name'];
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    
    
    $uni_query = "INSERT INTO uniform (uniform_ID, u_description ,u_image ,u_name ,c_name) VALUES ('$uniform_ID','$u_description','$file','$u_name','$c_name')";
    $uni_query_run = mysqli_query($con, $uni_query);

    if($uni_query_run)
    {
        $_SESSION['status'] = "Unifrom Added Successfully";
        header("Location: uniform.php");
    }
    else
    {
        $_SESSION['status'] = "Unifrom Add Failed";
        header("Location: uniform.php");
    }
      

}

//Uniform table edit data from admin panel
if(isset($_POST['editUniform']))
{
    $uniform_ID = $_POST['uniform_ID'];
    $u_description = $_POST['u_description'];
    $u_image = $_POST['u_image'];
    $u_name = $_POST['u_name'];
    $c_name = $_POST['c_name'];
    

    $query = "UPDATE uniform SET uniform_ID='$uniform_ID', u_description='$u_description', u_image='$u_image', u_name='$u_name', c_name='$c_name' WHERE uniform_ID='$uniform_ID' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Uniform Updated Successfully";
        header("Location: uniform.php");
    }
    else
    {
        $_SESSION['status'] = "Uniform Updating Failed";
        header("Location: uniform.php");
    }

}

//Uniform table delete data from admin panel
if(isset($_POST['deleteUniform']))
{
    $uniform_id = $_POST['delete_id'];
   
    $query = "DELETE FROM uniform WHERE uniform_ID='$uniform_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Uniform Deleted Successfully";
        header("Location: uniform.php");
    }
    else
    {
        $_SESSION['status'] = "Uniform Deleting Failed";
        header("Location: uniform.php");
    }

}


//orders table edit data from admin panel
if(isset($_POST['editOrders']))
{
    $status = $_POST['status'];
    $order_id = $_POST['order_id'];

    $query = "UPDATE orders SET status='$status' WHERE order_ID='$order_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Order Status Updated Successfully";
        header("Location: orders.php");
    }
    else
    {
        $_SESSION['status'] = "Order Status Updating Failed";
        header("Location: orders.php");
    }

}

//orders table delete data from admin panel
if(isset($_POST['deleteOrder']))
{
    $order_id = $_POST['delete_id'];
   
    $query = "DELETE FROM orders WHERE order_ID='$order_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Order Deleted Successfully";
        header("Location: orders.php");
    }
    else
    {
        $_SESSION['status'] = "order Deleting Failed";
        header("Location: orders.php");
    }

}
