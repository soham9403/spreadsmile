<?php 
	global $con;
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$database = "spreadsmile";

	$con = mysqli_connect($serverName,$userName,$password,$database);
 ?>