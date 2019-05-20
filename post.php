<?php
//  session_start();
 include 'config/database_connection.php'; 

        $id = $_GET['id'];
        //select to database from globe table
        $sql = "SELECT id From globe WHERE id = :id";
         //preapre the query
        $statement = $conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        
        $post =  $statement->fetchAll(PDO::FETCH_ASSOC);
      
 ?>



<?php include 'config/header.php'; 
      include 'config/nav.php';  
?> 

    <!-- starting point to retrive all the data into database -->

    <div class="container">
        <h1>Recent Blog</h1>
            <!-- <p>post data <?php echo $post['datetime']; ?></p>
            <img src="img-uploads/<?php echo $post['img']; ?>" alt="" srcset="">
            <p><?php echo $post['promo']; ?></p>
            <p><?php $post['description']; ?></p> -->
    </div>	

<?php include 'config/footer.php'; ?>       