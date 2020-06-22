<!DOCTYPE html>
<html>
<head>
    <title>homepage</title>
    <link rel="stylesheet" type="text/css" href="success.css">
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
              <li><a href="landingpage.php">Home</a></li>
              <li><a href="bookingpage.php">Bookings</a></li>
              <li><a href="#">Admin</a></li>



              </ul>
            </nav>
         </header>
        
    </div>
    <div class="app">
         <h3>You have successfully Booked a Diagnostic Test</h3>
        <p>Your Booking Id is: </p> <?php echo $_GET['hash']; ?>
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