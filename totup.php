<?php
    require('php/getConnection.php');
    $conn = getConnection();
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = mysqli_real_escape_string($conn, $_GET['username']);    
    $credit = mysqli_real_escape_string($conn, $_GET['cred']);
    echo "$username";
    echo "$credit";
    $query1 = "SELECT * FROM User WHERE UserID = '$username'";
    $result1 = $conn->query($query1);
    $rs = $result1->fetch_array(MYSQLI_ASSOC); 
    if(isset($rs)) // correct ID
    {
        $query2 = "UPDATE User SET Credit = Credit + '$credit' WHERE UserID = '$username'";
        $result2 = $conn->query($query2);
        //mysqli_query($conn,"UPDATE User SET Credit = Credit + '$credit' WHERE UserID = '$username'");
        echo "$username";
        echo "Top-up done !!! Please wait...";
        header( "refresh:1; url=creditmanagement.php" ); 
    }
    else // wrong ID
    {
        // echo "kuy";
        echo "$username";
        echo "$credit";
        header( "refresh:1; url=creditmanagement.php" ); 
    }
    mysqli_close($conn);
?>
