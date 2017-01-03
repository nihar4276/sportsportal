<?
session_start();
if(!isset($_SESSION['users']))
	header('Location: index.php');











?>

<html>

<head>
	<title> Event Registration</title>
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
							<option value="delegate.php">Delegate</option>
							<option value="search.php">Search</option>


							</select>
						</nav>
					</header>
					<section id="banner" class="style5">
						<div class="inner">
							<span class="image">
								<img src="images/pic07.jpg" alt="" />
							</span>
							<header class="major">
								<h1>Event Registration</h1>
							</header>
							<div class="content">
								<p> Select Sport<br>
								In case of queries, contact system admin</p>
							</div>
						</div>
					</section>

 		</div>
 		<div id="main">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<form action="eventpost.php" method="POST">
											
											<div class="12u$">
												<div class="select wrapper">
													<select name="event">
														<option value="0">- Select sports -</option>
														<option value="Football">Football</option>
														<option value="Basketball">Basketball</option>
														
														
													</select>
												</div>
											</div>
											<div class="12u$">
											<br><br>
												<ul class="actions">
													<li><input type="submit" value="submit" class="special" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										
									</form>
							</section>

					</div>


			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
	</html>