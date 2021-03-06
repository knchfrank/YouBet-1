<!DOCTYPE html>
<html>

<head>
  <Title>YouBet</Title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.1.3.css">
  <link rel="stylesheet" href="theme2.css">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar12">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar12"> <a class="navbar-brand d-none d-md-block" href="main.php">
          <i class="fa d-inline fa-lg fa-circle-o"></i>
          <b> Youbet</b>
        </a>
        <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a class="nav-link" href="login.php"><i class="fa fa-puzzle-piece"></i>&nbsp;My Bets</a> </li>
            <li class="nav-item"> <a class="nav-link" href="login.php"><i class="fa fa-credit-card-alt"></i>&nbsp;Credit</a> </li>
            <li class="nav-item"> <a class="nav-link" href="login.php"><i class="fa fa-user fa-fw"></i>Account</a> </li>
            <li class="nav-item"> <a class="nav-link" ><i class="fa fa-star-o"></i>&nbsp;Promotions</a> </li>
            <li class="nav-item"> <a class="nav-link" ><i class="fa fa-envelope-o	"></i>&nbsp;News</a> </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="btn navbar-btn ml-md-2 btn-orange text-light " href="register.html"><i class="fa fa-registered"></i>&nbsp;SIGN UP</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="text-center h-100 bg-light m-5 p-5" style="">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-6 col-10 bg-white p-5" style="">
          <h1 class="mb-4 text-primary">Log in</h1>
          <form action="http://localhost/Youbet/php/Userlogin.php" method="post">
            <div class="form-group"> <input type="text" class="form-control" placeholder="Username" name="username"> </div>
            <div class="form-group mb-3"> <input type="password" class="form-control" placeholder="Password" name="password"> <small class="form-text text-muted text-right">
                <a href="https://www.facebook.com/buchanothai" class=""> Forgotten account? </a>
              </small> </div> <button type="submit" class="btn btn-primary">Log in</button>
          </form>
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