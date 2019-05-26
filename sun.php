<?php
session_start();
 include 'config/database_connection.php'; 
 
    //select to database from globe table
    $sql = "SELECT * FROM sun ORDER BY datetime DESC";
    //preapre the query
    $statement = $conn->prepare($sql);
    $statement->execute();
    $post = $statement->fetchAll(PDO::FETCH_ASSOC); 
 
?>
 
 <?php include 'config/header.php';  ?>
  <!-- starting point to retrive all the data into database -->
    <div class="container">
        <aside>
            <div class="asideright"> 
            <p class="popularThisWeek"><i class="fa fa-fire"></i> Trens this Week</p>           
            </div>
        </aside>  
    </div>         
    <div class="container">
        <h1>Sun Cellural Promo</h1>
          <?php foreach ($post as $mypost) : ?> 
            <div class="post-bgc">
            <ul>
              <li><img src="img-uploads/<?php echo $mypost['image']; ?>" alt="" srcset=""></li>
              <li><h3><?php echo $mypost['promo']; ?></h3></li>
              <li><small>Create one <?php echo $mypost['datetime']; ?></small></li>
              <li><p class="description"><?php echo substr($desc = $mypost['description'], 0,200); ?></p></li>
              <li><a href="sunpost.php?promo=<?php echo $mypost['id'];?>">Read more</a></li>
            </ul>
            </div>
          <?php endforeach ?>
              <!-- smooth scrool return to Top -->
         <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
    </div>	
<?php include 'config/footer.php'; ?>       