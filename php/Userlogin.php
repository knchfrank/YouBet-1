<?php
session_start();
error_reporting(0);
require('getConnection.php');
$con = getConnection();
// Check connection
if ($con->connect_error) {
	echo "Failed to connect to MySQL: " . $conn->connect_error;
}
$_SESSION['Username'] = mysqli_real_escape_string($con, $_POST['username']);
$username = mysqli_real_escape_string($con,$_POST['username']);
$_SESSION['password'] = mysqli_real_escape_string($con, $_POST['password_']);
$password = mysqli_real_escape_string($con, $_POST['password_']);;
$message1 = "Login Success";
$message2 = "Wrong Password";
$message3 = "Wrong UserID";
if (isset($_POST['username']) && isset($_POST['password'])) {
    $query = "SELECT * FROM User WHERE UserID = '$username'";
    $result = $con->query($query);
    $rs = $result->fetch_array(MYSQLI_ASSOC);   // fetch 1 row
    if(isset($rs)) {
        $storePassword = $rs['Password'];
        if(strcmp($_POST['password'],$storePassword)==0) {
            echo "<script> alert('$message1'); ";
            header("location:../mainlogin.php");
            
        } else {
            echo "<script> alert('$message2'); window.location = '../login.html';</script>";
        }
    } else {
        echo "<script> alert('$message3'); window.location = '../login.html';</script>";
    }
}
?>