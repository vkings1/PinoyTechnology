<?php
    session_start();
    include 'config/database_connection.php'; 
 ?>

<?php include 'config/header.php'; ?>

    <div class="container">
    <h1>Search result </h1>
        <?php 
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                    //select to database from globe table
                $sql = "SELECT * FROM globe WHERE promo LIKE '%$search%' OR description LIKE '%$search%' ";
                //preapre the query
                $statement = $conn->prepare($sql);
                $statement->execute();
                $row = $statement->rowCount();
                $post = $statement->fetchAll(PDO::FETCH_ASSOC);
                echo '<div>There are '.$row.' search results</div>';
                if ($row > 0) {
                   foreach ($post as $mySearch) {
                        echo '<a href="article.php?promo='.$mySearch['id'].'"><div class="article-box">
                                <h3>'.$mySearch['promo'].'</h3>
                                <p>'.$mySearch['description'].'</p>
                        </div></a>';
                   }
                }
            }
        
        ?>
    </div>



<?php include 'config/footer.php'; ?>

