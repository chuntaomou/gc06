<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

$user_id=$_SESSION["userid"];
$text_id=$_POST["textid"];
$comment=$_POST["text"];

$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
mysqli_close($connection);
?>
