<?php
    //database connection
    include 'config/database_connection.php'; 

    if (isset($_GET['activationcode'])) {

        $activationcode = $_GET['activationcode'];

        $sql = "SELECT `activationcode`, `verified` FROM `users` WHERE verified = 0 AND activationcode = :activationcode LIMIT 1;"; 
        $statement = $conn->prepare($sql);
        $statement->bindParam(':activationcode', $activationcode);
        $statement->execute();

        $result = $statement->rowCount();

        if ($result > 0) {
            $sql = "UPDATE users SET verified = 1 WHERE  activationcode = :activationcode LIMIT 1;";
             $statement = $conn->prepare($sql);
             $statement->bindParam(':activationcode', $activationcode);
             $statement->execute();

             if ($sql) {
                 echo '<h4>Your account has been verified. <a href="login.php">Click here to login</a> <h5>';
             }else {
                 echo 'Cannot verified your account';
             }
        }else {
            echo 'The account is invalid or already verified';
        }

    }else {
        echo 'Something went wrong';
    }


?>
