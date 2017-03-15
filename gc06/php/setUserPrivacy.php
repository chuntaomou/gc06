<?php
  session_start();
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $userid = $_SESSION['userid'];
  $privacy = $_GET['privacy'];

  $query = "UPDATE user_detail  set privacy_id = $privacy WHERE user_id='$userid'";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  $row = mysqli_fetch_array($result);
  if ($result) {
     echo ('
       <script>
       window.location ="../html/UserProfile.php?id='.$userid.'"; 
       </script>
       '
   );
  };


mysqli_close($connection);
//0--好友可见  1--circle可见 2--陌生人可见
?>
