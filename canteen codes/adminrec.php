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
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
{

$sql="SELECT * FROM `orders`";
      $result=mysql_query($sql);

    echo "<table text-align:center border='2'>
    <tr>
    <th>S.No. </th>
    <th>Username </th>
    <th> Order </th>
    <th> Bill </th>
    <th> Delivery Place </th>
    </tr>";

    while($row = mysql_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['sno'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['ord']. "</td>";
    echo "<td>" . $row['bill']. "</td>";
    echo "<td>" . $row['delivery']. "</td>";
}

 echo 'To go back to the admin panel, click \'Go Back\'.<a href="admin.php"><br><br>Go Back</a> ';

$page=$_SERVER['PHP_SELF'];
$sec="30";
header("Refresh: $sec; url=$page");

}

?>

</div>
</body>
</html>
