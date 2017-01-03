<?php
include 'dbconnect.php';

session_start();

if($connection)
{
$nm=$_POST['username'];
$regno=$_POST['password'];
$optionval=$_POST['portals'];




$nm1=mysqli_real_escape_string($connection,$nm);
$regno1=mysqli_real_escape_string($connection,$regno);
if(!empty($nm) && !empty($regno)){
	$query=" SELECT *  from users where name='$nm1'and pass='$regno1' ";
	$result=mysqli_query($connection,$query);


	$count=mysqli_num_rows($result);


	if($count==1)
	{
		
		
	
	$_SESSION['users']=$nm1;
	
		if($optionval=='0')
			echo 'select portal from the list!!';
		else if($optionval=='1')
			header("Location: delegate.php");
		else if($optionval=='2')
			header("Location: event.php");
		else if($optionval=='3')
			header("Location: search.php");


	

	
}else{

	echo 'user not found';
	
	

}

}

}
else
	echo 'can\'t connect to database,try again later!';

mysqli_close($connection);	



?>