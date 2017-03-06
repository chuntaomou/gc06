<?php
  session_start();
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $userid = $_POST['userid'];

  $query = "SELECT * FROM user_detail WHERE user_id ='$userid'";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  $row=mysqli_fetch_array($result);
  echo($row["first_name"].$row["last_name"]);

mysqli_close($connection);
?>
