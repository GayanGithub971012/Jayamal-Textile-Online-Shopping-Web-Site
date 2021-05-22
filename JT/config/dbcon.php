<?php

$host ="localhost";
$username ="root";
$password = "";
$database = "jayamaltextilesdb";

//Connection
$con = mysqli_connect("$host","$username","$password","$database");

// Check connection
if(!$con)
{
    header("Location: ../admin/errors/db.php");
    die();
}
else
{
    echo "";
}
?>