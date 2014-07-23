<?php
require 'core.inc.php';
require 'connect.inc.php';
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

header('Location:part2.php');
}

else
{

include 'loginform.inc.php';

}

echo '<br><br><br>';


//require 'loginform.inc.php';
//echo $current_file;

?>
