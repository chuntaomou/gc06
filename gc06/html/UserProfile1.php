<?php



if ($_GET['id']==$_SESSION['userid'])  require "../html/Photos.php";

else if ($_GET['id']!=$_SESSION['userid'])  require "../html/Photos.php";

?>
