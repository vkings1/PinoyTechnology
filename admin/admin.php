<?php include '../config/database_connection.php'; ?>


<?php 
    include '../header.php';?>
<?php  

    // session_start(); 

    if (isset($_SESSION['id'])) {
    echo '<form action="../logout.php" method="post">
    <button type="submit" name="logout">logout</button>
    </form>';
    echo '<p>Your are in</p>';

    }else {
        echo '<p>Your are logout</p>';
    }

   
?>
 <h1>helloworld</h1>

<?php include '../footer.php';