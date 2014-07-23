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


<?php ob_start(); ?>
<?php
if(isset($_POST['username']))
{
	require 'connect.inc.php';
	require 'core.inc.php';
	$first=$_POST['firstname'];
	$last=$_POST['lastname'];
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$room=$_POST['room_number'];
	$host=$_POST['hostel'];
	$pass_hash=md5($pass);

	//echo $first." ".$last." ".$user." ".$pass." ".$pass_hash.".";
	if(!mysql_connect($mysql_host,$mysql_user,$mysql_pass)||!mysql_select_db($mysql_db))
	{
		echo 'database problem';

		header('Location: index.php');
	}

	else

	{
		$result="SELECT `username` FROM `user` WHERE `username`='$user'";
			if($query=mysql_query($result))
			{ $rows=mysql_num_rows($query);
				if($rows==0)
				{$SQL="INSERT INTO user
					VALUES('','$user','$pass_hash','$first','$last','$room','$host')";

				mysql_query($SQL);
				//header('Location: index.php');

			if($user!="admin"){$sql="CREATE TABLE $user(
				id int(11) not null,
				quantity int(11) not null,
				total int(11) not null,
				name varchar(65) not null)";
			mysql_query($sql);}
			else //($user=="admin")
			{$sql="CREATE TABLE orders(
			sno int(11) not null primary key auto_increment,	
			username varchar(65),
			ord varchar(500),
			bill int(11),
			delivery varchar(65))";
			mysql_query($sql);
			}

			header('Location: index.php');
		}
			

			else
			{
				echo ("The Username already exists. Please enter a new one.<br>");
				//header('location: register.php');

			}}
	}
}

?>


<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" >
<form action="register.php" method="POST">
<tr>
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
<tr>
<td colspan="3"><strong>User Registration</strong></td>
</tr>
<tr>
<td>First Name</td><td> :</td><td> <input type="text" name="firstname"></td>
</tr>
<tr>
<td>Last Name</td> <td>:</td> <td><input type="text" name="lastname"></td>
</tr>
<tr>
<td>User Name</td><td> :</td><td> <input type="text" name="username"></td>
</tr>
<tr>
<td>password</td><td> :</td> <td><input type="password" name="password"></td>
</tr>
<tr>
<td>room number </td><td>:</td><td> <input type="text" name="room_number"></td>
</tr>
<tr>
<td>Hostel Name</td><td> :</td><td><select name="hostel">
<option value =""></option>
<option value="dashir">Dashir</option>
<option value="nako">Nako</option>
<option value="suvalsar">Suvalsar</option>
<option value="beas_kund">Beas Kund</option>
<option value="renuka_hall">Renuka Hall</option>
<option value="acad">Academy</option>
</select></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" value="Register"><br><br><br></td>
</tr>
</table>
</td>
</form>
</tr>
<td>Already Registered?<a href="index.php">login</a></td>
</table>
</html>
