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
<body>
<div align="center">
<?php echo 'To view the live canteen view, click on \'view\'.<a href="feed.php"><br>view</a> ';?>
<h1> Order :</h1>  
<?php
require 'connect.inc.php';
require 'core.inc.php';
ob_start();
//require 'part1.php';
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))    
{
	echo 'You have logged in.<a href="logout.php"><br><br>logout</a> ';
	echo "<br><br>MENU:<br>";
	$sql="SELECT * FROM `items`";
	$result=mysql_query($sql);

	echo "<table text-align:center border='2'>
		<tr>
		<th>Item id </th>
		<th>Item Name </th>
		<th> Rate </th> 
		</tr>";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['item_id'] . "</td>";
		echo "<td>" . $row['item_name'] . "</td>";
		echo "<td>" . $row['base_price']. "</td>";
		// echo "<td><input type="checkbox" name="items[]" value="<?php echo $row['item_code']; >?">.</td>";
	}
	echo "</table>";
	if(isset($_POST['item_i']) && !empty($_POST['item_i']))
	{$usr=$_SESSION['user_id'];
		$id=$_POST['item_i'];
		$quer="SELECT `item_id` from `items` where `item_id`='$id'";
		$res=mysql_num_rows(mysql_query($quer));
		if($res!=0)
		{$cost="SELECT `base_price` FROM `items` where `item_id`='$id'";
			$row=mysql_fetch_row(mysql_query($cost));
			$cost1=$row[0];
			$row1=mysql_fetch_row(mysql_query("SELECT `item_name` from items where `item_id`='$id'"));
			$name=$row1[0];
			$quan=$_POST['quantity'];
			$tot=$cost1 * $quan;
			//echo $tot;
			$query="SELECT `username` FROM `user` WHERE `id`='$usr'";
			$row=mysql_fetch_row(mysql_query($query));
			$query1=$row[0];
			$tab="INSERT INTO $query1
			VALUES('$id','$quan','$tot','$name')";
			mysql_query($tab);}
			else
			{

				echo "<br><br><br>Invalid Item ID. Please enter a valid item id :P :P<br><br>";

			}}
	$usr=$_SESSION['user_id'];
	$query="SELECT `username` FROM `user` WHERE `id`='$usr'";
	$row=mysql_fetch_row(mysql_query($query));
	$query1=$row[0];
	echo "<br><br>YOUR PRESENT ORDER :<br>";
	$sql="SELECT * FROM `$query1`";
	$result=mysql_query($sql);

	echo "<table text-align:center border='2'>
		<tr>
		<th>Item id </th>
		<th>Item Name </th>
		<th> Quantity </th> 
		</tr>";

	while($row = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['id'] . "</td>";
		echo "<td>" . $row['name'] . "</td>";
		echo "<td>" . $row['quantity']. "</td>";
		// echo "<td><input type="checkbox" name="items[]" value="<?php echo $row['item_code']; >?">.</td>";

	}
	echo "</table>";


	if(isset($_POST['item_o']) && !empty($_POST['item_o']))
{
	$item=$_POST['item_o'];

	$mysql="DELETE FROM `$query1` WHERE `id`='$item'";
	mysql_query($mysql);
	header('location:part2.php');
}

}
else
{
	header('Location:index.php');

}

//mysqli_close($con);

?>

</br></br>


<form action="part2.php" method="POST">
ADD ITEM :</br> 
Item Code: <input type="text" name="item_i" ></br>
Quantity : <input type="text" name="quantity"></br>
<input type="submit"></br></br></br>
DELETE ITEM : </br>
Item code: <input type="text" name="item_o"></br>
<input type="submit"></br>
</form>
</br>
</br>


If you have selected all items and want to finalize the order</br>
Click to get your bill</br>
<button onclick="window.location.href='bill.php'">Get Bill</button> 
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</div>
</body>
</html>
