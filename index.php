<?php
session_start();
// include 'config/nav.php'; 
//session_start();
//google api
// if (!isset($_SESSION['token'])) {
//   header("Location: login.php");
//   exit();
// }


// if (!isset($_SESSION['access_token'])) {
//     header('Location: login.php');
// }

// require 'config/header.php';

// if (!isset($_SESSION['access_token'])) {
//     header('Location: login.php');
//     exit();
//}
if (isset($_SESSION['username'])) {
    header("Location: home.php");
}

  //database coonection
 include 'config/database_connection.php'; 
 
    //select to database from globe table
    $sql = "SELECT * FROM globe ORDER BY datetime DESC";
    //preapre the query
    $statement = $conn->prepare($sql);
    $statement->execute();
    $post = $statement->fetchAll(PDO::FETCH_ASSOC); 
 
?>
 
 <?php include 'config/header.php';  ?>
 <?php include 'config/nav.php'; ?>
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
              <li><small>Create one <?php echo $mypost['datetime']; ?></small></li>
              <li><p class="description"><?php echo substr($desc = $mypost['description'], 0,200); ?></p></li>
              <li><a href="post.php?id=<?php $mypost['id'];?>">Read more</a></li>
            </ul>
            </div>
          <?php endforeach ?>

          <h1>You are login</h1>
    <div class="row justify-content-center">
        <div class="col-md-3">
            <img src="<?php echo $_SESSION['userdata']['picture']['url']; ?>" alt="" sizes="" srcset="">
        </div>
        <div class="col-md-9">
            <table class="table table-hover table-border">
                <tbody>
                    <tr>
                        <td>Name: </td>
                        <td><?php echo $_SESSION['userdata']['name']; ?></td>
                    </tr>
                    <tr>
                        <td>first Name: </td>
                        <td><?php echo $_SESSION['userdata']['first_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><?php echo $_SESSION['userdata']['last_name']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
        
              <!-- smooth scrool return to Top -->
         <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
    </div>	
<?php include 'config/footer.php'; ?>       