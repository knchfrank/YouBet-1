<?php 
    session_start();
    error_reporting(0);
    require('php/getConnection.php');
    $conn = getConnection();
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    $matchID = $conn->real_escape_string($_GET['matchID']);
    $userID = $conn->real_escape_string($_GET['userID']);
    $odd = $conn->real_escape_string($_GET['odd']);
    $amount = $conn->real_escape_string($_GET['amount']);
    $matchResult = $conn->real_escape_string($_GET['matchResult']);
    $credit = $conn->real_escape_string($_GET['credit']);
    $credit = $credit-$amount;
    $reward = $amount*$odd;
    // echo $userID." ";
    // echo $amount." ";
    // echo $matchID." ";
    // echo $odd." ";
    // echo $reward;
    // echo $matchResult;
    $sql = "INSERT INTO `youbet`.`Betting` (`Bettrack`, `UserID`, `Date`, `AmountBet`, `MatchID`, `BettingResult`, `OddsRate`, `ReturnBetting`, `MatchResult`)
            VALUES (NULL, '$userID', CURRENT_TIMESTAMP, '$amount', '$matchID', '', '$odd', '$reward', '$matchResult');";
    $conn->query($sql);
    $sql = "UPDATE `youbet`.`User` SET `Credit` = '$credit' WHERE `User`.`UserID` = '$userID';";
    $conn->query($sql);
    $conn->close();
?>