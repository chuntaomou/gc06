<?php
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $userid = $_GET['id'];

  $query = "SELECT * from user_detail Where user_id='$userid' ";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  $row = mysqli_fetch_array($result);
  $firstname = $row["first_name"];
  $lastname = $row["last_name"];
  if ($result) {
    echo $firstname."&nbsp".$lastname;
  };


mysqli_close($connection);
?>
