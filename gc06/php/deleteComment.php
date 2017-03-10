<?php
  session_start();
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $commentid = $_GET['id'];

  $query = "DELETE FROM photo_comment WHERE comment_id ='$commentid'";
  $result = mysqli_query($connection, $query) or die('Error occur when deleting the comment'.mysqli_error());
  if ($result) echo "<meta http-equiv='refresh' content='0;url=../php/newhomepage.php'>";

mysqli_close($connection);
?>
