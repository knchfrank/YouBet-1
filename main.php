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
<Title>YouBet</Title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme2.css">
</head>

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
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-credit-card-alt\"></i>&nbsp;Credit</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-user fa-fw\"></i>Account</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-star-o\"></i>&nbsp;Promotions</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-envelope-o	\"></i>&nbsp;News</a> </li>
            </ul>
            <ul class=\"navbar-nav ml-auto\">
            <li class=\"nav-item\"> <a class=\"nav-link\">Your Balance:</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" style=\"color:lightgreen\"> $Credit </a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"http://localhost/YouBet/account.php\">Hello, $UserName </a> </li>
            </ul> <a class=\"btn navbar-btn ml-md-2 text-light btn-danger\" href=\"http://localhost/YouBet/php/Userlogin.php\"><i class=\"fa fa-sign-out\"></i>&nbsp;sign out</a>";
          } else {
            echo "<ul class=\"navbar-nav ml-auto; margin-left:0px;\">
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"login.php\"><i class=\"fa fa-puzzle-piece\"></i>&nbsp;My Bets</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"login.php\"><i class=\"fa fa-credit-card-alt\"></i>&nbsp;Credit</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"login.php\"><i class=\"fa fa-user fa-fw\"></i>Account</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-star-o\"></i>&nbsp;Promotions</a> </li>
            <li class=\"nav-item\"> <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-envelope-o	\"></i>&nbsp;News</a> </li>
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
                            <td class="text-right"><a class="navbar-brand" href="http://localhost/YouBet/matchinformation.php?matchID=<?php echo $row["MatchID"]?>"><i class="fa fa-external-link-square"></i></a>
                            <td class="text-center"><?php echo $row["Begindate"]; ?></td></a>
                            <td class="text-center"><?php echo $row["Handicaphome"] ." : ". $row["Handicapaway"]?></td>
                            <td class="text-center"><a href="http://localhost/YouBet/teaminfo.html"><?php echo $row["Teamhome"]?></a></td>
                            <td class="text-center"><a href="#" class="btn rounded-0 btn-info text-light"><?php echo $row["Oddshome"] ?></a></td>
                            <td class="text-center"><a href="#" class="btn rounded-0 btn-info"><?php echo $row["Oddsdraw"] ?></a></td>
                            <td class="text-center"><a href="#" class="btn btn-info rounded-0"><?php echo $row["Oddsaway"] ?></a></td>
                            <td style="text-center"><?php echo $row["Teamaway"] ?></td>
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