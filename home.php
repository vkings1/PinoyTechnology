<?php
session_start();
//database coonectio
include 'config/database_connection.php'; 

//select to database from globe table
$sql = "SELECT * FROM globe ORDER BY datetime DESC";
//preapre the query
$statement = $conn->prepare($sql);
$statement->execute();
$post = $statement->fetchAll(PDO::FETCH_ASSOC);    
//session_start();

// if (!isset($_SESSION['access_token'])) {
//     header('Location: login.php');
// }

?>
<?php require 'config/header.php'; ?>

<?php
$output = '';
if(!isset($_SESSION['username'])){
    header('Location: index.php');
}else {

    echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#"><img src="img/logo/pinoutechnology2.png" alt="pinoytechnology"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Smartphones</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="">Top Brand</a>
            <a class="dropdown-item" href="">Local Brand</a>
            <a class="dropdown-item" href="">International Brand</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Computers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Tips and Tweaks</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="./globe.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Telecom Promos</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="ropdown-item" href="./globe.php">Globe Promos</a>
            <a class="dropdown-item" href="">TM Promos</a>
            <a class="dropdown-item" href="">Smart Promos</a>
            <a class="dropdown-item" href="">TNT Promos</a>
            <a class="dropdown-item" href="">Sun Cellural Promos</a>
            <a class="dropdown-item" href="">Cherry prapaid Promos</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Internet Connection</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Globe</a>
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
      <span>display image here</span>
      <span class="signin"><a href="logout.php">logout</a></span><br>
    </div>
  </nav>';
}
?>
<!-- starting point to retrive all the data into database -->   
<div class="container">
    <aside>
        <div class="asideright"> 
          <p class="popularThisWeek"><i class="fa fa-fire"></i> Popular This Week</p>           
        </div>
      </aside>  
    </div>         
    <div class="container">
        <h1>Lates Post</h1>
          <?php foreach ($post as $mypost) : ?> 
            <div class="post-bgc">
            <ul>
              <li><img src="img-uploads/<?php echo $mypost['image']; ?>" alt="" srcset=""></li>
              <li><h3><?php echo $mypost['promo']; ?></h3></li>
              <li><small>Create on <?php echo $mypost['datetime']; ?></small></li>
              <li><p class="description"><?php echo $mypost['description']; ?></p></li>
              <li><a href="post.php?id=<?php $mypost['id'];?>">Read more</a></li>
            </ul>
            </div>
          <?php endforeach ?>


<?php require 'config/footer.php'; ?>