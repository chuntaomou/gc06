<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);


//$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
if(isset($_POST["submit"])){
  $userid=$_SESSION["userid"];
  $msg=$_POST["message"];
  $circleid=$_SESSION["circleid"];
  $destination="../html/Circlechat.php?id={$circleid}";

  if($msg!=null){
    $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
    $query="INSERT INTO circle_messages (message_sent_user_id,message_content,circle_id) VALUES ('$userid','$msg','$circleid')";
    if(!mysqli_query($connection,$query)){
      die("Error:".mysqli_error($connection));
    }else{
      header("Location: {$destination}");
    }
    mysqli_close($connection);
  }else{
    header("Location: {$destination}");
  }
}
?>
