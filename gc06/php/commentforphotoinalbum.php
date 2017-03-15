<?php
session_start();

$comment=$_POST["text"];
$photo_id=$_GET["id"];
$comment_id=$_SESSION["userid"];
$destination="../html/detailofphotoinalbum.php?id={$photo_id}";

if($comment!=null){
  $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
  $query="INSERT INTO photo_comment (photo_id,comment_by_user_id,comment_content) VALUES ('$photo_id','$comment_id','$comment')";
  if(!mysqli_query($connection,$query)){
    die("Error:".mysqli_error($connection));
  }else{
    header("Location: {$destination}");
  }
  mysqli_close($connection);
}else{
  header("Location: {$destination}");
}

?>
