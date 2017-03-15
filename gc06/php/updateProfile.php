<?php
  session_start();
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $userid = $_SESSION["userid"];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $city = $_POST['city'];
  $gender = $_POST['gender'];
  $workplace = $_POST['workplace'];
  $phonenumber = $_POST['phonenumber'];


  $query = "UPDATE  user_detail set first_name='$firstname',last_name='$lastname',gender='$gender',city='$city', work_place='$workplace',phone_number='$phonenumber' where user_id='$userid'";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  $row = mysqli_fetch_array($result);
  if ($result) {
    echo "<script>  window.location='../html/UserProfile.php?id={$userid}';    alert($userid);
</script>";
  };


mysqli_close($connection);
//0--好友可见  1--group可见 2--陌生人可见
?>
