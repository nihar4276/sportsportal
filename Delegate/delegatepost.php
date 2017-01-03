<?php
include 'dbconnect.php';
include 'Delegate/delegate_functions.php';
session_start();
$log='';
if($connection)
{


	$name=$_POST['name'];
	$regno=$_POST['regno'];
	$college=$_POST['college'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$gender=$_POST['gen'];


	$clgflag=0;
	$emailflag=0;
	$phoneflag=0;
	file_put_contents('error_or_successlog.txt','');//empty the log  file
	if(check_nameandcollege($name,$college))
	{


		$clgflag=1;
		


	}
	else
	{
		$log .='Name or College should not contain digits or special characters!';

	}
	if(check_email($email))
	{


		$emailflag=1;
		

	}else
	$log .='Email Not Valid!';

	if(check_phoneno($phone))
	{

		$phoneflag=1;
		
	}
	else
		$log .='phone length must be [10,15] and must not contain special characters!';


	$file=fopen('error_or_successlog.txt',"w+");
   	$write=fwrite($file,$log);

	if($clgflag && $emailflag && $phoneflag)
	{

		
		$delinfo = array('name' => $name,'regno'=>$regno,'college'=>$college,'email'=>$email,'phone'=>$phone,
			'gender'=>$gender);

		

		$jsonformat_info = json_encode($delinfo);

		$_SESSION["details"] = $jsonformat_info;

		redirect('confirm_delegate.php');

	}
	else
		redirect('delegate.php');


}
else{


	echo '<center> can\'t connect to Database,Try again later! </center>';
}

?>