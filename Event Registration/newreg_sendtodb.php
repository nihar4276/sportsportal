<?


session_start();
include 'dbconnect.php';
include 'Event/event_functions.php';
if(!isset($_SESSION['users']))
	header('Location: index.php');



if($connection)
{
	$fininfo=json_decode($_SESSION['delinfo'],true);
	//insertion
	$gender=$_SESSION['gender'];
	$sports=$_SESSION['choice'];
	$tid=get_teamid();//get the teamid to insert
	if($tid==0)
		exit();

	$flag=0;
	$log='';

	foreach ($fininfo as $i => $row)
			{
				$name=$row['name'];
				$regno=$row['regno'];
				
				$id=$row['id'];

				


   	 			$flag=1;
    			$query="INSERT INTO teams VALUES('$name','$regno','$gender','$id','$sports','$tid','1')";
    			$result=mysqli_query($connection,$query);
    			if(!$result)
    			{

    				$flag=0;
    				$log=mysqli_error($connection);
    				break;

    			}
				
				
   		 		
			}

			if($flag==1)
				$log='Your Team Id is '.$tid.' and your team has successfully registered for '.$sports.'!!';

		echo '
		<html>
<head>
	<title> '.$_SESSION['choice'].' Registration</title>
	

<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/nihar.css">
	<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			

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
						</nav>
					</header>

					<center>
					<br><br><br>

				<font color="red" size="4">'.$log.'</font></center>';
				if($flag==1)
				{

					echo '<br><font color"green">Register a new team: <a href ="event.php">Click here</a> </font>';
				}



					
echo '</body></html>';










}
else{
	echo 'unable to connect to database!,please try Again';
	header('refresh=4;url=newreg.php');


}



?>
