<?php

include "../php/mysql_connect.php";
ini_set('display_error', '1');
error_reporting(E_ALL);

$blogid = $_GET["blogid"];
$query = "SELECT * FROM blog_detail WHERE blog_id ='$blogid'  ";
$result = mysqli_query($connection, $query) or die( 'Error occur selecting friends'.mysqli_error());
$row =mysqli_fetch_array($result);
$content = $row["blog_content"];
$title = $row["blog_title"];

$userid = $_GET["id"];
$query2 ="SELECT * FROM user_detail WHERE user_id='$userid'";
$result2 = mysqli_query($connection, $query2) or die('Error occur selecting friends'.mysqli_error());
$row2 = mysqli_fetch_array($result2);
$name = $row2["first_name"]." ".$row2["last_name"];



mysqli_close($connection);
 ?>
