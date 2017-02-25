<?php
session_start();
include "../php/mysql_connect.php";
ini_set('display_error', '1');
ini_set('error_reporting', E_ALL);


$userid =$_POST['friendid'];
$friendid=$_SESSION["userid"];


 $query = "UPDATE friends_list SET status='friend' WHERE user_id='$userid' AND friend_id='$friendid'";
 $result = mysqli_query($connection, $query) or die('Error making select users query'.mysql_error());


if ($result) {
 echo "you have accept the application";

}
mysqli_close($connection);

 ?>
