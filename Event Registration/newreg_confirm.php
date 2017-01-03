<?php
session_start();
include 'Event/event_functions.php';

if(!isset($_SESSION['users']))
	header('Location: index.php');

if(!isset($_SESSION['inputnum']))
	header('Location: event_main.php');
if(!isset($_SESSION['gender']))
{
	echo '<font colot="red" size="5">please select gender</font>';
	header( "refresh:3;url=newreg.php" );


}
$Basketball=array('sizeM' => 5,'sizeF' => 6,'priceM' => 500,'priceF' => 200);
$Football=array('sizeM' => 11,'sizeF' => 15,'priceM' => 700,'priceF' => 900);

$n=(int)$_SESSION['inputnum'];
$info=array();
$log='';


$errorflag2=0;
$j=0;

for($i=1;$i<=$n;$i++)
{
	$c=(int)$_POST['del'.$i.''];
	$e=delegate_check($c);
	if($e==1)
	{

		$info[]=$c;
		$j++;
		




	}else{
		if($e==4)
		{
			$errorflag2=1;
			$log='the delegate number '.$_SESSION['delegate_with_error'].'\'s gender does not match with the entry in delegate database! please contact system admin asap! ';
			break;

		}
		if($e==3)
		{
			$errorflag2=1;
			$log='the delegate number '.$_SESSION['delegate_with_error'].' is invalid!';
			break;

		}
		if($e==0)
		{
			$errorflag2=1;
			$log='Unable to connect to database,please Try again later';
			break;

		}




	}





}//end of for loop
if($j==$_SESSION['inputnum'])
$a=get_delegatedata($info);

if(!$errorflag2 && isset($_SESSION['delinfo']))
{

	$fininfo=json_decode($_SESSION['delinfo'],true);
	


}


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

<?	
	if($errorflag2)
	{

	echo '

			<center><font color="red" size="4">'.$log.' </font>  </center>
			<br>
			<br>




	';
	header( "refresh:4;url=event_main.php" );//user sees the error message and is directed to the  main page  after 3 secs to correct his error 
	


	}else if(!$errorflag2 && isset($_SESSION['delinfo']))
	{

		echo'<center>';
			echo'<font color="green" size="10">Team  Information </font><br>';

			echo '<table id="nihartable">

			<tr>
			<th>Name</th><th>Registration Number</th><th>Delegate Id</th></tr>';



								
			
			
			$j=1;
			foreach ($fininfo as $i => $row)
			{
   	 			
    			
				echo '<tr><td>'.$row['name'].'</td><td> '. $row['regno'].'</td><td>'.$row['id'].' </td></tr>';
				
   		 		
			}
			echo'</table>';
			echo'</center>';
			$payamount=0;
			$cnt=$_SESSION['inputnum'];
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
			<form action="newreg_sendtodb.php" method="POST">
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