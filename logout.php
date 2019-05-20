<?php
   
   require 'fb.php';

    session_start();
    session_unset($_SESSION['access_token']);
    session_destroy();


    header("Location: index.php");


?>