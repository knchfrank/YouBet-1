<Title>YouBet</Title>
<?php
    session_start();
    require('php/getConnection.php');
    $conn = getConnection();
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = $_SESSION['Username']; 
    $credit = mysqli_real_escape_string($conn, $_GET['cred']);
    $query = "SELECT Credit FROM User WHERE UserID = '$username'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    // echo $row["Credit"];
    // echo $credit;
    if($row["Credit"] < $credit)
    {
        echo "<script> alert('Withdraw Canceled , Your account do not have enough money'); window.location = 'creditmanagement.php';</script>";
    }
    else
    {
        $query1 = "UPDATE User SET Credit = Credit - '$credit' WHERE UserID = '$username'";
        $result1 = $conn->query($query1);
        //echo "Top-up done !!! Please wait...";
        //header( "refresh:1; url=creditmanagement.php" );
        echo "<script> alert('Withdraw complete'); window.location = 'creditmanagement.php';</script>";
    }
    mysqli_close($conn);
?>
