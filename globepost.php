<?php
session_start();
 include 'config/database_connection.php';
?>

<?php include 'config/header.php'; ?>
    <!-- aside -->
    <div class="container">
        <aside>
            <div class="asideright"> 
            <p class="popularThisWeek"><i class="fa fa-fire"></i> Trens this Week</p>           
            </div>
        </aside>  
    </div> 
<div class="container">
    <h1>Globe Promo</h1>
        <?php
            $id = $_GET['promo'];
            //select to database from globe table
            $sql = "SELECT * FROM globe WHERE id = :id";
            //preapre the query
            $statement = $conn->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $row = $statement->rowCount();
            $post = $statement->fetchAll(PDO::FETCH_ASSOC);
            if ($row > 0) {
                foreach ($post as $mySearch) {

                    if (!isset($_SESSION['usertype'])) {
                        echo '<div class="article-box">
                            <h3>'.$mySearch['promo'].'</h3>
                            <img src="img-uploads/'.$mySearch['image'].' " alt="" srcset="">
                            <p>'.$mySearch['description'].'</p>
                        </div>';
                    }elseif (isset($_SESSION['usertype'])) {
                       echo '<div class="article-box">
                       <h3>'.$mySearch['promo'].'</h3>
                       <img src="img-uploads/'.$mySearch['image'].' " alt="" srcset="">
                       <p>'.$mySearch['description'].'</p>
                        </div>
                       <form action="" method="post">
                            <div><textarea name="" id="" cols="30" rows="10"></textarea></div>
                            <input type="submit" value="Comment">
                        </form>';
                    }
                   
                }
            }
        ?>
    </div>

<?php include 'config/footer.php'; ?>
