<?
session_start();
if(!isset($_SESSION['users']))
	header('Location: index.php');
if(!isset($_SESSION['choice']))
	header('Location: event.php');








?>
<head>
	<title> <?=$_SESSION['choice']?> Registration</title>
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
	<script>
			$(function() {
  $("#niharkadiv1").hide();
  $("#niharkadiv2").hide();
  $("nihar").val("0");
});
	</script>
<body>

<div id="wrapper">
		<!-- Wrapper -->
			

				<!-- Header -->
				<!-- Note: The "styleN" class below should match that of the banner element. -->
					<header id="header" class="alt style5">
						<a href="#" class="logo"><strong>System Admin</strong> <span>MIT</span></a>
					</header>



					<section id="banner" class="style5">
						<div class="inner">
							<span class="image">
								<img src="images/pic07.jpg" alt="" />
							</span>
							<header class="major">
								<h1><?=$_SESSION['choice']?>  Registration</h1>
							</header>
							<div class="content">
								<p> Select Method of Registration<br>
								In case of queries, contact system admin</p>
							</div>
						</div>
					</section>

 		</div>


 		<div id="main">

						<!-- One -->
							<section id="one">
								<div class="inner">
									
											
											<div class="12u$">
												<div class="select wrapper">
													<select name="method" id="nihar">
														<option value="0">- Select Method-</option>
														<option value="niharkadiv1">Enter Team Id</option>
														<option value="niharkadiv2">New Registration</option>
														
														
													</select>

													<br>
													
													<div id="niharkadiv1" class="colors niharkadiv1">
													<form action="teamreg.php" method="POST">
													

													<input type="text" name="teamid" placeholder="enter Team Id" required>
													<br>
													<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="submit" class="special" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>

													

													</div>

												</div>
												</form>
													<form action="newreg.php" method="POST">
													<div id="niharkadiv2" lass="colors niharkadiv2">
													<font color="white" size="4">Enter Number of team Members</font><br>

													<input type="text" name="teamnum">
													<br>
													<div class="6u 12u$(xsmall)">
													<font color="#7F8C8D  " size="6"> Gender:</font><br>
													<select id="deln" name="gender">
													<option value="0">-select-</option>	
													<option value="M">Male</option>
													<option value="F">Female</option>
													<option value="T">Other</option>
													</select>	
													</div>
													<br>
													<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="submit" class="special" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>


													</div>
													</form>

												</div>
											</div>
											
										
									
							</section>

					</div>


			</div>

			<script>
			$(function() {    
               
$('#nihar').bind('change', function(event) {

           var i= $('#nihar').val();

            if(i=="niharkadiv1") 
             {
                 $('#niharkadiv1').show();
                 $('#niharkadiv2').hide();
             }
           else if(i=="niharkadiv2")
             {
               $('#niharkadiv1').hide(); 
               $('#niharkadiv2').show(); 

              }
              else{
              	$('#niharkadiv1').hide(); 
               $('#niharkadiv2').hide();


              }


});
});

			</script>
			

	</body>
	</html>

