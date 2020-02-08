<?php
print_r($_POST);exit;
extract($_POST);
include "functions.php";
if(isset($register)) 
{
	if(!empty($name) && !empty($email) && !empty($mobile) && !empty($password))
	{
	   $con=mysql_connect("localhost","root","");
	   if($con)
	   {
				mysql_select_db("9amnewbatch");
				//checking for existancy
					$sql_chk="select * from users_tbl where email='$email'";
					$resultset=mysql_query($sql_chk);
				//end
				 $count=mysql_num_rows($resultset);
			   if($count==0)
			   {
				$password=md5($password);
				$date=date('Y-m-d');
				$sql_insert="insert into users_tbl(name,email,mobile,password,registered_date) 
						 values('".format_string($name)."','".format_string($email)."','$mobile','$password','$date')";
				$result=mysql_query($sql_insert) or die(mysql_error());
				if($result)
				header('location:register.html');
				else
				echo "Registration failed";
			   }
			   else
			   {
					echo "Entered email already exists...!";
			   }
		}
		else
	  {
		echo "Not connected";
	  }
      }
	  
  else
   {
		echo "Please enter all values";
   }
}


?>