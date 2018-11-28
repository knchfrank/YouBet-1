<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
require('getConnection.php');
$con = getConnection();
// Check connection
if ($con->connect_error) {
	echo "Failed to connect to MySQL: " . $conn->connect_error;
}
// escape variables for security
$firstname = $con->real_escape_string($_POST['firstname']);
$lastname = $con->real_escape_string($_POST['lastname']);
$email = $con->real_escape_string($_POST['email']);
$username = $con->real_escape_string($_POST['username']);
$password = $con->real_escape_string($_POST['password']);
$passwordConfirm = $con->real_escape_string($_POST['passwordConfirm']);
$name = $firstname.$lastname;
$isUsed = 0 ;
$message1 = "Confirm Password Not Match";
$message2 = "Username is already exist";
$message3 = "Complete Register, Welcome to YouBet";

if(strcmp($password,$passwordConfirm) != 0) { 		// check same password 
	echo "<script> alert('$message1');window.location = '../register.html';</script>";
}

$sql = "
	SELECT UserID FROM `User`
	";
$result = $con->query($sql);
if ($result->num_rows > 0) {				// check same username 	
    while($row = $result->fetch_assoc()) {
		// echo $row["UserID"]."<br>";
		if(strcmp($row["UserID"],$username) == 0) {
			$isUsed = 1;
			break;
		}	
    }
}

if($isUsed)
{
	echo "<script> alert('$message2');window.location = '../register.html';</script>";
} else {
	$sql = "
		INSERT INTO User (UserID, Name, Password, Email)
		VALUES ('$username','$name','$password','$email')
		";  
	
	if ($con->query($sql) == false) {
		die("Error: " . $sql . "<br>" . $conn->error);
	}

	echo "<script> alert('$message3');window.location = '../mainlogin.html';</script>";
}

$con->close();
?>
</body>
</html>