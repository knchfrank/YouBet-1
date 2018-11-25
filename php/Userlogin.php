<?php
session_start();
error_reporting(0);
require('getConnection.php');
$con = getConnection();
// Check connection
if ($con->connect_error) {
	echo "Failed to connect to MySQL: " . $conn->connect_error;
}

$username = $con->real_escape_string($_POST['username']);
$password = $con->real_escape_string($_POST['password']);
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
            echo "<script> alert('$message1'); window.location = '../mainlogin.html';</script>";
            
        } else {
            echo "<script> alert('$message2'); window.location = '../login.html';</script>";
        }
    } else {
        echo "<script> alert('$message3'); window.location = '../login.html';</script>";
    }
}
?>