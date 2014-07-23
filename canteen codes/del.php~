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
ob_start();
require 'core.inc.php';
require 'connect.inc.php';
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{

echo 'To go Back, press \'Back\'.<a href="admin.php"><br>back</a>';
echo "<br><br><br>";

if(isset($_POST['del']) && !empty($_POST['del']))
{
$item=$_POST['del'];
$sql="SELECT `item_id` from `items` where `item_id`='$item'";
$res=mysql_num_rows(mysql_query($sql));
if($res!=0)
{$mysql="DELETE FROM items WHERE `item_id`='$item'";
mysql_query($mysql);
//header('location:admin.php');
}

else
{

echo "Not a valid ITEM ID";

}

}


echo "<br><br>PRESENT IEMS IN THE MENU :<br>";
$sql="SELECT * FROM `items`";
        $result=mysql_query($sql);

        echo "<table text-align:center border='2'>
                <tr>
                <th>Item id </th>
                <th>Item Name </th>
                <th> Base price </th> 
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





}
else
{
header('Location:index.php');
}



?>

<form action="del.php" method="POST">
Enter the item code you want to delete : <input type="text" name=del>
<input type="submit" value="confirm">
</form>
<br>
<br>
<br>
<br>
</div>
</body>
</html>
