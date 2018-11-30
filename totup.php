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
    //echo "$credit";
    $query = "UPDATE User SET Credit = Credit + '$credit' WHERE UserID = '$username'";
    $result = $conn->query($query);
    //echo "Top-up done !!! Please wait...";
    //header( "refresh:1; url=creditmanagement.php" );
    echo "<script> alert('Top-up complete'); window.location = 'creditmanagement.php';</script>";
    mysqli_close($conn);
?>
