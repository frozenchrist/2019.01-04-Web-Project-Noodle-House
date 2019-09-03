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
		<link rel="stylesheet" type="text/css" href="../extra/css/contactus-style.css"/>
        <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
		<script src="../extra/js/tinymce/tinymce.min.js"></script>
		<script> tinymce.init({selector: 'textarea'}); </script>
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
			</nav>
			<div class="container-right">
				<div class="background"></div>
				<main>
				<h1> Contact Us</h1>
				<p id="contact-us-desc">Feel free to leave us a message if you have any questions. We will do our
				best to reply back as fast as possible.</p>
					<div class="tq">
					  <form action="contacted.php" method="POST">
							<fieldset>
							  <legend>Contact Us</legend>
							  <p class="ques">Email Address</p>
							  <input type="hidden" name="var" value="value" />
							  <input type="text" name="email" placeholder="email address"></input><br />

							  <p class="ques">Message</p>
							  <input type="hidden" name="var" value="value" />
							  <textarea name="message" rows="4" cols="20" placeholder="message"></textarea><br />
							  <input type="submit" name="Button1" value="Submit" />
							  <input type="reset" value="Reset" />
							</fieldset>
					  </form>
					</div>
				</main>
			</div>
		</div>
	</body>
</html>
