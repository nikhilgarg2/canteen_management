<html>
<head>
<style>
 <!--
 body {
 background-image: url(t1.jpg);
 background-repeat: no-repeat;
 background-attachment: fixed;

/* Safari and Chrome */
-webkit-background-size: 100% 100%;

/* Firefox */
-moz-background-size: 100% 100%;

/* Internet Explorer */
-ms-background-size: 100% 100%;

/* Opera */
-o-background-size: 100% 100%;

/* CSS3 */
background-size: 100% 100%; }
 //-->
 </style> 
</head>


<?php
if(isset($_POST['username'])&&isset($_POST['password']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];

	$password_hash=md5($password);
	if(!empty($username) &&!empty($password))
	{

		$query="SELECT `id` FROM `user` where `username`='$username' && `password`='$password_hash'";

		if($query_run=mysql_query($query)){
			$query_num_rows=mysql_num_rows($query_run);
			
				if($query_num_rows==0)	{

					echo 'Invalid username/password combination.';

			}
		elseif($query_num_rows==1) {

		$user_id=mysql_result($query_run,0,'id');
 		$_SESSION['user_id']=$user_id;
		if($username=="admin")
	{	header('Location: admin.php');}
		else
		{
		header('Location:index.php');
		}

			}
		}

	}

	else
	{

		echo 'You must supply a valid username and a password';
	}


}
?>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<form action="<?php echo $current_file;   ?>" method="POST">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input type="text" name="username"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input type="password" name="password"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" value="Log In"><br><br><br></td>
</tr>
</table>
</td>
</form>
</tr>
<td>New User?<a href="register.php">register here</a></td>

</table>



</form>


</html>
