<?
include 'dbconnect.php';
include 'Delegate/delegate_functions.php';
session_start();

if(!isset($_SESSION['users']))
	header('Location: index.php');
//session check


?>

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
						</nav>
					</header>

				<!-- Menu -->
				

				<!-- Banner -->
				<!-- Note: The "styleN" class below should match that of the header element. -->
					<section id="banner" class="style5">
						<div class="inner">
							<span class="image">
								<img src="images/pic07.jpg" alt="" />
							</span>
							<header class="major">
								<h1>Delegate Card Registration</h1>
							</header>
							<div class="content">
								<p> Enter Your Details Below<br>
								In case of queries, contact system admin</p>
							</div>
						</div>
					</section>

 		</div>
 			<div id="wrapper">
 			<section id="one">
								<div class="inner">
									<form method="POST" action="delegatepost.php">
										<center>
										<center><font color="red" size="4"><?=  fgets(fopen("error_or_successlog.txt","a+")) ?> </font>  </center>
										<br>	
											<div class="6u 12u$(xsmall)">
											<font color="#7F8C8D  " size="6"> Name:</font><br>
												<input type="text" name="name" placeholder="Enter Name" required="" />
											</div>
											<br><br>
											
											<div class="6u 12u$(xsmall)">
											<font color="#7F8C8D  " size="6"> Registration Number:</font><br>
												<input type="text" name="regno" placeholder=" Enter Registration Number" required="" />
											</div>
											<br><br>

											<div class="6u 12u$(xsmall)">
											<font color="#7F8C8D  " size="6"> College:</font><br>
												<input type="text" name="college" placeholder="Enter College Name" required="" />
											</div>
											<br><br>
											<div class="6u 12u$(xsmall)">
											<font color="#7F8C8D  " size="6"> Email:</font><br>
												<input type="text" name="email" placeholder="Enter Email" required="" />
											</div>
											<br><br>
											<div class="6u 12u$(xsmall)">
											<font color="#7F8C8D  " size="6">Phone:</font><br>
												<input type="text" name="phone" placeholder="Enter  Phone Number" required="" />
											</div>
											<br><br>
											<div class="6u 12u$(xsmall)">
											<font color="#7F8C8D  " size="6"> Gender:</font><br>
											<select id="deln" name="gen">
											<option value="0">-select-</option>	
											<option value="M">Male</option>
											<option value="F">Female</option>
											<option value="T">Other</option>
											</select>	
											</div>
											<br><br>

											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Login" class="special" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>

											</center>
										
									</form>
							</section>

					</div>
					
					





</body>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>	
							
			<script src="assets/js/main.js"></script>


</html>


