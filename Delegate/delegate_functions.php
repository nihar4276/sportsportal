
<?php

include 'dbconnect.php';



function check_nameandcollege($name,$college)//credentials checks
{
	$flag1=0;
	$flag2=0;
	//$file=fopen('functions.txt',"w+");

if (preg_match('/^[a-zA-Z.\' ]+$/', $name))//regex
{
    $flag1=1;
   

}
if (preg_match('/^[a-zA-Z.\', ]+$/', $college))
{
    $flag2=1;



}
	
   	

	if($flag1 && $flag2)
	return 1;
	else
	return 0;



}


function check_email($email)
{
	$flag3=0;

	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  // The email address is valid
	$flag3=1;


}
if($flag3)
return 1;
else
{


return 0;
}


}
function check_phoneno($phone)
{
	$lenflag=0;
	$flag2=0;
	$flag3=0;
	if(strlen($phone)>=10 && strlen($phone)<=15)
	{

		$lenflag=1;
	}
	//maxinternational code length is 5
	//japanese regional number contain letters so no letter check needed but can't contain special characters
	if(!preg_match('/[£$%&*()}{@#~?><>,|=_¬-]/', $phone))
	{

		$flag2=1;

	}


	//atleast10 digits check

	$cnt=0;
	for($i=0;$i<strlen($phone);$i++)
	{
		if(ord($phone[$i])>=48 && ord($phone[$i])<=57)
		{
			$cnt++;



		}


	}

	if($cnt>=10 && $cnt<=14)//one character is '+'(international format),so max number of letters can be 4
	{

		$flag3=1;
	}


		
	if($flag2 && $lenflag && $flag3)
	{

		return 1;

	}
	else 
		return 0;


}

function insert_data($name,$regno,$college,$email,$phone,$gender){

	$site='localhost';
	$username='root';
	$pw='';	
	$database="revels17";

	$connection=mysqli_connect($site,$username,$pw,$database);

	if($connection)
	{


		$query= "INSERT INTO delegate(name,regno,college,email,phone,gender) VALUES('$name','$regno','$college','$email','$phone','$gender')";
		$result=mysqli_query($connection,$query);
		if($result)
		{
			$query1="SELECT id from delegate WHERE name='$name' AND regno='$regno'";
			$result1=mysqli_query($connection,$query1);

			
	if($result1)
	{			
		
		$row = mysqli_fetch_assoc($result1); 

        return $row['id'];
	





		

	}else
	return mysqli_error($connection);







	}
	else{
		return mysqli_error($connection);

		


	}






}
else
{

	return 'cant connect to database';
}


}
function redirect($location)
{
	header("Location: " . $location);
	exit;	


}

?>


