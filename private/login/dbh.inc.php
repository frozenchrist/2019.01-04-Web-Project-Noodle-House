<?php

//database config file

$servername = "localhost";		//I used XAMPP localhost DB for this project 

$dbusername = "root";

$dbpassword = "";

$dbname = "334project";		//DB name


$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);	//make connection to the DB



if(!$con){
	
	die("Connection failed: ".mysqli_connect_error());
	
}




