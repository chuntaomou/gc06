<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

$msg="";
$target="../uploads/".basename($_FILES["image"]["name"]);
$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
$image=$_FILES["image"]["name"];
$id=$_SESSION["userid"];
$text=$_POST["text"];


$query="INSERT INTO photo_detail (photo_url,posted_by_user_id,photo_content) VALUES ('$image','$id','$text')";
mysqli_query($connection,$query) or die("fail to insert");
mysqli_close($connection);
if(move_uploaded_file($_FILES["image"]["tmp_name"],$target)){
  $msg="Image uploaded successfully";
  echo $msg;
  echo "<script>window.location='../php/newhomepage.php';</script>";
}else{
  $msg="There was a problem uploading image";
  echo $msg;
}
?>
