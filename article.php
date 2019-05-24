<?php
    session_start();
    include 'config/database_connection.php'; 
 ?>

<?php include 'config/header.php'; ?>

    <div class="container">
    <h1>Article </h1>
        <?php 
            $id = $_GET['promo'];
            //select to database from globe table
            $sql = "SELECT * FROM globe WHERE id = :id   ";
            //preapre the query
            $statement = $conn->prepare($sql);
            $statement->execute([':id' => $id]);
            $row = $statement->rowCount();
            $post = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($row > 0) {
                foreach ($post as $mySearch) {
                    echo '<div class="article-box">
                            <h3>'.$mySearch['promo'].'</h3>
                            <p>'.$mySearch['description'].'</p>
                    </div>';
                }
            }
        ?>
    </div>



<?php include 'config/footer.php'; ?>

