<?php
  session_start();
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $city = $_POST['city'];
  $gender = $_POST['gender'];
  $statement = $_POST['statement'];
  $phonenumber = $_POST['phonenumber'];
  $userid = $_SESSION['userid'];

  $query = "INSERT INTO user_detail (user_id, first_name, last_name, gender, city, phone_number, work_place) VALUES ('$userid', '$firstname', '$lastname','$gender','$city','$phonenumber','$statement')";
  $result = mysqli_query($connection, $query) or die('Error making select users query');
  if ($result) {
  echo "1 record added";
}  else {
  echo "mistake happen";
}

mysqli_close($connection);
?>
