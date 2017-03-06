<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

//$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
if(isset($_POST["submit"])){
  echo "click";
  $userid=$_SESSION["userid"];
  $name=$_POST["username"];
  $msg=$_POST["message"];
  if(($msg!=null)&&($name!=null)){
    $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
    $query="INSERT INTO circle_messages (message_sent_user_id,message_content) VALUES ('$userid','$msg')";
    if(!mysqli_query($connection,$query)){
      die("Error:".mysqli_error($connection));
    }else{
      header("Location: ../html/Groupchat.php");
      exit();
    }
    mysqli_close($connection);
  }else{
    $error="please fill in yout name and message";
    header("Location: ../html/Groupchat.php?error=".urlencode($error));
    exit();
  }
}
?>
