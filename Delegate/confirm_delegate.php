<?php

include 'dbconnect.php';
include 'Delegate/delegate_functions.php';
session_start();
if(!isset($_SESSION['users']))
	header('Location: index.php');
file_put_contents('error_or_successlog.txt','');//empty the log file
if(!isset($_SESSION['details']))
{
	$file=fopen('error_or_successlog.txt',"w+");
   	$write=fwrite($file,'something went wrong ,please enter the details again!');
   	redirect('delegate.php');




}

	$info=$_SESSION['details'];
	$del=json_decode($info,true);

	$name=$del['name'];
	$regno=$del['regno'];
	$college=$del['college'];
	$email=$del['email'];
	$phone=$del['phone'];
	$gender=$del['gender'];


?>

<html>

	<head>
	<title>Confirm Details</title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/nihar.css">

	</head>

	<body>
	<div id="wrapper">
	<header id="header" class="alt style5">
	<a href="#" class="logo"><strong>System Admin</strong> <span>MIT</span></a>
	</header>
	</div>

	<br><br>
	<hr>	
			<center>
				<form action="confirmpost.php" method="POST">
			
				<font color="blue" size="3">Name: </font><?=$name;?><br>
				<font color="blue" size="3">Registration Number: </font><?=$regno;?><br>
				<font color="blue" size="3">College: </font><?=$college;?><br>
				<font color="blue" size="3">Email: </font><?=$email;?><br>
				<font color="blue" size="3">Phone: </font><?=$phone;?><br>

				<font color="blue" size="3">Gender: </font><?=$gender;?><br>




				<div class="12u$">
										<ul class="actions">
											<li><input type="submit" value="Confirm" class="special" /></li>

													
												</ul>
											</div>

											</center>
										
				</form>



																												
	</body>



</html>