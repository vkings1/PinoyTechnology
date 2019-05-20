<?php 
  
  include 'config/database_connection.php'; 

    if (isset($_POST['submit'])) {

        $promo = $_POST['promo'];
        $description = $_POST['description'];
        $file_dir = "img-uploads/".basename($_FILES['image']['name']);
        $image = $_FILES['image'];
        $filename = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $fileType = $_FILES['image']['type'];
        
        $fileExt = explode('.', $filename);
        $fileActualExt = strtolower(end($fileExt));
        $allowedimg = array('jpg', 'jpeg', 'png', 'pdf');


        if (in_array($fileActualExt, $allowedimg)) {
            if ($fileError === 0) {
                if ($fileSize < 100000) {
                    if (move_uploaded_file($fileTmpName, $file_dir)) {
                        $sql = "INSERT INTO globe(image, promo, description) VALUES (:image, :promo, :description)";
                         $statement = $conn->prepare($sql);
                         $statement->execute(['image' =>  $filename, 'promo' => $promo, 'description' => $description ]);
                         echo 'succesfull inserted data';
                    }
                    
                }else {
                    echo "Your image is to big";
                }
            }else {
                echo "There was an error";
            }
        } else {
            echo "Cannot upload images";
        }

            
    }

?>

<?php include 'config/header.php'; 
        // include 'config/nav.php';    
?>
    <!-- create data into database -->
    <form action="createdata.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" id=""><br>
       <input type="text" name="promo" id=""><br>
       <textarea name="description" id="" cols="30" rows="10"></textarea><br>
       <button type="submit" name="submit" class="btn btn-info">Submit</button>
    </form>
<?php include 'config/footer.php'; ?>    
