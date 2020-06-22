
 <?php
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
        header("Location: admin.php");
        return;
    }
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 ) {
        $_SESSION['error'] = "Enter Data";
        header("Location: admin.php");
        return;
    } else {
        $check = hash('md5', $salt.$_POST['pass']);
        $stmt=$pdo->prepare("SELECT password,admin_id from admin where email=:email");
        $stmt->execute(array(":email"=>$_POST['email']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ( $row['password'] == $check) {
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["admin_id"] = $row['admin_id'];
            $_SESSION["success"] = "Logged in.";
            error_log("Login success ".$_POST['email']);
            header( 'Location: bookinglist.php' ) ;
            return;
        } else {
            $_SESSION["error"] = "Incorrect password.";
            error_log("Login fail ".$_POST['email']." $check");
            header( 'Location: admin.php' ) ;
            return;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <link rel="stylesheet" type="text/css" href="bookingpage.css">
    <title>Sign In</title>
  </head>
  <body>
    <?php
      if ( isset($_SESSION['error']) ) {
           echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
           unset($_SESSION['error']);
           }
    ?>
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
              <li><a href="bookingpage.php">Bookings</a></li>
              <li><a href="#">Admin</a></li>



              </ul>
            </nav>
         </header>
                <div class="region" id="booking-details">
                  <form method="post" action="admin.php">
                    
                      <input type="username" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                      <label for="inputEmail">Email address</label><br><br>
                    

                    
                      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
                      <label for="inputPassword">Password</label><br><br>
                  

                    
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Remember password</label><br><br>
                   
                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button><br><br>
                   
                      <a class="small" href="#">Forgot password?</a>
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
        });

        exit.addEventListener('click',function(e){
            nav.classList.add('hide-mobile');
            e.preventDefault();
        });
    </script> 
  </body>
</html>