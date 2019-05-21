<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Core CSS for styling -->
    <link rel="stylesheet" href="css/app.css">

    <!-- myFavIcon -->
    <link rel="shortcut icon" type="image/png" href="img/fav-icon/pinoytechnology2.png">

    <!-- Custom fonts for this template -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">    


    <title>Pinoy Technology</title>

    
</head>
<body>

        <head>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#"><img src="img/logo/pinoutechnology2.png" alt="pinoytechnology"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Smartphones</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Top Brand</a>
          <a class="dropdown-item" href="#">Local Brand</a>
          <a class="dropdown-item" href="#">International Brand</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Computers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Tips and Tweaks</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Telecom Promos</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Globe Promos</a>
          <a class="dropdown-item" href="#">TM Promos</a>
          <a class="dropdown-item" href="#">Smart Promos</a>
          <a class="dropdown-item" href="#">TNT Promos</a>
          <a class="dropdown-item" href="#">Sun Cellural Promos</a>
          <a class="dropdown-item" href="#">Cherry prapaid Promos</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Internet Connection</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="telecompromos/globe.php">Globe</a>
          <a class="dropdown-item" href="#">Smart</a>
          <a class="dropdown-item" href="#">PLDT</a>
          <a class="dropdown-item" href="#">Converge ICT</a>
          <a class="dropdown-item" href="#">Skycable</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="./search.php" method="POST">
      <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search">
    </form>
    <?php
        if (!isset($_SESSION['username'])) {
           echo '<span class="signin"><a href="login.php">Sign in</a></span><br>
           <span class="signup"><a href="regester.php?regester=new=account">Sign up</a></span>';
        }else {
            echo '<span class="signin"><a href="logout.php">logout</a></span><br>';
        }  
    ?>
  </div>
</nav>

</head>