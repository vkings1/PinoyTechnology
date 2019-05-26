<?php
  session_start();
  include '../config/database_connection.php'; 
  include '../admin/adminheader.php';

  if (!isset($_SESSION['usertype'])) {
    header('Location: ../index.php');
    exit;

  }else {
     if ($_SESSION['usertype'] == 'user') {
        header("Location: ../index.php");
        exit();
     } 
  }
?>
<?php include '../config/footer.php' ?>

