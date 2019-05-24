<?php

session_start(); 
include '../config/database_connection.php'; ?>



<?php include '../config/header.php';?>
<?php  
if (!isset($_SESSION['user'])) {
    header('HTTP/1.0 403 Forbidden');
    exit;
  }

   
?>
 <h1>helloworld</h1>

<?php include '../config/footer.php' ?>;