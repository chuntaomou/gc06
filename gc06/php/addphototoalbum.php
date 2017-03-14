<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

$msg="";
$target="../album/".basename($_FILES["image"]["name"]);
$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
$image=$_FILES["image"]["name"];
$id=$_SESSION["userid"];
$album_id=$_GET["id"];
echo $album_id;
echo $image;
echo $id;

$query="INSERT INTO photo_detail (album_id,photo_url,posted_by_user_id) VALUES ('$album_id','$image','$id')";
mysqli_query($connection,$query) or die ("fail to insert");
mysqli_close($connection);

if(move_uploaded_file($_FILES["image"]["tmp_name"],$target)){
  $msg="Album image uploaded successfully";
  $destination="../html/Photocollection.php?id=$album_id";
  header("Location: {$destination}");
}else{
  $msg="There was a problem uploading album image";
  echo $msg;
}
?>
