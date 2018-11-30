<?php
session_start();
error_reporting(0);
ini_set('display_errors', 0);
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
<Title>YouBet</Title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme2.css">
</head>
<style>
    /* Button used to open the contact form - fixed at the bottom of the page */
    /* The popup form - hidden by default */
    .form-popup {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      padding: 10px;
      background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text],
    .form-container input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus,
    .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
      opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
      opacity: 1;
    }
  </style>
</head>
<style>
  .form-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
  }

  .form-container {
    max-width: 400px;
    padding: 20px;
    background-color: white;
  }

</style>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"> <a class="navbar-brand mx-2" href="main.php">
        <i class="fa d-inline fa-lg fa-circle-o"></i>
        <b> Youbet</b>
      </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar11">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar11">
        <?php
          if($_SESSION["isLogged"] == 1) {
            echo "<ul class=\"navbar-nav ml-auto; margin-left:0px;\">
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"login.php\"><i class=\"fa fa-puzzle-piece\"></i>&nbsp;My Bets</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"creditmanagement.php\"><i class=\"fa fa-credit-card-alt\"></i>&nbsp;Credit</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"account.php\"><i class=\"fa fa-user fa-fw\"></i>Account</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" ><i class=\"fa fa-star-o\"></i>&nbsp;Promotions</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" ><i class=\"fa fa-envelope-o	\"></i>&nbsp;News</a> </li>
            </ul>
            <ul class=\"navbar-nav ml-auto\">
            <li class=\"nav-item\"> <a class=\"nav-link\">Your Balance:</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" style=\"color:lightgreen\"> $Credit Credits</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"account.php\">Hello, $UserName </a> </li>
            </ul> <a class=\"btn navbar-btn ml-md-2 text-light btn-danger\" href=\"php/Userlogin.php\"><i class=\"fa fa-sign-out\"></i>&nbsp;sign out</a>";
          } else {
            echo "<ul class=\"navbar-nav ml-auto; margin-left:0px;\">
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"login.php\"><i class=\"fa fa-puzzle-piece\"></i>&nbsp;My Bets</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"login.php\"><i class=\"fa fa-credit-card-alt\"></i>&nbsp;Credit</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"login.php\"><i class=\"fa fa-user fa-fw\"></i>Account</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" ><i class=\"fa fa-star-o\"></i>&nbsp;Promotions</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" ><i class=\"fa fa-envelope-o	\"></i>&nbsp;News</a> </li>
            </ul>
            <ul class=\"navbar-nav ml-auto\">
            <li class=\"nav-item\" > <a class=\"btn btn-primary\" href=\"login.php\">LOG IN</a> </li>
            </ul> <a class=\"btn navbar-btn ml-md-2 btn-orange text-light \" href=\"register.html\"><i class=\"fa fa-registered\" style=\"\"></i>&nbsp;SIGN UP</a>";
          }
        ?>
        

      </div>
    </div>
  </nav>
  <div class="text-center text-md-right py-0" style="background-image: url(https://fsmedia.imgix.net/43/e9/9e/ac/0c64/4d0e/a2bc/dda1d61a31db/on-fire.jpeg?rect=0%2C56%2C1280%2C640&dpr=2&auto=format%2Ccompress&w=650);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="p-5 mx-auto mx-md-0 ml-md-auto col-10 col-md-9">
          <h3 class="display-4">Welcome to Youbet</h3>
          <p class="mb-3">Of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
          <form class="form-inline d-flex justify-content-end">
            <div class="input-group">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-tabs">
            <li class="nav-item"> <a href="#" class="active nav-link"><i class="fa fa-soccer-ball-o"></i>&nbsp;Upcoming Matches</a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  

<?php
        $sql = "SELECT MatchID, Begindate, Handicaphome, Handicapaway, Teamhome, Oddshome,Oddsdraw,Oddsaway,Teamaway,Type
                FROM Matchinfo;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            ?>
            <div class="py-0">
                <div class="container">
                <div class="row">
                    <div class="col-md-12" style="">
                    <table class="table" style="">
                        <thead>
                        <tr class="border border-dark text-center">
                            <th class="">Watch</th>
                            <th class="">Date (GMT + 7:00)</th>
                            <th class="" style="width: 27px;">Handicap</th>
                            <th class="text-right">Team Home</th>
                            <th class="text-center"></th>
                            <th class="text-center">DRAW</th>
                            <th class="text-center"></th>
                            <th class="text-left">Team Away</th>
                            <th class="text-center">League</th>
                        </tr>
                        </thead>
                        <tbody>
                        
            
        <?php        
            // output data of each row
            while($row = $result->fetch_assoc()) {
        ?>    
                            <tr style="" class="table-light">     
                            <td class="text-right"><a class="navbar-brand" href="matchinformation.php?matchID=<?php echo $row["MatchID"]?>"><i class="fa fa-external-link-square"></i></a>
                            <td class="text-center"><?php echo $row["Begindate"]; ?></td></a>
                            <td class="text-center"><?php echo $row["Handicaphome"] ." : ". $row["Handicapaway"]?></td>
                            <td class="text-center"><a href="teaminfo.html?team=<?php echo $row["Teamhome"]?>"><?php echo $row["Teamhome"]?></a></td>
                            <td class="text-center"><a class="btn rounded-0 btn-info text-light" onclick="openForm()"><?php echo $row["Oddshome"] ?></a></td>
                            <td class="text-center"><a class="btn rounded-0 btn-info text-light" onclick="openForm()"><?php echo $row["Oddsdraw"] ?></a></td>
                            <td class="text-center"><a class="btn btn-info rounded-0 text-light" onclick="openForm()"><?php echo $row["Oddsaway"] ?></a></td>
                            <td style="text-center"><a href="teaminfo.html?team=<?php echo $row["Teamaway"]?>"><?php echo $row["Teamaway"] ?></td>
                            <td class="text-center"><?php echo $row["Type"] ?></td>
                            </tr>  
                            </a>  
                            </div>                    
        <?php
            }
        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
    <?php
        } else {
            echo "0 results";
        }
        $conn->close();
    ?> 

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
          <div class="form-popup" id="myForm" style="display: none; width: 485px;">
            <div class="row">
              <div class="col-md-12">
                <h1 class="display-4 text-center py-1 mb-0 text-secondary bg-light">BETTING</h1>
                <div class="row flex-row justify-content-center">
                  <div class="col-lg-11 flex-row justify-content-between bg-secondary d-inline-flex align-items-end"><a class="btn btn-warning py-0 my-1" href="#">Match Info</a>
                    <p class="mb-0 py-1 text-white">Your balance&nbsp;<span class="badge border-warning border text-warning">1500.98</span>&nbsp;Credit</p>
                  </div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class="border col-lg-11 flex-row justify-content-between bg-secondary d-inline-flex align-items-end">
                    <p class="mb-0 py-1 text-white">Celtic FC</p>
                    <p class="mb-0 py-1 text-white">HDC&nbsp;<span class="badge border-warning border text-warning">1:0</span></p>
                    <p class="mb-0 py-1 text-white">Ajax</p>
                  </div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class=" col-lg-11 flex-row bg-secondary d-inline-flex align-items-center justify-content-center">
                    <img class="d-block rounded-circle img-fluid mx-3 my-2" src="E:/New Site/Pics/team/celtic.png" style="	width: 80px;">
                    <h3 class="mb-0 py-1 text-white">VS</h3>
                    <img class="d-block rounded-circle img-fluid mx-3 my-2" src="E:/New Site/Pics/team/Ajax.png" style="	width: 80px;">
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="border col-lg-11 bg-secondary">
                    <p class="text-white m-0"> Win Probability </p>
                    <div class="progress my-1">
                      <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width:78.5%">78.5%</div>
                    </div>
                  </div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class="col-lg-11 flex-row bg-secondary d-inline-flex align-items-center justify-content-center">
                    <p class="mx-3 my-0 text-white">Home</p>
                    <p class="mx-3 my-0 text-white">Draw</p>
                    <p class="mx-3 my-0 text-white">Away</p>
                  </div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class="col-lg-11 flex-row bg-secondary d-inline-flex align-items-center justify-content-center">
                    <a class="btn pi-draggable btn-outline-light m-1 p-3" href="#">0.33</a>
                    <a class="btn pi-draggable btn-outline-light m-1 p-3" href="#">0.88</a>
                    <a class="btn pi-draggable btn-outline-light m-1 p-3" href="#">0.8</a>
                  </div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class="justify-content-between bg-secondary col-lg-6 align-items-center d-flex flex-row">
                    <p class="text-white m-0"> Celtic FC VS. Ajax </p>
                  </div>
                  <div class="col-lg-5 flex-row justify-content-between bg-secondary d-inline-flex align-items-end"></div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class="flex-row bg-secondary d-inline-flex col-lg-5 align-items-center justify-content-end">
                    <p class="mb-0 py-1 text-white">Your Bet: DRAW&nbsp;<span class="badge border-warning border text-warning badge-danger">0.88</span></p>
                  </div>
                  <div class="col-lg-6 bg-secondary">
                    <form class="form-inline pi-draggable my-1">
                      <div class="input-group">
                        <input type="number" class="form-control" placeholder="500.00">
                        <div class="input-group-append"><button class="btn btn-warning text-body" type="button">Credit</button></div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class="border col-lg-11 flex-row justify-content-between d-inline-flex align-items-end bg-info">
                    <p class="mb-0 py-1 text-white">Betting Information</p>
                  </div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class="border col-lg-6 flex-row justify-content-between d-inline-flex align-items-end bg-light">
                    <p class="mb-0 py-1 text-danger">Bet Value</p>
                  </div>
                  <div class="border flex-row d-inline-flex align-items-end col-lg-5 justify-content-end bg-light">
                    <p class="mb-0 py-1 text-danger">500.00 credit</p>
                  </div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class="border col-lg-6 flex-row justify-content-between d-inline-flex align-items-end bg-light">
                    <p class="mb-0 py-1 text-dark">Rate</p>
                  </div>
                  <div class="border flex-row d-inline-flex align-items-end col-lg-5 justify-content-end bg-light">
                    <p class="mb-0 py-1 text-dark">x 0.88</p>
                  </div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class="border col-lg-6 flex-row justify-content-between d-inline-flex align-items-end bg-light">
                    <p class="mb-0 py-1 text-primary">Return</p>
                  </div>
                  <div class="border flex-row d-inline-flex align-items-end col-lg-5 justify-content-end bg-light">
                    <p class="mb-0 py-1 text-primary">940.00 credit</p>
                  </div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class="border col-lg-6 flex-row justify-content-between d-inline-flex align-items-end bg-light">
                    <p class="mb-0 py-1 text-secondary">Balance</p>
                  </div>
                  <div class="border flex-row d-inline-flex align-items-end col-lg-5 justify-content-end bg-light">
                    <p class="mb-0 py-1 text-secondary">1000.94 credit</p>
                  </div>
                </div>
                <div class="row flex-row justify-content-center">
                  <div class="col-lg-11 flex-row justify-content-between bg-secondary d-inline-flex align-items-end"><a class="btn btn-success py-0 my-1" href="#" style="	width: 260px;" >PLACE BET</a>
                    <a class="btn btn-danger py-0 my-1 text-white" style="	width: 160px;" onclick="closeForm()">CANCEL</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <script>
      function openForm() {
          document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" style=""></script>
  </body>
  
  </html>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" style=""></script>
</body>

</html>