<?php
//create a session for all the pages
	session_start();


//if the user trys to open this page from url, send the user to homepage

if(!isset($_SESSION['userid'])){
	
	header("Location: ../public_html/index.php");
	
}





//change password config file for the changepwd page


	if (isset($_POST['change-submit'])){
		
	require 'dbh.inc.php';		//link to the DB config file
	
	$email = $_POST['mail'];
	
	$oldpassword = $_POST['old-pwd'];
	
	$newpassword = $_POST['new-pwd'];
	
	$newpasswordRepeat = $_POST['new-pwd-repeat'];

	
	

//Error checking functions


//check if either old password, new password or confirm password is empty
	if(empty($oldpassword) || empty($newpassword) || empty($newpasswordRepeat) || empty($email) ){
		
		
//send the user back to the previous changepwd page, with error info displayed in url
		header("Location: ../changepwd.php?error=emptyfields");
		
		exit();
		
//check if the password is the same as confirm password
	}else if($newpassword !== $newpasswordRepeat){

//send the user back to the previous changepwd page, with error info displayed in url	
		header("Location: ../changepwd.php?error=passwordcheck");
		
		exit();
	
		
	}else{
		
			$hashednewPwd = password_hash($newpassword, PASSWORD_DEFAULT);	//hash the password for security
		
					$sql = "UPDATE users SET pwdUsers = '$hashednewPwd' WHERE emailUsers = '$email'";
				
					$stmt = mysqli_stmt_init($con);
	
				if(!mysqli_stmt_prepare($stmt, $sql)){
			
					header("Location: ../changepwd.php?error=sqlerror");
			
					exit();
			
				}else{		//if all the info is valid, update in DB
					
					
					mysqli_stmt_execute($stmt);
					
					mysqli_stmt_execute($sql);
					
	
	//if changeing password is seccesful, send the user back to login page, with info displayed in url				
					header("Location: ../../public_html/index.php?changepwd=success");
					
					session_destroy();
					
					
					exit();
					
					
				}
			
						
		}

	
}else{
		
		
		//if the user trys to access this page other than clicking change password button, send them back to change password page with error info displayed in url
	header("Location: ../changepwd.php");
					
					exit();
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	





























