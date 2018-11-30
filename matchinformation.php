<?php
session_start();
error_reporting(0);
require('php/getConnection.php');
$conn = getConnection();
$matchID = $conn->real_escape_string($_GET["matchID"]);
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
    $query = "SELECT * FROM Matchinfo WHERE MatchID = '$matchID'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    // echo $row['Type'];
?>

<!DOCTYPE html>
<html>

<head>
  <Title>Youbet</Title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <style> margin{
        margin: 50px;
      }
    </style>
  <link rel="stylesheet" href="https://static.pingendo.css">
  <link rel="stylesheet" href="theme2.css">
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <!-- <script>
    load();
    function load() {
      $.ajax({
        url: location.protocol + '//' + location.host+"/New%20Site/php/getMatchinfo.php"
      }).done(function (response) {
        displayResponse(response);
      })
      .fail(function (err) {
        console.log(err)
      })
    }

    function displayResponse(response) {
            var response = JSON.parse(response);
            document.getElementById("begindate").innerHTML = response.begindate;
            document.getElementById("type").innerHTML = response.type;
            // document.getElementById("teamhome").innerHTML = response.teamhome;
            $(".teamhome").each(function (index, item) {
              item.innerHTML = response.teamhome;
            });
            $(".teamaway").each(function (index, item) {
              item.innerHTML = response.teamaway;
            });
            document.getElementById("Goalscoredhome").innerHTML = response.Goalscoredhome;
            document.getElementById("Goalscoredaway").innerHTML = response.Goalscoredaway;
        }
  </script> -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"> <a class="navbar-brand" href="main.php">
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
  <div class="text-center text-md-right py-0" style="background-image: url(https://fsmedia.imgix.net/43/e9/9e/ac/0c64/4d0e/a2bc/dda1d61a31db/on-fire.jpeg?rect=0%2C56%2C1280%2C640&amp;dpr=2&amp;auto=format%2Ccompress&amp;w=650);	background-position: right bottom;	background-size: cover;	background-repeat: repeat; background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="p-5 mx-auto mx-md-0 ml-md-auto col-10 col-md-9">
          <h3 class="display-4">Welcome to Youbet</h3>
          <p class="mb-3">Of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents.</p>
          <form class="form-inline d-flex justify-content-end">
            <div class="input-group">
              <!-- <div class="input-group-append"> <a class="btn btn-primary " href="register.html">Get an accont here</a> </div> -->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center py-3">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-8">
          <h1 class="mb-3">Exhibition</h1>
          <p class="lead"><div><?php echo $row['Begindate']?></div><br><?php echo $row['Type']?></div><br></p>
        </div>
      </div>
      <div class="row justify-content-center align-items-center">
        <div class="col-md-2">
          <img class="img-fluid d-block mx-auto" src="Pics/team/celtic.png" style="	width: 70px;">
          <h4 class=""><div><?php echo $row['Teamhome']?></div></h4>
        </div>
        <div class="col-md-4">
          <h3 class=""><div style="display: inline"><?php echo $row['Goalscoredhome']?></div> - <div style="display: inline"><?php echo $row['Goalscoredaway']?></div></h3>
        </div>
        <div class="col-md-2">
          <img class="img-fluid d-block mx-auto" src="Pics/team/st. johnstone.png" style="	width: 70px;">
          <h4 class=""><div><?php echo $row['Teamaway']?></div></h4>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center pb-3">
    <div class="col-md-8">
      <ul class="nav nav-tabs">
        <li class="nav-item"> <a href="" class="active nav-link" data-toggle="pill" data-target="#tabone"><i class="fa fa-child"></i> LINEUPS</a> </li>
        <li class="nav-item"> <a class="nav-link" href="" data-toggle="pill" data-target="#tabtwo"><i class="fa fa-bar-chart-o"></i> STATS</a> </li>
      </ul>
      <div class="tab-content mt-2">
        <div class="tab-pane fade show active" id="tabone" role="tabpanel">
          <div class="row justify-content-center">
            <div class="col-md-9">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" class="table-dark">#</th>
                      <th scope="col" class="w-50 table-dark"><div><?php echo $row['Teamhome']?></div></th>
                      <th scope="col" class="w-50 text-right table-dark"><div><?php echo $row['Teamaway']?></div></th>
                      <th scope="col" class="w-50 text-right table-dark">#</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $query2 = "SELECT PlayerName, Number, Team
                                  FROM Player
                                  WHERE Team IN (
                                    SELECT Teamhome
                                    FROM Matchinfo
                                    WHERE MatchID = '$matchID'
                                )";
                      $query3 = "SELECT PlayerName, Number, Team
                                  FROM Player
                                  WHERE Team IN (
                                  SELECT Teamaway
                                  FROM Matchinfo
                                  WHERE MatchID = '$matchID'
                                )";    
                      $result2 = $conn->query($query2);
                      $result3 = $conn->query($query3);
                      $i = 0;
                      while($i++ < 11) {
                          $row2 = $result2->fetch_assoc();
                          $row3 = $result3->fetch_assoc();
                          echo "<tr>";
                          echo "<td>".$row2['Number']."</td>";
                          echo "<td>".$row2['PlayerName']."</td>";
                          echo "<td class=\"text-right\">".$row3['PlayerName']."</td>";
                          echo "<td class=\"text - right\">".$row3['Number']."</td>";
                          echo "</tr>";
                      }
                    ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="tabtwo" role="tabpanel">
          <div class="table-responsive">
            <table class="table">
              <thead></thead>
              <tbody>
                <tr>
                  <td class="w-25"><span class="badge badge-primary badge-pill"><?php echo $row['Possessionhome']?></span></td>
                  <td class="w-50 text-center" style="">Possesion %</td>
                  <td class="w-25 text-right"><span class="badge badge-pill badge-warning"><?php echo $row['Possessionaway']?></span></td>
                </tr>
                <tr>
                  <td class="w-25"><span class="badge badge-primary badge-pill"><?php echo $row['Goalconcededhome']?></span></td>
                  <td class="w-50 text-center" style="">Goal conceded</td>
                  <td class="w-25 text-right"><span class="badge badge-pill badge-warning"><?php echo $row['Goalconcededaway']?></span></td>
                </tr>
                <tr>
                  <td class="w-25"><span class="badge badge-primary badge-pill"><?php echo $row['Shotshome']?></span></td>
                  <td class="w-50 text-center" style="">Shot</td>
                  <td class="w-25 text-right"><span class="badge badge-pill badge-warning"><?php echo $row['Shotsaway']?></span></td>
                </tr>
                <tr>
                  <td class="w-25"><span class="badge badge-primary badge-pill"><?php echo $row['Passcompletehome']?></span></td>
                  <td class="w-50 text-center" style="">Pass completion</td>
                  <td class="w-25 text-right"><span class="badge badge-pill badge-warning"><?php echo $row['Passcompleteaway']?></span></td>
                </tr>
                <tr>
                  <td class="w-25"><span class="badge badge-primary badge-pill"><?php echo $row['Chancecreatehome']?></span></td>
                  <td class="w-50 text-center" style="">Chances Created</td>
                  <td class="w-25 text-right"><span class="badge badge-pill badge-warning"><?php echo $row['Chancecreateaway']?></span></td>
                </tr>
                <tr>
                  <td class="w-25"><span class="badge badge-primary badge-pill"><?php echo $row['Clearanceshome']?></span></td>
                  <td class="w-50 text-center" style="">Clearances</td>
                  <td class="w-25 text-right"><span class="badge badge-pill badge-warning"><?php echo $row['Clearancesaway']?></span></td>
                </tr>
                <tr>
                  <td class="w-25"><span class="badge badge-primary badge-pill"><?php echo $row['Cornershome']?></span></td>
                  <td class="w-50 text-center" style="">Corners</td>
                  <td class="w-25 text-right"><span class="badge badge-pill badge-warning"><?php echo $row['Cornersaway']?></span></td>
                </tr>
                <tr>
                  <td class="w-25"><span class="badge badge-primary badge-pill"><?php echo $row['Redcardshome']?></span></td>
                  <td class="w-50 text-center" style="">Red cards</td>
                  <td class="w-25 text-right"><span class="badge badge-pill badge-warning"><?php echo $row['Redcardsaway']?></span></td>
                </tr>
                <tr>
                  <td class="w-25"><span class="badge badge-primary badge-pill"><?php echo $row['Yellowcardshome']?></span></td>
                  <td class="w-50 text-center" style="">Yellow cards</td>
                  <td class="w-25 text-right"><span class="badge badge-pill badge-warning"><?php echo $row['Yellowcardsaway']?></span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $conn->close(); ?>
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
            <div class="col-md-12 d-flex align-items-center justify-content-between my-2"> <a href="https://www.facebook.com/sarinsa">
                <i class="d-block fa fa-facebook-official text-muted fa-lg mr-2"></i>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" style=""></script>
</body>

</html>