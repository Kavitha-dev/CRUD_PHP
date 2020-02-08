<?php
extract($_POST);
if(isset($login))
{
	require_once "dbconnect.php";
	$password=md5($password);
	$sql_chk="select * from users_tbl where email='$email' and password='$password'";
	$rs=mysql_query($sql_chk);
	$count=mysql_num_rows($rs);
	if($count==1)
	{
	   session_start();
	   $row=mysql_fetch_assoc($rs);
	    //print_r($row);
	   $_SESSION['user_id']=$row['user_id'];
	   $_SESSION['name']=$row['name'];
	   header('location:view_users.php');
	}
	else
	{
	   echo "Invalid login details";
	}
}

?>


<form method="post" action="">
<input type="text" name="email" placeholder="Email" value="<?php echo $_COOKIE['email'];?>"/><br/><br/>
<input type="password" name="password" placeholder="Password" value="<?php echo $_COOKIE['password'];?>"/><br/><br/>
<input type="submit" name="login" value="Login"/>
</form>