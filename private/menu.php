<?php 

//create a session for all the pages
	session_start();


//if the user trys to open this page from url, send the user to homepage

if(!isset($_SESSION['userid'])){
	
	header("Location: ../public_html/index.php");
	
}

?>



<!--Menu layout/style. Author: Heejeong Kim-->
<!DOCTYPE html>
<html>
	<head>
		<title> Web Dev Noodle House </title>
		<link rel="stylesheet" type="text/css" href="../extra/css/menu-style.css"/>
		<link rel="stylesheet" type="text/css" href="../extra/css/basic.css"  />
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
            <div class="mainmenu">
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
        <div class ="menu-image" data-type="background">
          <script>
          </script>
        </div>
		
		
		<!--Menu function. Author: Qianhe Xie-->
		
				<h1>Choose from a variety of meals</h1>
        <table align="center">
      <thead>
        <tr>
          <th>Name/price</th>
          <th>Dishes</th>
          <th>Dishes</th>
		  <th>Name/price</th>
        </tr>
      </thead>
      <tbody>
<?php

   $menu = array(
  'Beef Rice: $7.99',
  'Beef noodles: $8.99',
  'Veggie Rice: $9.99',
  'Veggie noodles: $7.99',
  'Fish Rice: $11.99',
  'Fish noodles: $7.99',
  'Chicken Rice: $7.99',
  'Chicken noodles: $7.99',
  'Shrimp Rice: $7.99',
  'Shrimp noodles: $7.99',
  'Spicy Seafood Rice: $17.99',
  'Spicy Seafood noodles: $17.99',
  'Meatball Rice: $7.99',
  'Meatball noodles: $10.99',
  'Pork Rice: $6.99',
  'Pork noodles: $7.99',
  'Mushroom Rice: $5.99',
  'Mushroom noodles: $4.99',

);

	  $n=0;
	  $j=1;
	   
	  
  for ($i=0; $i <= 8; $i++)
  {
	  
	  
?>



        <tr>
          <td style ="width: 100px; height: 100px;"><?php echo $menu[$n]; ?></td>
          <td ><img style ="display: block; width: 200px; height: 200px;" src="pic.php?i=<?php echo $i; ?>&purpose=g" /></td>
          <td ><img style ="display: block; width: 200px; height: 200px;" src="pic.php?i=<?php echo $i; ?>&purpose=a" /></td>
		   <td style ="width: 100px; height: 100px;"><?php echo $menu[$j]; ?></td>
        </tr>
		
		
		
		
<?php
	$n+=2;
    $j+=2;
  }
?>
        <tr>
          <td>Juice: $2.00 </td>
          <td>Soda: $1.50</td>
          <td>Beer: $2.00</td>
		  <td>Wine: $4.99</td>
        </tr>
      </tbody>
    </table>
			</div>

	</body>
</html>
