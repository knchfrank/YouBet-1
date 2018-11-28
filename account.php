<?php
session_start();
error_reporting(0);
require('php/getConnection.php');
$conn = getConnection();
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
    $UserName = $_SESSION['Username'];
    $query = "SELECT * FROM User WHERE UserID = '$UserName'";
    $result = $conn->query($query);
    $rs = $result->fetch_array(MYSQLI_ASSOC);
    if(isset($rs))
    {
      $Credit = $rs['Credit'];
    }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme2.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"> <a class="navbar-brand" href="#">
        <i class="fa d-inline fa-lg fa-circle-o"></i>
        <b> Youbet</b>
      </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar11">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar11">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-puzzle-piece"></i>&nbsp;My Bets</a> </li>
          <li class="nav-item"> <a class="nav-link" href="account.html"><i class="fa fa-credit-card-alt"></i>&nbsp;Credit</a> </li>
          <li class="nav-item"> <a class="nav-link" href="account.html"><i class="fa fa-user fa-fw"></i>Account</a> </li>
          <li class="nav-item"> <a class="nav-link" href="account.html" contenteditable="true"><i class="fa fa-bell"></i>&nbsp;Announcements</a> </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="nav-link" href="#">Hello, <?php echo $UserName;?></a> </li>
          <li class="nav-item border" style=""> <a class="nav-link" href="#">$</a> </li>
          <li class="nav-item" style=""> <a class="nav-link border" href="#"><?php echo $Credit;?> Credit</a> </li>
        </ul> <a class="btn navbar-btn ml-md-2 text-light btn-primary"><i class="fa fa-envelope"></i>&nbsp;Mail</a><a class="btn navbar-btn ml-md-2 text-light btn-danger"><i class="fa fa-sign-out"></i>&nbsp;sign out</a>
      </div>
    </div>
  </nav>
  <div class="py-5 text-center text-md-right text-light" style="	background-image: url(Pics/5485161-football-hd-wallpapers.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat;	background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="p-5 mx-auto mx-md-0 ml-md-auto col-10 col-md-9" style="">
          <h3 class="display-3">Youbet</h3>
          <p class="mb-3 lead">Hello, welcome to Youbet.&nbsp;<br>We're online football betting website.<br>What are you waiting for? Let's role!!<br></p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-tabs">
            <li class="nav-item"> <a href="#" class="active nav-link"><i class="fa fa-address-book-o"></i>&nbsp;Profile</a> </li>
            <li class="nav-item"> <a href="#" class="nav-link"><i class="fa fa-bar-chart"></i> Statistic</a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card"> <img class="card-img-top" src="Pics/PostCapture.PNG" alt="Card image cap" style="">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">View profile picture</li>
              <li class="list-group-item">Edit profile picture</li>
              <li class="list-group-item">Option</li>
            </ul>
            <div class="card-body"> <a href="#" class="card-link text-danger">Delete</a> </div>
          </div>
        </div>
        <div class="col-md-9">
          <h1 class="display-1 text-primary" style="">Profile <a class="btn btn-danger" href="#">Edit profile</a></h1>
          <h1 class="pi-draggable text-secondary">User:&nbsp;</h1>
          <p class="lead pi-draggable text-warning">Level:&nbsp;</p>
          <p class="pi-draggable">Paragraph. Blah blah blah blah</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" style=""></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" style=""></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 20px;right:20px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:220px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;<img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16"></pingendo>
</body>

</html>