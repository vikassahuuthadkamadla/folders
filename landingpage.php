<?php
    require_once "pdo.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>homepage</title>
	<link rel="stylesheet" type="text/css" href="landingpage.css">
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
					<li><a href="signup.php">signup</a></li>



				</ul>
			</nav>
		</header>

	</div>
	<section>

			<h1>Book Full Body Checkup <br> Now Get Your Basic Health Checkup Done at Home</h1>
			<img src="home main.JPG" alt="diagnosticimage" class="apple">
			<h2>Most Trusted Diagnostics. Most Affordable Rates</h2>
			<img src="scroll.png" alt="scrolldown" class="scroll hide-mobile">

		</section>

	<div class="greencont">

		<h3 style="text-align:center">why me?</h3>
		<p>Growing sedentary lifestyle, increasing stress levels at work place and unhealthy food habits take a toll on our body and increases the risk of health disorders such has Diabetes, Obesity, Thyroid, and Liver and Kidney diseases. Medlife packages are specifically designed with a vision of helping people lead a healthy life. It checks for the vital parameters which help in identifying the health risks to the major organs and timely reduce the pace of their progression.</p>

	</div>
	
	<div class="orangecont">

		<ul>
			
			<li>
				<h3>Free Sample Collection</h3>
			
				<img src="icon1.png" alt="icon1" width=40px height=40px>
				<p>Our certified Phlebotomists will collect samples from the comfort of your doorstep.
				</p>
			
			</li>

			<li>
			<h3>Fully Automated Labs</h3>
			
			<img src="icon2.png" alt="icon2">
			<p>Our test centers share e-reports within 24-48 hours of sample collection
			</p>
			
			</li>

			<li>
			<h3>Accurate & Verified Reports</h3>
			
			<img src="icon3.png" alt="icon3">
			<p>Our fully equipped Labs feature state-of-the art technologies for highest accuracy.</blockquote>
			</p>
			</li>

			<li>
			<h3>17 mn+ Tests carried out</h3>
			
			<img src="icon4.png" alt="icon4">
			<p>With presence in over 500 cities, we are able to cater to most of our customers.</p>
			
			</li>

		</ul>

	</div>

	
	<div class="address">
	
		<h3 style="text-align:center">Address</h3>
		<p>Near MGIT , Gandipet, Hyderabad , Telangana , pin:502103</p>
		<h3 style="text-align:center">Follow Us</h3>
		<div class="ball">
			<a href="#"><img src="youtube.png" alt="youtube" width=30px height=30px>
			<a href="#"><img src="facebook.png" alt="facebook" width=30px height=30px>
			<a href="#"><img src="twitter.png" alt="Twitter" width=30px height=30px></a>
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