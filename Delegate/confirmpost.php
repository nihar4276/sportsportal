<?

include 'dbconnect.php';
include 'Delegate/delegate_functions.php';

session_start();
if(!isset($_SESSION['users']))
	header('Location: index.php');
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

	$log=insert_data($name,$regno,$college,$email,$phone,$gender);






echo'
<html>

<head>
	<title> Delegate card Registration</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/nihar.css">

</head>

<body>
					<div id="wrapper">
		<!-- Wrapper -->
			

				<!-- Header -->
				<!-- Note: The "styleN" class below should match that of the banner element. -->
					<header id="header" class="alt style5">
						<a href="#" class="logo"><strong>System Admin</strong> <span>MIT</span></a>




						
						<nav>
							<font color="green" size="5"> Go To</font>
							<select name="delegate" id="nih" onChange="window.location.href=this.value">
							<option>Select</option>
							<option value="index.php">Login</option>
							<option value="event.php">Event Reg</option>
							<option value="search.php">Search</option>


							</select>
						</nav></header>';


						echo'<center>';
						if(!preg_match('/^[0-9]+$/', $log))//if $log is a delegate id(has only digits)then it is a success 
						{

							echo'<font color="red" size="3">error!</font><br>';
							echo $log;
							echo '<br> <a href="delegate.php"> Go Back </a>';


						}else
						{

							echo'<font color="green" size="3">Congrats! You have successfully Registered! <br>';
							echo 'the delegate number is ';
							echo $log;

							echo '<br><br>';
							

					echo '<br><font color"green">Register a new team: <a href ="delegate.php">Click here</a> </font>';
					
							

						}


						echo'</center>

					</div>


					</body>
					</html>
					';


?>