<?php



if ($_GET['id']==$_SESSION['userid'])  require "../html/UserProfile.php";

else if ($_GET['id']!=$_SESSION['userid'])  require "../html/UserProfile.php";

?>
