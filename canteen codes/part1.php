<html>
<body>
<?php
require 'connect.inc.php';
$query="SELECT * FROM `items`";
$result=mysql_query($query);

 echo "<table text-align:center border='2'>
    <tr>
    <th>Iten id </th>
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
    ?>

