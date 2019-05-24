<?php
    //fb api
    require 'fb.php';
    //google api
    require 'google.php';
    //database connection
    include 'config/database_connection.php';
    //fb  redirect login
    $redirectURL = 'http://localhost/pinoyTechnology/fb-callback.php';
    $permissions = ['email']; // Optional permissions
    $loginUrl = $helper->getLoginUrl($redirectURL, $permissions);
    //fb sesion
    // if (isset($_SESSION['access_token'])) {
    //     header('Location: index.php');
    //     exit();
    // }
    // else

    if(isset($_SESSION['usertype']) || isset($_SESSION['access_token'])){
         header('Location: index.php');
         exit();
    }elseif (isset($_SESSION['usertype'])) {
        header('Location: admin/admin.php');
        exit();
    }

    //google redirect login
    $googleLogIn = $client->createAuthUrl();
    // //google api
    // if (isset($_SESSION['token'])) {
    //     header("Location: index.php");
    //     exit();
    // }

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    //decrypt the password when user are login
    $password = md5($password);

    $Messgae_error = '';

        if(empty($username) || empty($password)) {
            $Messgae_error = 'Username and password are empty';
        }
        else {

            $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
            $statement = $conn->prepare($sql);
            $statement->bindParam(':username', $username);
            $statement->bindParam(':password', $password);
            $statement->execute();
            $row = $statement->rowCount();
            if($row > 0) {
                while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {

                   if ($result['verified'] == 0) {
                        $Messgae_error = 'Please verified your account';
                    }
                    elseif ($result['usertype'] == 0) {
                            session_start();
                            $_SESSION['id'] = $result['id'];
                            $_SESSION['username'] = $result['username'];
                            $_SESSION['password'] = $result['password'];
                            $_SESSION['email'] = $result['email'];
                            $_SESSION['usertype'] = $result['usertype'];
                            header("Location: admin/admin.php");
                            exit();
                            if (!empty($_POST['rememberme'])) {
                                setcookie('username', $username, time() +3600);
                                setcookie('password', $password, time() +3600);
                            }else {
                                setcookie('username','');
                                setcookie('password', '');
                            }
                        }elseif ($result['usertype'] == 1) {
                            session_start();
                            $_SESSION['id'] = $result['id'];
                            $_SESSION['username'] = $result['username'];
                            $_SESSION['password'] = $result['password'];
                            $_SESSION['email'] = $result['email'];
                            $_SESSION['usertype'] = $result['usertype'];
                            header("Location: index.php");
                            exit();
                            if (!empty($_POST['rememberme'])) {
                                setcookie('username', $username, time() +3600);
                                setcookie('password', $password, time() +3600);
                            }else {
                                setcookie('username','');
                                setcookie('password', '');
                            }
                        }

                }
            }else {
                $Messgae_error = 'Incorect username or password';
            }
        }
    }
?>
<!-- header of the page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Core CSS for styling -->
    <link rel="stylesheet" href="css/app.css">

    <!-- myFavIcon -->
    <link rel="shortcut icon" type="image/png" href="img/fav-icon/pinoytechnology2.png">

    <!-- Custom fonts for this template -->
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">


    <title>Pinoy Technology</title>


</head>
<body>
    <!-- erro message -->

    <!-- login page -->
    <div class="login">
        <span><a href="index.php"><img src="img/logo/pinoutechnology2.png" alt="logo" srcset="" style="width: 60px"></a></span>
        <div class="pt">Sign in to PinoyTechonolgy</div>
            <?php if(!empty($Messgae_error)): ?>
                <div class="alert alert-danger">
                    <?php echo $Messgae_error ?>
                </div>
            <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="formbody">
                <div class="username"><i class="fa fa-user"></i><input type="text" name="username" placeholder="User Name / E-mail" value="<?php if(isset($_COOKIE['username'])) {
                   echo $_COOKIE['username'];}?>" autofocus></div>
                <div class="password"><i class="fa fa-lock"></i><input type="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['password'])) {
                    echo $_COOKIE['password'];} ?>"></div>
                <span class="remember-me"><input type="checkbox" name="rememberme" <?php if(isset($_COOKIE['username'])) {
                  ?> checked <?php
                } ?>> Remember me</span>
                <span class="fogot-password"><a href="#">Forgot password?</a></span><br>
                <div class="submit"><button type="submit" name="submit">Login</button></div>
                <div class="register"><a href="regester.php"><p>Create new account</p></a></div>
            </div>
            <div class="login-into-other-account">
                <div class="facebooklogin"><i class="fa fa-facebook"></i><input type="button" onclick="window.location='<?php echo  $loginUrl; ?>'" value="Login with Facebook"></div>
                <div class="gmaillogin"><i class="fa fa-google"></i><input type="button" onclick="window.location='<?php echo  $googleLogIn; ?>'"  value="Login with Gmail"></div>
            </div>

        </form>
                <div class="wrap-terms">
                    <ul>
                        <li><a href="#">Terms</li>
                        <li><a href="#">Privacy</li>
                        <li><a href="#">Security</li>
                    </ul>

                </div>
    </div>
<!-- footer of the page -->
<?php include 'config/footer.php'; ?>
