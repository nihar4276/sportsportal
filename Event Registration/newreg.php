<?
session_start();

if(!isset($_SESSION['users']))
	header('Location: index.php');

$val=$_POST['teamnum'];
$gender=$_POST['gender'];
if(!$gender)
	header('Location: event_main.php');


if(!$val)
{
	header('Location: event_main.php');


}
$vals=(int)$val;
$_SESSION['inputnum']=$vals;
$_SESSION['gender']=$gender;
$log='';

$Basketball=array('sizeM' => 5,'sizeF' => 6,'priceM' => 500,'priceF' => 200);
$Football=array('sizeM' => 11,'sizeF' => 15,'priceM' => 700,'priceF' => 900);

//start of else if ladder to get the max team size allowed check

$flag=0;

if($vals>$Football['sizeM'] && $gender=='M' && $_SESSION['choice']=='Football')
{
	$flag=0;
	$log='Sorry team size Limit exceeded ,max allowed team  size for '.$_SESSION['choice'].'(Male) is  '.$Football['sizeM'].'';


}

else if($vals>$Football['sizeF'] && $gender=='F' && $_SESSION['choice']=='Football')
{
	$flag=0;
	$log='Sorry team size Limit exceeded ,max allowed team  size for '.$_SESSION['choice'].'(Female) is  '.$Football['sizeF'].'';

}
else if($vals>$Basketball['sizeF'] && $gender=='F' && $_SESSION['choice']=='Basketball')
{
	$flag=0;
	$log='Sorry team size Limit exceeded ,max allowed team  size for '.$_SESSION['choice'].'(Female) is  '.$Basketball['sizeF'].'';

}
else if($vals>$Basketball['sizeM'] && $gender=='M' && $_SESSION['choice']=='Basketball')
{
	$flag=0;
	$log='Sorry team size Limit exceeded ,max allowed team  size for '.$_SESSION['choice'].'(male) is  '.$Basketball['sizeM'].'';

}
else{

	$flag=1;
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
								<p> Enter The Delegate  Numbers of your team<br>
								In case of queries, contact system admin</p>
							</div>
						</div>
					</section>

 		</div>

 		<div id="main">

 			<?
 				if($flag==0)
 				{
 					echo '

 					<center><font color="red" size="4">'.$log.'</font>  </center>
										<br>
										<br>

 					';
 				header( "refresh:4;url=event_main.php" );

 				}
 				else{

 					echo'<br><center>';

 					for($i=1;$i<=$vals;$i++)
 					{
 						echo'<form action="newreg_confirm.php" method="POST">';
 						echo 'Delegate Number '.$i.'<br>';
 						echo '<input type="text" id="niharkainput" name="del'.$i.'" required><br>';





 					}




 					echo '</center>';

 					echo '
 					<div class="12u$">
				<center>
					<ul class="actions">

					<li><input type="submit" value="Confirm" class="special" /></li>
					
					</ul>
					</div>


 					';
 					echo '</form>';
 					}





 			?>

 		</div>	

 		</body>
 		</html>
