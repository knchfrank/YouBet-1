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
          <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-user fa-fw"></i>Account</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-star-o"></i>&nbsp;Promotions</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-envelope-o	"></i>&nbsp;News</a> </li>
        </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"> <a class="nav-link">Your Balance:</a> </li>
            <li class="nav-item"> <a class="nav-link" style="color:lightgreen"> <?php echo $Credit?> Credits</a> </li>
            <li class="nav-item"> <a class="nav-link" href="#">Hello, <?php echo $UserName?> </a> </li>
            </ul> <a class="btn navbar-btn ml-md-2 text-light btn-danger" href="http://localhost/YouBet/php/Userlogin.php"><i class="fa fa-sign-out"></i>&nbsp;sign out</a>"; 
      </div>
    </div>
  </nav>
  <div class="py-5 text-center text-md-right text-light" style="background-image: url(https://fsmedia.imgix.net/43/e9/9e/ac/0c64/4d0e/a2bc/dda1d61a31db/on-fire.jpeg?rect=0%2C56%2C1280%2C640&dpr=2&auto=format%2Ccompress&w=650);	background-position: right bottom;	background-size: cover;	background-repeat: repeat;	background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="p-5 mx-auto mx-md-0 ml-md-auto col-10 col-md-9">
          <h3 class="display-3" style = "color:green">Youbet</h3>
          <p class="mb-3 lead" style = "color:red">Hello, "Welcome to Youbet.&nbsp;<br>We're online football betting website.<br>What are you waiting for? Let's role!!<br></p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-3" style="">
          <div class="card"style="margin-top:25px;"> 
            <!-- <img class="card-img-top" src="Pics/PostCapture.PNG" alt="Card image cap"> -->
            <ul class="list-group list-group-flush">
              <li class="list-group-item" ><a href = "#">My Profile </a></li>
              <li class="list-group-item" ><a href = "#">Edit Profile </a></li>
              <li class="list-group-item" ><a href = "#">Withdraw / Topup</a></li>
              <!-- <li class="list-group-item" ><a href = "#" data-toggle="tab" data-target="#tabone">Top-up</a></li> -->
              <li class="list-group-item" ><a href = "#">Credit Statement </a></li>
              <li class="list-group-item" ><a href = "#">Betting History </a></li>
              <li class="list-group-item" ><a href = "#">Account Binding </a></li>
            </ul>
            <!-- <div class="card-body"> <a href="#" class="card-link text-danger">Delete</a> </div> -->
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
                  <!-- <div class="form-group"> <label for="form17">Username</label> <input type="text" class="form-control" name="username" value=""> </div>
                  
                  <div class="form-group"> <label for="form17">CCV</label> <input type="password" class="form-control" name="ccv"> </div> -->
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
                      </form>
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
                          <form action = "totup.php" method="get">
                          <button type="submit" name="cred" value=500 class="btn btn-primary mt-3">
                            Confirm
                          </button>
                        </form>
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
                        <!-- <form class="form-inline">  -->
                        <form action = "totup.php" method="get">
                          <div class="form-group">
                            <input type="number" class="form-control w-75" name="cred" placeholder="0.00 THB" value = ""> 
                          </div>
                          <button type="submit" value ="cred" class="btn btn-primary mt-2">Confirm</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
              
              <div class="tab-pane fade active show" id="tabtwo" role="tabpanel">
                <h1>Withdraw</h1>
                <h3 class="">Available Balance :&nbsp;<span class="badge badge-success"><?php echo $Credit." Credit"?></span></h3>
                <form class="text-left">
                  <!-- <div class="form-group"> <label for="form17">User Name</label> <input type="text" class="form-control" id="form17" placeholder="Sarin Post" style=""> </div>
                  <div class="form-group"> <label for="form17">Password</label> <input type="password" class="form-control" id="form17" placeholder="*************" style=""> </div> -->
                </form>
                <div class="row">
                  <div class="text-center col-md-12">
                    <!-- <h1>Withdraw</h1> -->
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
                        <form action = "withdraw.php" method="get">
                        <button type="submit" name="cred" value= 100  class="btn btn-primary mt-3">
                              Confirm
                        </button>
                        </form>
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
                        </ul> 
                        <form action = "withdraw.php" method="get">
                        <button type="submit" name="cred" value=500  class="btn btn-primary mt-3">
                              Confirm
                        </button>
                        </form>
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
                        <form action = "withdraw.php" method="get">
                          <div class="form-group">
                            <input type="number" class="form-control w-75" name="cred" placeholder="0.00 THB" value =""> </div>
                          <button type="submit" value ="cred" class="btn btn-primary mt-2">Confirm</button>
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
  <div class="py-3 bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-6 p-3">
            <div class="container"> <a class="navbar-brand" href="main.php">
                <h2 style="color:white"><i class="fa d-inline fa-lg fa-circle-o"></i><b> Youbet</b> </h2>
              </a></div>
            <ul class="list-unstyled">
              <li> <b style="color:white">The more money you lose the more we get.</b> </li>
              <li> <b style="color:white">Hope you enjoy our entertainment that we had been made</b> </li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 p-3">
            <h5> <b style="color:white">Follow us</b> </h5>
            <div class="row">
              <div class="col-md-12 d-flex align-items-center justify-content-between my-2" > <a href="https://www.facebook.com/sarinsa" >
                  <i class="d-block fa fa-facebook-official text-muted fa-lg mr-2" ></i>
                </a> <a href="https://www.instagram.com/post678910/?hl=en">
                  <i class="d-block fa fa-instagram text-muted fa-lg mx-2"></i>
                </a> <a href="#">
                  <i class="d-block fa fa-google-plus-official text-muted fa-lg mx-2"></i>
                </a> <a href="#">
                  <i class="d-block fa fa-pinterest-p text-muted fa-lg mx-2"></i>
                </a> <a href="#">
                  <i class="d-block fa fa-reddit text-muted fa-lg mx-2"></i>
                </a> <a href="#">
                  <i class="d-block fa fa-twitter text-muted fa-lg ml-2"></i>
                </a> </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p class="mb-0 mt-2">© 2018 Youbet. All rights reserved</p>
          </div>
        </div>
      </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" style=""></script>
</body>

</html>