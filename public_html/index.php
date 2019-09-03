<?php 

//create a session for all the pages
	session_start();

?>


<!DOCTYPE html>
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
				
					if(isset($_SESSION['userid'])){
			
						echo '<form action="../private/login/logout.inc.php" method="post">

							<button type="submit" name="logout-submit">Logout</button>
							
							<a class="button" href="../private/changepwd.php">Change Password</a>
				
							</form>
							
							
							
							<div class="menu">
					<nav>
					
						<ul class="page-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="../private/menu.php">Menu</a></li>
                        <li><a href="../private/aboutus.php">About Us</a></li>
                        <li><a href="../private/contactus.php">Contact Us</a></li>
                        
                    </ul>
                </nav>
            </div>';
			
			
					}else{
			
						echo '<form class="form-login" action="../private/login/login.inc.php" method="post">
							
								<h2>Login</h2>
					
							<p>
								<label for="username">Username</label>
					
								<input type="text" name="mailuid" placeholder="Username/E-mail...">
							</p>
							
							<p>
								<label for="password">Password</label>
					
								<input type="password" name="pwd" placeholder="Password...">
							</p>
							
						<button type="submit" name="login-submit">Login</button>
					
						</form>
						
						
						<div class="menu">
                <nav>
                    <ul class="page-nav">
                        <li><a href="index.php">Home</a></li>
                    
                        
                    </ul>
                </nav>
            </div>';
			
					}
				
				?>
			
					<a class="button" href="../private/signup.php">Signup</a>
			  
			  <br>
			  <br>
					<button id="night" >Night mode</button>
					
					
            </div>
            <br>
     
        </div>

        <div class="container-right">
                <div class="midsection-picture">
                    <img class="myslide" src="http://runawayrice.com/wp-content/uploads/2017/11/Vietnamese-Beef-Noodle-Soup-Pho-Bo-Recipe.jpg">
                    <img class="myslide" src="https://cms.splendidtable.org/sites/default/files/styles/w2000/public/Pho-Cookbook_Seafood-Pho-LEDE_0.jpg?itok=n5h7VTZG">
                    <img class="myslide" src="http://aromasian.com/wp-content/uploads/2017/08/vietnamese-beef-noodle-Pho-Bo.jpg">
                </div>
            <script>
                var ind= 0;
                slideshow();

                function slideshow(n) {
                    var i;
                    var x = document.getElementsByClassName("myslide");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }

                    ind++;
                    if (ind > x.length) {ind = 1}
                    x[ind-1].style.display = "block";
										x[ind-1].style.animation = "fadeOut 2s";
                    setTimeout(slideshow, 4000);
                }
            </script>


				<main>
				
				
				<?php
			
			
			if(isset($_SESSION['userid'])){
				
				echo '<article>
					
						<h1> Welcome</h1>
						<p> Lorem ipsum dolor sit amet, no duo sale nostrum definiebas, in volumus ullamcorper sit.
								Fugit legendos voluptatum te quo, nam semper percipit evertitur ut.
								Decore facete signiferumque ne sit, ut vim atqui liber intellegam. Natum qualisque ei pro.
								Ex mel enim choro antiopam. Illum lobortis volutpat usu et, munere expetenda intellegat ad mea. Nam doming
 								facete bonorum ut, reque invidunt adipiscing cum ad. Libris eirmod intellegebat sea ut, ius persius quaeque
  							principes id. Case intellegam sed an, choro homero mei ei. In eligendi mandamus deseruisse nec, lucilius
								facilisi has ea.
						</p>
					</article>
					<article>
						<h1>Location</h1>
						<p> Mel simul menandri ad. Has latine discere eu, mel sumo decore nullam eu.
						Option habemus corpora duo no. Quis agam neglegentur no has. Te solet intellegat repudiandae
						 mea, ea quo facete scripta posidonium, usu ea graeci dissentiunt neglegentur.
						Sumo cetero hendrerit ad nec, ne vidisse appellantur ius.</p>
					</article>
					<article>
						<h1>History</h1>
						<p>  Quis agam neglegentur no has. Te solet intellegat repudiandae
						 mea, ea quo facete scripta posidonium, usu ea graeci dissentiunt neglegentur.
						Sumo cetero hendrerit ad nec, ne vidisse appellantur ius. Eum utinam assentior cu.
						Id est novum aperiri torquatos, te enim utroque reprehendunt est, sea dicunt euripidis id.
						Eam an dicunt eruditi consulatu, vix id soleat forensibus. Solet civibus pericula nam in.
						Exerci dolore quaeque ea sit, qui sumo nemore inciderint in. Ex his inani detraxit moderatius,
						eu iudico expetenda scriptorem qui.</p>
					</article>
					';
				
			}else{
				
				
				echo'<h1>Sorry, this is a members only restaurant, in order to get access to our website, please login if you are a member, otherwise simply click Signup.</h1>';
				
				
			}
		
			
			?>
					
				</main>
			</div>
	</body>
</html>
