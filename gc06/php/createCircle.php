<?php
  session_start();
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $userid = $_SESSION["userid"];
  $name = $_POST["title"];

  $query = "INSERT INTO circle_detail(circle_admin_user_id, circle_name) values ('$userid','$name') ";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  if ($result) {echo mysqli_insert_id($connection);}


mysqli_close($connection);
?>
