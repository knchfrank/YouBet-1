<?php
    require('php/getConnection.php');
    $conn = getConnection();
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    /*
    $username = mysqli_real_escape_string($conn, $_GET['username']);
    $password = mysqli_real_escape_string($conn, $_GET['password']);
    $ccv = mysqli_real_escape_string($conn, $_GET['ccv']);
    */
    
    $credit = mysqli_real_escape_string($conn, $_GET['cred']);
    mysqli_query($conn,"UPDATE User SET Credit = Credit + '$credit' WHERE UserID = 'post'");
    
    echo "Top-up done !!! Please wait...";
    header( "refresh:2; url=creditmanagement.php" ); 
    mysqli_close($conn);
?>
