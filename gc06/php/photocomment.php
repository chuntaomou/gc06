<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

$user_id=$_SESSION["userid"];
$photo_id=$_POST["photoid"];
$comment=$_POST["text"];

$msg="";

$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
$query="INSERT INTO photo_comment (photo_id,comment_by_user_id,comment_content) VALUES ('$photo_id','$user_id','$comment')";
$result=mysqli_query($connection,$query);
mysqli_close($connection);
?>
