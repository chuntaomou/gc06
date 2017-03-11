<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

$msg="";
$id=$_SESSION["userid"];
$text=$_POST["text"];

$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
$query="INSERT INTO photo_detail (photo_content,posted_by_user_id) VALUES ('$text','$id')";
mysqli_query($connection,$query) or die("Error in executing query");
mysqli_close($connection);
echo "<script>window.location='../php/newhomepage.php';</script>";
?>
