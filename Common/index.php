
<?
session_start();


?>

<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>SysAd - Portal Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
				<div id="wrapper">
		<!-- Wrapper -->
			

				<!-- Header -->
				<!-- Note: The "styleN" class below should match that of the banner element. -->
					<header id="header" class="alt style5">
						<a href="#" class="logo"><strong>System Admin</strong> <span>MIT</span></a>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
				<?php include_once("menu.php"); ?>

				<!-- Banner -->
				<!-- Note: The "styleN" class below should match that of the header element. -->
					<section id="banner" class="style5">
						<div class="inner">
							<span class="image">
								<img src="images/pic07.jpg" alt="" />
							</span>
							<header class="major">
								<h1>Portal Login</h1>
							</header>
							<div class="content">
								<p>Enter your credentials to continue<br />
								In case of queries, contact system admin</p>
							</div>
						</div>
					</section>

				<!-- Main -->
					<div id="main">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<form method="POST" action="logincheck.php">
										<div class="row uniform" style="width: 70%; text-align: right;">
											<div class="6u 12u$(xsmall)">
												<input type="text" name="username" placeholder="Username" required="" />
											</div>
											<div class="6u 12u$(xsmall)">
												<input type="password" name="password" placeholder="Password" required="" />
											</div>
											<div class="12u$">
												<div class="select wrapper">
													<select name="portals">
														<option value="0">- Select Portal -</option>
														<option value="1">Delegate card</option>
														<option value="2">Event Registration</option>
														<option value="3">Search</option>
														
													</select>
												</div>
											</div>
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Login" class="special" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										</div>
									</form>
							</section>

					</div>

				<!-- Footer -->
					<?php include_once("footer.php"); ?>

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