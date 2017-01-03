<?


include 'Delegate/delegate_functions.php';





function get_teamdata($val)
{
	$Basketball=array('sizeM' => 5,'sizeF' => 6,'priceM' => 500,'priceF' => 200);//associative array
	$Football=array('sizeM' => 11,'sizeF' => 15,'priceM' => 700,'priceF' => 900);

	file_put_contents('error_or_successevent.txt','');//empty the log file

	$connection=mysqli_connect('localhost','root','','revels17');
	if($connection)
	{

		$query="SELECT * from teams where teamid='$val'";
		$result=mysqli_query($connection,$query);

		$cnt=mysqli_num_rows($result);
		$gender='';
		if(!$result)
		{
			$file=fopen('error_or_successevent.txt',"w+");
   			$write=fwrite($file,'teamid is not Registered,Please register a new team!');
   			return 0;


		}
		if($cnt==0)//no team id registered
		{
			$file=fopen('error_or_successevent.txt',"w+");
   			$write=fwrite($file,'teamid is not Registered,Please register a new team!');
   			return 0;

		}else{

			$info=array();
			
			
			while($row = mysqli_fetch_assoc($result)) {

        	//can use array_push
  			$info[] = array("name" => $row['name'], "regno" => $row['regno'], "id" => $row['id']);
        	
        	
        	$gender=$row['gender'];



			}
			$jsoninfo=json_encode($info);
			$_SESSION['info']=$jsoninfo;
			$_SESSION['gender']=$gender;

		}
		//start of if else ladder!

		if($gender=='M' && $_SESSION['choice']=='Football')
		{
			if($cnt>$Football['sizeM'])
			{
				$file=fopen('error_or_successevent.txt',"w+");
   			$write=fwrite($file,'size exceeded please register a new team!,max team size is '.$Football['sizeM'].' ');
   			return 1;


			}
			else//send the number of candidates in the team
			{
				
				return $cnt;
			}



		}
		else if($gender=='F' && $_SESSION['choice']=='Football')
		{

			if($cnt>$Football['sizeF'])
			{
				$file=fopen('error_or_successevent.txt',"w+");
   			$write=fwrite($file,'size exceeded please register a new team!,max team size is '.$Football['sizeF'].' ');
   			return 1;


			}
			else
			{
				
				return $cnt;
			}



		}
		else if($gender=='F' && $_SESSION['choice']=='Basketball')
		{

			if($cnt>$Basketball['sizeF'])
			{
				$file=fopen('error_or_successevent.txt',"w+");
   			$write=fwrite($file,'size exceeded please register a new team!,max team size is '.$Basketball['sizeF'].' ');
   			return 1;


			}
			else
			{
				
				
				return $cnt;
			}




		}
		else if($gender=='M' && $_SESSION['choice']=='Basketball')
		{

			if($cnt>$Basketball['sizeM'])
			{
				$file=fopen('error_or_successevent.txt',"w+");
   			$write=fwrite($file,'size exceeded please register a new team!,max team size is '.$Basketball['sizeM'].' ');
   			return 1;


			}
			else
			{
				
				return $cnt;
			}




		}
		else{


			return 3;
		}









	}
	else{//connection to database failed!
		$file=fopen('error_or_successevent.txt',"w+");
   		$write=fwrite($file,'can\'t connect to database ,Please try again later');


	}










}

 



function get_delegatedata($val)
{
	$connection=mysqli_connect('localhost','root','','revels17');
	$delinfo=array();
	$n=$_SESSION['inputnum'];
	if($connection)
{
for($i=0;$i<$n;$i++)
	{
		$vals=$val[$i];
	$query="SELECT * from delegate where id='$vals'";
	$result=mysqli_query($connection,$query);
	if($result)
	{
		$row=mysqli_fetch_assoc($result);

		$delinfo[]=array('name' =>$row['name'],'regno' =>$row['regno'],'id' =>$row['id'] );

		//finally $_SESSION['info'] will contain the details of the team after the last call is made to the function

		
		

	



	}
	


	else
	{
		return 2; 


	}
}

		$_SESSION['delinfo']=json_encode($delinfo);
mysqli_close($connection);
return 1;


}
else{

	return 0;


}
}
function delegate_check($val)
{


	$connection=mysqli_connect('localhost','root','','revels17');
if($connection)
{
	$query="SELECT * from delegate where id='$val'";
	$result=mysqli_query($connection,$query);
	$gender=$_SESSION['gender'];//for gender check
	if($result)
	{
		$num=mysqli_num_rows($result);

		if($num==0)
		{
			$_SESSION['delegate_with_error']=$val;
			return 3;
		}

		//else will be $num>1
		$row=mysqli_fetch_assoc($result);

		//gender check
		if($gender!=$row['gender'])
		{
			$_SESSION['delegate_with_error']=$val;
			return 4;

		}
		

	



	}
	else
	{
		return 2; 


	}


mysqli_close($connection);
return 1;

}
else
{
	
	return 0;


}


}

function get_teamid()
{

	$connection=mysqli_connect('localhost','root','','revels17');

	if($connection)
	{

		$query="SELECT teamid
	FROM teams
	ORDER BY teamid DESC
	LIMIT 1";//get the latest teamid entry
	/*
	the idea here is to get the latest team id entry
	.using this we can give teamid to the new registrations.
	if there are no entries(which means table is empty) we will give 
	that team an id of 1
	

	*/
		$result=mysqli_query($connection,$query);
		if($result)
		{
			$num=mysqli_num_rows($result);
			if($num==0)
				return 1;//empty condition

			$row=mysqli_fetch_assoc($result);
			$a=$row['teamid'];

			mysqli_close($connection);

			return $a+1;//infinite variations can be given to the assignment of teamids using this method :)



		}else
		{

			return 0;
		}




	}



}


?>
