<!DOCTYPE html>
<html>
<head>
	<Title>YouBet</Title>
</head>
<body>
<?php
session_start();
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
$_SESSION['Username'] = mysqli_real_escape_string($con, $_POST['username']);
$username = $con->real_escape_string($_POST['username']);
$_SESSION['password'] = mysqli_real_escape_string($con, $_POST['password']);
$password = $con->real_escape_string($_POST['password']);
$passwordConfirm = $con->real_escape_string($_POST['passwordConfirm']);
$name = $firstname.$lastname;
$isUsed = 0 ;
$message1 = "Confirm Password Not Match";
$message2 = "Username is already exist";
$message3 = "Complete Register, Welcome to YouBet";
$bankAcount = $con->real_escape_string($_POST['Bankaccount']);
$CCV = $con->real_escape_string($_POST['CCV']);
$expireMM = $con->real_escape_string($_POST['expireMM']);
$expireYY = $con->real_escape_string($_POST['expireYY']);

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
		INSERT INTO User (UserID, Name, Password, Email,BankAccount,CCV,expireMM,expireYY)
		VALUES ('$username','$name','$password','$email','$bankAcount','$CCV','$expireMM','$expireYY')
		";  
	if (isset($_POST['username']) && isset($_POST['password']))
	{
		$_SESSION["isLogged"] = 1;
	}
		
	if ($con->query($sql) == false) {
		die("Error: " . $sql . "<br>" . $conn->error);
	}

	  echo "<script> alert('$message3');window.location = '../main.php';</script>";
}

$con->close();
?>
</body>
</html>