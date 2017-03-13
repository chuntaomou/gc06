<?php
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $userid = $_GET['id'];

  $query = "SELECT * FROM user_detail WHERE user_id ='$userid'";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  $row=mysqli_fetch_array($result);
  $name = $row["first_name"]."&nbsp".$row["last_name"];
  $gender = $row["gender"];
  $city = $row["city"];
  $workplace = $row["work_place"];
  $phonenumber= $row["phone_number"];


  echo("<div class='col-md-8'>
    <ul>
      <li><strong>Name:</strong>{$name}</li>
      <li><strong>Gender:</strong>{$gender}</li>
      <li><strong>City:</strong>{$city}</li>
      <li><strong>Work place:</strong>{$workplace}</li>
      <li><strong>Number:</strong>{$phonenumber}</li>
      <li><strong>DOB:</strong>September 16th</li>
      <li><button type='submit' class='btn btn-default pull-right'>friend</button></li>
    </ul>
  </div>");

mysqli_close($connection);
?>
