<?php // Do not put any HTML above this line
require_once "pdo.php";
session_start();

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: landingpage.php");
    return;
}

$salt = 'XyZzy12*_';

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['email']) && isset($_POST['pass']) ) {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Email must have an at-sign (@)";
        header("Location: login.php");
        return;
    }
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
        $_SESSION['error'] = "Enter Data";
        header("Location: login.php");
        return;
    } else {
        $check = hash('md5', $salt.$_POST['pass']);
        $stmt=$pdo->prepare("SELECT password,user_id from users where email=:email");
        $stmt->execute(array(":email"=>$_POST['email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $row['password'] == $check) {
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["user_id"]=$row['user_id'];
            $_SESSION["success"] = "Logged in.";
            error_log("Login success ".$_POST['email']);
            header( 'Location: landingpage.php' ) ;
            return;
        } else {
            $_SESSION["error"] = "Incorrect password.";
            error_log("Login fail ".$_POST['email']." $check");
            header( 'Location: login.php' ) ;
            return;
        }
    }
}

// Fall through into the View
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="signup.css" />

    <title>Sign In</title>
  </head>
  <body>
    <div class="container">
          <header>
            <img src="logo.jpg" alt="logo" class="logo">

            <nav>
              <a href="#" class="hide-desktop">
               <img src="ham.svg" alt="toggle menu" class="menu" id="menu">
              </a>
              <ul class="show-desktop hide-mobile" id ="nav">
              <li id="exit" class="exit-btn hide-desktop"><img src="exit.svg" alt="exit"></li>
              <li><a href="#vikki">Home</a></li>
              <li><a href="user.html">Bookings</a></li>
              <li><a href="#">Admin</a></li>



              </ul>
            </nav>
          </header>
                  <h3 >Welcome back!</h3>
                  <?php
                    if ( isset($_SESSION['error']) ) {
                        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
                        unset($_SESSION['error']);
                    }
                  ?>
                  <form method="post" action="login.php">
                      <input type="username" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                      <label for="inputEmail">Email address</label><br><br><br><br>
                    

                   
                      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
                      <label for="inputPassword">Password</label><br><br>
                    

                    
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Remember password</label><br><br>
                    
                    <button type="submit">Sign in</button><br><br>
                    
                      <a href="#">Forgot password?</a><br><br>
                  </form>
    </div>      
    <script>
    var menu = document.getElementById('menu');
    var nav = document.getElementById('nav');
    var exit = document.getElementById('exit');

    menu.addEventListener('click',function(e){
      nav.classList.toggle('hide-mobile');
      e.preventDefault();
    });

    exit.addEventListener('click',function(e){
      nav.classList.add('hide-mobile');
      e.preventDefault();
    });
  </script>
 </body>
 </html>
        