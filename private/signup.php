<?php 

//create a session for all the pages
	session_start();




?>


<!--Signup page layout, author: Denis Nadarevic-->
<!DOCTYPE html>
<html>
	<head>
		<title> Web Dev Noodle House </title>
		<link rel="stylesheet" type="text/css" href="../extra/css/signup-style.css"/>
		<link rel="stylesheet" type="text/css" href="../extra/css/logo.css"/>
        <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
		<script src="../extra/js/nightMode.js" type="application/javascript"></script>
	</head>
	<body>
		<div class="container-left">
			<br>
			<div class="title">Noodle House</div>
			
			<br>
			<div class="menu">
				<nav>
				
				<?php
				
					if(isset($_SESSION['userid'])){
			
						echo '<form class="form-login" action="login/logout.inc.php" method="post">
                        <h3>Welcome !</h3>
                        
                        <button type="submit" name="logout-submit">Logout</button>
                        
                    </form>
					
					<ul class="page-nav">
						<li><a href="../public_html/index.php">Home</a></li>
						<li><a href="menu.php">Menu</a></li>
						<li><a href="aboutus.php">About Us</a></li>
						<li><a href="contactus.php">Contact Us</a></li>
					</ul>
					
					<br>
			  <br>
					<button id="night" >Night mode</button>';
			
			
					}else{
			
						echo '<ul class="page-nav">
						<li><a href="../public_html/index.php">Home</a></li>
						</ul>
						<br>
			  <br>
					<button id="night" >Night mode</button>
						';
			
					}
				
				?>
				
					
				</nav>
			</div>
		</div>
		<div class="container-right">
		
<!--Signup form, author: Qianhe Xie-->
		<h1>Signup</h1>
			<form class="signup" action="login/signup.inc.php" method="post">
				<input type="text" name="uid" placeholder="Username">
				<input type="text" name="mail" placeholder="E-mail">
				<input type="password" name="pwd" placeholder="Password">
				<input type="password" name="pwd-repeat" placeholder="Confirm Password">
				<button type="submit" name="signup-submit">Signup</button>
			</form>
		</div>
	</body>
</html>
