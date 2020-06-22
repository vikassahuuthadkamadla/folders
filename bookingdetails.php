<?php
    require_once "pdo.php";
    session_start();

if ( !isset($_SESSION["email"]) ) {
    header("Location: login.php");
    return;
}
if ( isset($_POST['cancel']) ) {
    header('Location: landingpage.php');
    return;
}

$user_id = $_SESSION["user_id"];
$stmt=$pdo->prepare("SELECT name from users where user_id=:user");
$stmt->execute(array(':user'=>$user_id));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$username=$row['name'];
$salt = 'XyZzy12*_';
$random=rand(1200,99999);
$hash = hash('md5', $salt.$user_id.$random.$username);

if ( isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['date']) && isset($_POST['timeslot']) && 
    isset($_POST['address']) ) {


    $sql = "UPDATE list SET name = :name,
            contact = :contact, address = :address,booking_id=:booking_id,slot=:slot
            WHERE list_id = :list_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':list_id' => $_GET['list_id'],
        ':name' =>  htmlentities($_POST['name']),
        ':contact' => htmlentities($_POST['contact']),
        ':address' => $_POST['address'],
        ':booking_id' => $hash,
        ':slot' =>htmlentities($_POST['timeslot'])
        ));

    $stmt = $pdo->prepare('INSERT INTO bookingdetails
    (d_id,user_id,name,contact,address,date,timeslot,delivery_details,booking_id) VALUES ( :d_id,:user_id, :name, :contact, :address,:date,:timeslot,:delivery_details,:booking_id)');
    $stmt->execute(array(
    ':d_id'=> $_GET['book_id'],
    ':user_id' => $_SESSION["user_id"] ,
    ':name' => htmlentities($_POST['name']),
    ':contact' => htmlentities($_POST['contact']),
    ':address' => htmlentities($_POST['address']),
    ':date'=> htmlentities($_POST['date']),
    ':timeslot'=> htmlentities($_POST['timeslot']),
    ':delivery_details'=> htmlentities($_POST['details']),
    ':booking_id'=> $hash
    ));
    $_SESSION['success'] = "Record added.";
    header("Location: success.php?user_id=".$_SESSION["user_id"].'&'.'hash='.$hash);
    return;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>homepage</title>
    <link rel="stylesheet" type="text/css" href="bookingpage.css">
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
        <div class="region" id="booking-details">
            <form method="post" action="">
               
                    <h2>Booking Details</h2>
                
                
                            <label for="name">Name</label>
                        
                            <input class="form-control" id="name" name="name" type="text"><br><br>
                        
                            <label for="contact">Contact</label>
                        
                            <input class="form-control" id="contact" name="contact" type="text"><br><br>
                        
                            <label for="date">Select a Date</label>
                        
                            <input class="form-control" id="date" name="date" type="date"><br><br>
                       
                            <label for="timeslot">Pick a Timeslot</label>
                       
                            <select class="form-control" id="timeslot" name="timeslot" type="text">
                                <option value="morning">Morning</option>
                                <option value="afternoon">Afternoon</option>
                                <option value="evening">Evening</option>
                            </select><br><br>
                       
                            <label for="details">Personal Details & amp Delivery Details</label>
                            <textarea class="form-control" id="details" name="details" style="height:150"></textarea><br><br>
                       
                            <label for="address">Address</label>
                        
                            <textarea class="form-control" id="address" name="address" style="height:150"></textarea><br><br>
                       
                        <input id="submit" type="submit" class="form-control btn btn-success">
                    
                        <input type="submit" name="cancel" id="cancel" class="form-control btn btn-danger" value="Cancel">
                    
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