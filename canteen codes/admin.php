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


<?php
require 'core.inc.php';
require 'connect.inc.php';
ob_start();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
	echo 'You have logged in.<a href="logout.php"><br><br>logout</a> ';
//require 'connect.inc.php';
$query="SELECT * FROM `items`";
$result=mysql_query($query);

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
  
    }
    echo "</table>";

    //mysql_close($con);
  
	
if(isset($_POST['add_del']))
	{

		$add=$_POST['add_del'];

		if($add=="add")
		{

			header('Location:add.php');

		}


		if($add=="del")
		{

			header('Location:del.php');

		}

	}

 echo 'To see the orders, click Orders.<a href="adminrec.php"><br><br>Orders</a> ';
}
else
{

	header('Location:index.php');

}

/*<form action="admin.php" method="POST">
Add or delete items : <select name ="add_del">
<option value="add">add</option>
<option value="del">delete</option>
</select>
<input type="submit" value="Press" ><br>
</form>*/
?>


<form action="admin.php" method="POST">
Add or delete items : <select name ="add_del">
<option value="add">add</option>
<option value="del">delete</option>
</select>
<input type="submit" value="Press" ><br>
</form>
<br>
<br>
<br>
<br>


</div>
</body>
</html>
