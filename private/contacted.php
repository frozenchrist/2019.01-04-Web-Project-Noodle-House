<?php 

//create a session for all the pages
	session_start();


//if the user trys to open this page from url, send the user to homepage

if(!isset($_SESSION['userid'])){
	
	header("Location: ../public_html/index.php");
	
}

?>


<html>
	<head>
		<title> Web Dev Noodle House </title>
		<link rel="stylesheet" type="text/css" href="../extra/css/style.css"/>
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
        
        <div class="container-right">
			<main>
				<br>The message has been received.</br>
				<br>We will get back to you shortly.</br>
				<?php 
					$to = "kim13d@uwindsor.ca";
					$subject = "Noodle House";
					mail($to, $subject, $_POST["message"], $_POST["email"]);
				?>
			</main>
		</div>
	</body>
</html>