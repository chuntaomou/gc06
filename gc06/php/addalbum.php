<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

$msg="";
$target="../albumicons/".basename($_FILES["icon"]["name"]);
$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
$icon=$_FILES["icon"]["name"];
$id=$_SESSION["userid"];
$name=$_POST["text"];

$query="INSERT INTO photo_album (created_by_user_id,album_name,album_pic) VALUES ('$id','$name','$icon')";
mysqli_query($connection,$query) or die("fail to insert");
mysqli_close($connection);
if(move_uploaded_file($_FILES["icon"]["tmp_name"],$target)){
  $msg="Album icon uploaded successfully";
  $destination="../html/Photos.php?id=$id";
  header("Location: {$destination}");
}else{
  $msg="There was a problem uploading albumicon";
  echo $msg;
}
?>
