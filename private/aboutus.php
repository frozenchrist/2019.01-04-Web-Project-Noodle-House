<?php 

//create a session for all the pages
	session_start();


//if the user trys to open this page from url, send the user to homepage

if(!isset($_SESSION['userid'])){
	
	header("Location: ../public_html/index.php");
	
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title> Web Dev Noodle House </title>
		<link rel="stylesheet" type="text/css" href="../extra/css/aboutus-style.css"/>
		<link rel="stylesheet" type="text/css" href="../extra/css/logo.css"/>
        <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
		<script src="../extra/js/nightMode.js" type="application/javascript"></script>
	</head>

	<body>
		<div class="container-left">
            <br>
            <div class="title">Noodle House</div>
            <div class="aside-block login">
                 <?php
				
//If user logged in, he can only see the logout option
				
					if(isset($_SESSION['userid'])){
			
						echo '<form class="form-login" action="login/logout.inc.php" method="post">
                        <h3>Welcome !</h3>
                        
                        <button type="submit" name="logout-submit">Logout</button>
						
						<a class="button" href="../private/changepwd.php">Change Password</a>
                        
                    </form>';
			
					}
					
				
				?>
            </div>
            <br>
            <div class="menu">
                <nav>
                    <ul class="page-nav">
                        <li><a href="../public_html/index.php">Home</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
						
						<br>
						<br>
					<button id="night" >Night mode</button>
                    </ul>
                </nav>
            </div>

        </div>


				<div class="midsection">
						<div class ="menu-image" data-type="background"></div>
						<h1>Who are we?</h1>
						<div class="graphics">
							<svg height="200" width="500">
								<defs>
									<linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
										<stop offset="0%"
										style="stop-color:rgb(172,191,234);stop-opacity:1" />
										<stop offset="100%"
										style="stop-color:rgb(203,232,201);stop-opacity:1" />
									</linearGradient>
								</defs>
								<ellipse id="logo" cx="100" cy="70" rx="85" ry="55" fill="url(#grad1)" />
								<text fill="#996688" font-size="40" x="50" y="90">
									Noodle House
								</text>
							</svg>
						</div>
						<p id="about-us-para">We are Windsor's number one noodle house, bringing the
							 Vietnamese culture to this beautiful and prosperous city.
							  Three family members, Denis Nadarevic, Heejeong Kim,
								 and Chris Xie, packed their bags and moved here to
								 give Windsor a taste of life from another country.
								 From Vermicelli noodles to Pho tai ban noodle soup,
								 we make our meals with love first. We hope that our
								 passion makes your day feel good, that is our dream.
								 This is a family run business, we work together to
								 bring you the best food.
							 </p>
							 <br>
						<div class ="menu-image" data-type="background"></div>
						<h1>Where are we located?</h1>
						<p id="about-us-para">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
						feugiat, mi id sodales cursus, odio lacus mollis dolor, nec interdum
						augue urna ac metus. Nam ornare tristique augue, et fringilla diam
						vehicula in. Vestibulum vel dolor porta est lobortis vehicula nec
						in tortor. Mauris sit amet tellus eget ligula facilisis maximus
						quis vitae massa. Nunc id pellentesque leo, a tincidunt orci.
						Cras iaculis felis a volutpat elementum. Nulla vestibulum lorem
						in nisi molestie, sed cursus est porttitor. </p>
						<div class ="menu-image" data-type="background"></div>
						<iframe class="google" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2950.656451287665!2d-83.05878918397445!3d42.30719544643002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883b2d1ee5d266d5%3A0x64712345082414ce!2sPho+Xic+Lo!5e0!3m2!1sen!2sca!4v1553885779374!5m2!1sen!2sca" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						<br>
					</body>
				</div>

	</body>
</html>
