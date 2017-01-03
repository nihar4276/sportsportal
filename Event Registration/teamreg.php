<?php
include 'dbconnect.php';
include 'Event/event_functions.php';


session_start();
if(!isset($_SESSION['users']))
	header('Location: index.php');

$val=$_POST['teamid'];


if(!$val)
{
	header('Location: event_main.php');


}


$vals=(int)$val;
$_SESSION['currentteamid']=$vals;
$log='';
$Basketball=array('sizeM' => 5,'sizeF' => 6,'priceM' => 500,'priceF' => 200);
$Football=array('sizeM' => 11,'sizeF' => 15,'priceM' => 700,'priceF' => 900);

//so on

$cnt=get_teamdata($vals);

if(isset($_SESSION['info']))
{

	$fininfo=json_decode($_SESSION['info'],true);




}
if($cnt==0)
header( "refresh:3;url=event_main.php" );//user sees the error message and is directed to the  main page  after 3 secs to correct his error 
?>












<html>
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
								<p> Confirm To continue<br>
								In case of queries, contact system admin</p>
							</div>
						</div>
					</section>

 		</div>

 		<div id="main">

 		
										<center><font color="red" size="4"><?=  fgets(fopen("error_or_successevent.txt","a+")) ?> </font>  </center>
										<br>
										<br>

			
			<?
			if(isset($_SESSION['info']) && $cnt)
			{
				echo'<center>';
			echo'<font color="green" size="10">Team  Information </font><br>';

			echo '<table id="nihartable">

			<tr>
			<th>Name</th><th>Registration Number</th><th>Delegate Id</th></tr>';



								
			
			

			foreach ($fininfo as $i => $row)
			{
   	 			
    			
				echo '<tr><td>'.$row['name'].'</td><td> '. $row['regno'].'</td><td>'.$row['id'].' </td></tr>';
				
   		 		
			}
			echo'</table>';
			echo'</center>';

			//get amount to pay
			$payamount=0;
			if($_SESSION['gender']=='M' && $_SESSION['choice']=='Football')
			{

				$payamount=$cnt*$Football['priceM'];



			}else if($_SESSION['gender']=='F' && $_SESSION['choice']=='Football') 
				$payamount=$cnt*$Football['priceF'];
			else if($_SESSION['gender']=='F' && $_SESSION['choice']=='Basketball')
					$payamount=$cnt*$Basketball['priceF'];
			else if($_SESSION['gender']=='M' && $_SESSION['choice']=='Basketball')
				$payamount=$cnt*$Basketball['priceM'];

			echo '
			<br><font color="green" size="5"><center>Amount payable is:<font color="red size="5">'.$payamount.'</font></font></center><br> 
			<form action="team_sendtodb.php" method="POST">
				<div class="12u$">
				<center>
					<ul class="actions">

					<li><input type="submit" value="Confirm" class="special" /></li>
					
					</ul>
					</div>
					</center>

				</form>




			';

		}




		?>


				

				

 		



 		




 		</div>






 		</body>
 		</html>




