<?php
    session_start();
    error_reporting(0);
    require('php/getConnection.php');
    $conn = getConnection();
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    $UserName = $conn->real_escape_string($_SESSION['Username']);
    $matchID = $conn->real_escape_string($_GET['matchID']);
    $query = "SELECT * FROM Matchinfo WHERE MatchID = '$matchID'";
    $result = $conn->query($query);
    $rs = $result->fetch_array(MYSQLI_ASSOC);

    class match {
        public $matchID = NULL;
        public $teamhome = NULL;
        public $teamaway = NULL;
        public $handicaphome = NULL;
        public $handicapaway = NULL;
        public $oddshome = NULL;
        public $oddsdraw = NULL;
        public $oddsaway = NULL;
    }
    $myObj = new match;

    // echo $matchID;

    if(isset($rs))
        {
          $myObj->matchID = $rs['MatchID'];
          $rs['Teamhome'] = substr($rs['Teamhome'], 0, 15);
          $myObj->teamhome = $rs['Teamhome'];
          $rs['Teamaway'] = substr($rs['Teamaway'], 0, 15);
          $myObj->teamaway = $rs['Teamaway'];
          $myObj->handicaphome = $rs['Handicaphome'];
          $myObj->handicapaway = $rs['Handicapaway'];
          $myObj->oddshome = $rs['Oddshome'];
          $myObj->oddsdraw = $rs['Oddsdraw'];
          $myObj->oddsaway = $rs['Oddsaway'];
        }
    $myObj = json_encode($myObj);
    echo $myObj;
    $con->close();
?>
