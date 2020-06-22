<?php 
require_once "pdo.php";
session_start();

if ( isset($_POST['cancel'] ) ) {
    
    header("Location: landingpage.php");
    return;
}

$salt = 'XyZzy12*_';

if ( isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username']) && isset($_POST['conf_password']) ) {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Email must have an at-sign (@)";
        header("Location: signup.php");
        return;
    }
    if ( $_POST['password'] != $_POST['conf_password'] ) {
        $_SESSION['error'] = "password doesn't match";
        header("Location: signup.php");
        return;
    }
    else {
      $check = hash('md5', $salt.$_POST['password']);
      $stmt=$pdo->prepare("INSERT INTO 
        users(email,password,name) values(:email,:password,:name)");
      $stmt->execute(array(
            ':email' => htmlentities($_POST['email']),
            ':password' => $check,
            ':name' => htmlentities($_POST['username'])
        ));
      $_SESSION["email"] = $_POST["email"];
      $_SESSION["success"] = "Registered Successfully.";
      error_log("Login success ".$_POST['email']);
      header( 'Location: login.php' ) ;
      return;
    }
  }

?>
<!DOCTYPE html>
<html>
  <header>
    <link rel="stylesheet" type="text/css" href="signup.css">
  </header>
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
            <div class="card-body">
              <h3 >Register</h3>
               <?php
                if ( isset($_SESSION['error']) ) {
                    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
                    unset($_SESSION['error']);
                }
              ?>
              
              <form method="post" class="form-signin">
               
                  <label for="inputUserame">Username</label>
                  <input type="text" id="inputUserame" class="form-control" name="username" placeholder="Username" required autofocus><br><br>
                

                  <label for="inputEmail">Email address</label>
               
                  <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required><br><br>
        
               
                
                   <label for="inputPassword">Password</label>
              
                  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required><br><br>
              
                
                  <label for="inputConfirmPassword">Confirm password</label>

                  <input type="password" id="inputConfirmPassword" class="form-control" name="conf_password" placeholder="Password" required><br><br>
                
              

                <button  type="submit">Register</button>
                <p>Already have an Account</p>
                <a href="login.php">Sign In</a><br><br>
                <button type="submit">Sign up with Google</button>
                <button type="submit"> Sign up with Facebook</button>
              </form>
            </div>
        </div>    
        <script>
          var menu = document.getElementById('menu');
          var nav = document.getElementById('nav');
          var exit = document.getElementById('exit');

          menu.addEventListener('click',function(e){
          nav.classList.toggle('hide-mobile');
          e.preventDefault();
          ssssss});

          exit.addEventListener('click',function(e){
          nav.classList.add('hide-mobile');
          e.preventDefault();
          });
        </script>

       
    
  </body>
</html>