<?php
    session_start();
    include 'config/database_connection.php'; 
 ?>

<?php 
    include 'config/header.php';
?>
    <div class="container">
        <aside>
            <div class="asideright"> 
            <p class="popularThisWeek"><i class="fa fa-fire"></i> Trens this Week</p>           
            </div>
        </aside>  
    </div> 

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
                }else {
                    echo '<div>Did not found your keyword</div>';
                }
            }
        
        ?>
    </div>



<?php include 'config/footer.php'; ?>

