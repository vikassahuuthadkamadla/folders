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

if ( isset($_POST['select-tests']) && isset($_POST['select-lab'])  ) {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["prescription"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["prescription"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["prescription"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["prescription"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["prescription"]["name"]). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }


    $stmt = $pdo->prepare('INSERT INTO list
    (user_id,test,lab) VALUES ( :user_id,:test,:lab)');
    $stmt->execute(array(
    ':user_id'=>$_SESSION["user_id"],
    ':test' => htmlentities($_POST['select-tests']),
    ':lab' => htmlentities($_POST['select-lab'])
    ));
    $list_id=$pdo->lastInsertId();


    $stmt = $pdo->prepare('INSERT INTO bookingpage
    (user_id,test,prescription,lab) VALUES ( :user_id, :test, :prescription, :lab)');
    $stmt->execute(array(
    ':user_id' => $_SESSION["user_id"] ,
    ':test' => htmlentities($_POST['select-tests']),
    ':prescription' => basename( $_FILES["prescription"]["name"]),
    ':lab' => htmlentities($_POST['select-lab'])
    ));
    
    $id=$pdo->lastInsertId();
    $_SESSION['success'] = "Record added.";
    header("Location: bookingdetails.php?book_id=".$id.'&'.'list_id='.$list_id);
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
              <li><a href="bookingpage.php">Bookings</a></li>
              <li><a href="admin.php">Admin</a></li>



              </ul>
            </nav>
         </header>
        <div class="region">
        <form method="post" action="bookingpage.php" enctype="multipart/form-data">
                
                    <h2>New Booking</h2>
                
                
                            <h3>Select a Test(s)
                        
                        
                            <select class="form-control" id="select-tests" name="select-tests" type="text">
                                <option value="test1">Test 1</option>
                                <option value="test2">Test 2</option>
                            </select><br><br>
                        
                             Upload Prescription
                        
                        
                            <input class="form-control" id="prescription" name="prescription" type="file"><br><br>
                       
             
                            Select Lab
                        
                            <select class="form-control" id="select-lab" name="select-lab" type="text">
                                <option value="lab1">Lab 1</option>
                                <option value="lab2">Lab 2</option>
                            </select><br><br>
                        
                         <input id="submit" type="submit" name="submit" class="form-control btn btn-success" value="Proceed"><br><br>
                    
                            <input type="submit" id="cancel" name="cancel" class="form-control btn btn-danger" value="Cancel"><br><br>
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

