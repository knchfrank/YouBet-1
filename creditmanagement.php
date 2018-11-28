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
  <Title>YouBet</Title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.1.3.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"> <a class="navbar-brand" href="main.php">
        <i class="fa d-inline fa-lg fa-circle-o"></i>
        <b> Youbet</b>
      </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar11">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar11">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-puzzle-piece"></i>&nbsp;My Bets</a> </li>
          <li class="nav-item"> <a class="nav-link" href="creditmanagement.php"><i class="fa fa-credit-card-alt"></i>&nbsp;Credit</a> </li>
          <li class="nav-item"> <a class="nav-link" href="account.php"><i class="fa fa-user fa-fw"></i>Account</a> </li>
          <li class="nav-item"> <a class="nav-link" ><i class="fa fa-star-o"></i>&nbsp;Promotions</a> </li>
          <li class="nav-item"> <a class="nav-link" ><i class="fa fa-envelope-o	"></i>&nbsp;News</a> </li>
        </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"> <a class="nav-link">Your Balance:</a> </li>
            <li class="nav-item"> <a class="nav-link" style="color:lightgreen"> <?php echo $Credit?> Credits</a> </li>
            <li class="nav-item"> <a class="nav-link" href="http://localhost/YouBet/account.php\">Hello, <?php echo $UserName?> </a> </li>
            </ul> <a class="btn navbar-btn ml-md-2 text-light btn-danger" href="http://localhost/YouBet/php/Userlogin.php"><i class="fa fa-sign-out"></i>&nbsp;sign out</a>"; 
      </div>
    </div>
  </nav>
  <div class="py-5 text-center text-md-right text-light" style="background-image: url(Pics/5485161-football-hd-wallpapers.jpg);	background-position: right bottom;	background-size: cover;	background-repeat: repeat;	background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="p-5 mx-auto mx-md-0 ml-md-auto col-10 col-md-9">
          <h3 class="display-3">Youbet</h3>
          <p class="mb-3 lead">Hello, welcome to Youbet.&nbsp;<br>We're online football betting website.<br>What are you waiting for? Let's role!!<br></p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-3" style="">
          <div class="card"> <img class="card-img-top" src="Pics/PostCapture.PNG" alt="Card image cap">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">View profile picture</li>
              <li class="list-group-item">Edit profile picture</li>
              <li class="list-group-item">Option</li>
            </ul>
            <div class="card-body"> <a href="#" class="card-link text-danger">Delete</a> </div>
          </div>
        </div>
        <div class="py-3 col-md-9" style="">
          <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li class="nav-item" style=""> <a href = "" class="nav-link active show" data-toggle="tab" data-target="#tabtwo"><i class="fa fa-dollar"></i>&nbsp;Withdraw</a> </li>
              <li class="nav-item" style=""> <a href = "" class="nav-link" data-toggle="tab" data-target="#tabone"><i class="fa fa-money"></i>&nbsp;Top-up</a> </li>
            </ul>
            <div class="tab-content mt-2">
              <div class="tab-pane fade" id="tabone" role="tabpanel">
                <h1>Top-up</h1>
                <h3 class="">Available Balance :&nbsp;<span class="badge badge-success"><?php echo $Credit ." Credit"?></span></h3>
                
                <form action = "totup.php" method="get">
                  <div class="form-group"> <label for="form17">Username</label> <input type="text" class="form-control" name="username" value=""> </div>
                  
                  <div class="form-group"> <label for="form17">CCV</label> <input type="password" class="form-control" name="ccv"> </div>
                <div class="row">
                  <div class="text-center col-md-12">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-6 p-3">
                    <div class="card bg-light">
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-12">
                            <h3 class="mb-0">Start</h3>
                          </div>
                          <div class="text-right col-12">
                            <h2 class="mb-0"><b>฿100.00</b></h2>
                          </div>
                        </div>
                        <p class="my-3">100 THB is enough for starter, appropriately.</p>
                        <ul class="pl-3">
                          <li>Cheap</li>
                          <li>Safe</li>
                          <li>For starter</li>
                        </ul> 
                            <button type="submit" name="cred" value= 100  class="btn btn-primary mt-3">
                              Confirm
                            </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 p-3">
                    <div class="card bg-light">
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-12">
                            <h3 class="mb-0">Medium</h3>
                          </div>
                          <div class="text-right col-12" style="">
                            <h2 class="mb-0"><b>฿500.00</b></h2>
                          </div>
                        </div>
                        <p class="my-3">This is neither too low, or high. It's 500 THB, and quite interesting to risk for this level.&nbsp;</p>
                        <ul class="pl-3">
                          <li>Not too low</li>
                          <li>Not too high</li>
                          <li>Interesting</li>
                        </ul>
                          <button type="submit" name="cred" value=500 class="btn btn-primary mt-3">
                            Confirm
                          </button>
                        <!-- </form> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 p-3">
                    <div class="card bg-light">
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-12">
                            <h3 class="mb-0">Custom</h3>
                          </div>
                          <div class="text-right col-12">
                            <h2 class="mb-0"><b>฿???</b></h2>
                          </div>
                        </div>
                        <p class="my-3">This is up to you, so please fill the amount in input form and make sure, correctly.</p>
                        <ul class="pl-3">
                          <li>Depends on you</li>
                          <li>Your business</li>
                          <li>Think carefully</li>
                        </ul>
                        <!-- <form class="form-inline"> -->
                        <!-- <form action = "totup.php" method="get" form class="text-left"> -->
                          <div class="form-group">
                            <input type="number" class="form-control w-75" name="cred" value = ""> 
                          </div>
                          <button type="submit" value="cred" class="btn btn-primary mt-2">Confirm</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
              
              <div class="tab-pane fade active show" id="tabtwo" role="tabpanel">
                <h1>Withdraw</h1>
                <h3 class="">Available Balance :&nbsp;<span class="badge badge-success"><?php echo $Credit?></span></h3>
                <form class="text-left">
                  <div class="form-group"> <label for="form17">User Name</label> <input type="text" class="form-control" id="form17" placeholder="Sarin Post" style=""> </div>
                  <div class="form-group"> <label for="form17">Password</label> <input type="password" class="form-control" id="form17" placeholder="*************" style=""> </div>
                </form>
                <div class="row">
                  <div class="text-center col-md-12">
                    <h1>Withdraw</h1>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-6 p-3">
                    <div class="card bg-light">
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-12">
                            <h3 class="mb-0">Wanted</h3>
                          </div>
                          <div class="text-right col-12">
                            <h2 class="mb-0"><b>฿100.00</b></h2>
                          </div>
                        </div>
                        <p class="my-3">This plan is for user that don't need money, but just want it.</p>
                        <ul class="pl-3">
                          <li>No need money</li>
                          <li>Just wanted</li>
                          <li>For user who is calm to claim it.</li>
                        </ul>
                        <a class="btn btn-primary mt-3" href="#">Confirm</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 p-3">
                    <div class="card bg-light">
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-12">
                            <h3 class="mb-0">Require</h3>
                          </div>
                          <div class="text-right col-12" style="">
                            <h2 class="mb-0"><b>฿500.00</b></h2>
                          </div>
                        </div>
                        <p class="my-3">This plan is for user that have the demand in the medium level.</p>
                        <ul class="pl-3">
                          <li>Just require it</li>
                          <li>Not too high level of demand</li>
                          <li>Easily and slowly claim it</li>
                        </ul> <a class="btn btn-primary mt-3" href="#">Confirm</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 p-3">
                    <div class="card bg-light">
                      <div class="card-body p-3">
                        <div class="row">
                          <div class="col-12">
                            <h3 class="mb-0">Desire</h3>
                          </div>
                          <div class="text-right col-12">
                            <h2 class="mb-0" style=""><b>฿???</b></h2>
                          </div>
                        </div>
                        <p class="my-3">I need money, where is my money. Send me my money!&nbsp;</p>
                        <ul class="pl-3">
                          <li>Need money</li>
                          <li>Where is my money?</li>
                          <li>Extremely claim money</li>
                        </ul>                       
                        <form class="form-inline" action="" method = "">
                          <div class="form-group">
                            <input type="number" class="form-control w-75" id="inputpasswordinline" placeholder="0.00 THB"> </div>
                          <button type="submit" class="btn btn-primary mt-2">Confirm</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" style=""></script>
</body>

</html>