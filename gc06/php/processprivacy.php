<?php
session_start();

$albumid=$_GET["id"];
$id=$_POST["privacy"];

$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
$query="UPDATE photo_album SET privacy_id='$id' WHERE album_id='$albumid'";
mysqli_query($connection,$query);
mysqli_close($connection);
echo $id;
?>
