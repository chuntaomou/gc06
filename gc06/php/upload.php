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
$querydelete="SELECT * FROM user_detail WHERE user_id='$id'";
$result2=mysqli_query($connection,$querydelete);
if($result2!=null){
  $row=mysqli_fetch_array($result2);
  echo $row["profile_pic"];
  $file="../images/{$row['profile_pic']}";
  unlink($file);
}
$result=mysqli_query($connection,$query);
if($result==null){
  echo "asdf";
}
 mysqli_close ($connection);
if(move_uploaded_file($_FILES["image"]["tmp_name"],$target)){
  $msg="Image uploaded successfully";
  echo $msg;
  echo "upload sucessfully, please go back";
  echo "<script>window.location='../html/UserProfile.php?id=".$id."';</script>";
}else{
  $msg="There was a problem uploading image";
}
?>
