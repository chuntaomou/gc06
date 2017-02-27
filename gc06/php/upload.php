<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
$msg="";
$target="../images/".basename($_FILES["image"]["name"]);
$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
$image=$_FILES["image"]["name"];
$id=$_SESSION["userid"];

$query="UPDATE user_detail SET profile_pic='$image' WHERE user_id='$id'";
$result=mysqli_query($connection,$query);
if($result==null){
  echo "asdf";
}

if(move_uploaded_file($_FILES["image"]["tmp_name"],$target)){
  $msg="Image uploaded successfully";
}else{
  $msg="There was a problem uploading image";
}
 echo "upload sucessfully, please go back"
?>
