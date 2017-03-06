<?php
  session_start();
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $memberid = $_POST["value"];
  $circleid = $_POST["circleid"];

  $query = "INSERT INTO circle_members(circle_id, member_user_id) values ('$circleid','$memberid') ";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  if (!$result) {echo "problem occur";}


mysqli_close($connection);
?>
