<?php

//signup config file for the sign up page


	if (isset($_POST['signup-submit'])){
		
	require 'dbh.inc.php';		//link to the DB config file
	
	$username = $_POST['uid'];
	
	$email = $_POST['mail'];
	
	$password = $_POST['pwd'];
	
	$passwordRepeat = $_POST['pwd-repeat'];
	
	
//Error checking functions


//check if either Username, email, password or confirm password is empty
	if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
		
		
//send the user back to the previous signup page, with error info displayed in url
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
		
		exit();
		
//check if both email and username are in valid format
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){

//send the user back to the previous signup page
		header("Location: ../signup.php?error=ivaliduid");
		
		exit();

//check if the email is valid
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

//send the user back to the previous signup page, with error info displayed in url
		header("Location: ../signup.php?error=ivalidmail&uid=".$username);
		
		exit();
		
//check if the username is valid
	}else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){

//send the user back to the previous signup page, with error info displayed in url
		header("Location: ../signup.php?error=ivaliduid&mail=".$email);
		
		exit();


//check if the password is the same as confirm password
	}else if($password !== $passwordRepeat){

//send the user back to the previous signup page, with error info displayed in url	
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
		
		exit();
	
		
	}
	
	
	else{	//check if the username already exists
		
		$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
		
		$stmt = mysqli_stmt_init($con);
		
		if(!mysqli_stmt_prepare($stmt, $sql)){		//check if the sql statement is valid
			
			header("Location: ../signup.php?error=sqlerror");
			
			exit();
			
		}else{
			
			mysqli_stmt_bind_param($stmt, "s", $username);
			
			mysqli_stmt_execute($stmt);
			
			mysqli_stmt_store_result($stmt);
		
			$resultCheck = mysqli_stmt_num_rows($stmt);
		
			if($resultCheck > 0){
				
				header("Location: ../signup.php?error=usertaken&mail=".$email);
			
				exit();
			
				
			}else{
				
				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
				
				$stmt = mysqli_stmt_init($con);
				
				if(!mysqli_stmt_prepare($stmt, $sql)){
			
					header("Location: ../signup.php?error=sqlerror");
			
					exit();
			
				}else{		//if all the info is valid, insert the new row into DB
					
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);			//hash the password for security
					
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
			
					mysqli_stmt_execute($stmt);
					
	
	//if signing up is seccesful, send the user back to login page, with info displayed in url				
					header("Location: ../../public_html/index.php?signup=success");
					
					exit();
				}
			}	
			
		
		}
	
	}

}else{
	
//if the user trys to access this page other than clicking sign up button, send them back to signup page with error info displayed in url
	header("Location: ../signup.php");
					
					exit();
	
}
