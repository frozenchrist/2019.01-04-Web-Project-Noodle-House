<?php

//the login functions needed for the login page



if(isset($_POST['login-submit'])){	
	
	require 'dbh.inc.php';			//link to the database config file
	
	
	$mailuid = $_POST['mailuid'];
	
	$password = $_POST['pwd'];
	
	if(empty($mailuid) || empty($password)){
		
		header("Location: ../../public_html/index.php?error=emptyfields");
		
		exit();
	}else{
		
//Allows the user to login using both email and username
		$sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
		
		$stmt = mysqli_stmt_init($con);
		
		if(!mysqli_stmt_prepare($stmt,$sql)){
		
			header("Location: ../../public_html/index.php?error=sqlerror");
			exit();
		
		}else{
		
		
		mysqli_stmt_bind_param($stmt,"ss",$mailuid, $mailuid);
		
		mysqli_stmt_execute($stmt);
		
		$result = mysqli_stmt_get_result($stmt);

//check if the result in the DB is valid
			if($row = mysqli_fetch_assoc($result)){

//check if the password is correct				
				$pwdCheck = password_verify($password, $row['pwdUsers']);
				
					if($pwdCheck == false){
//if not, send back to login again
						header("Location: ../../public_html/index.php?error=wrongpwd");
				
						exit();
//if password is correct
					}else if($pwdCheck == true){
//create a login session	
						session_start();
				
						$_SESSION['userid'] = $row['idUsers'];
						
						$_SESSION['useruid'] = $row['uidUsers'];
						
						header("Location: ../../public_html/index.php?login=success");
				
						exit();
						
					}
				
				
			}else{
				
				
				header("Location: ../../public_html/index.php?error=wrongpwd");
				
				exit();
			}
		
		
		
		}
	
	
	
	
	}
	
	
	
}else{
	
	header("Location: ../../public_html/index.php");
					
	exit();
	
}