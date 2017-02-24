<?php
    session_start();
    include "../php/mysql_connect.php";
    ini_set('display_error', '1');
    ini_set('error_reporting', E_ALL);


   $friendid =$_POST['friendid'];
   $userid=$_SESSION["userid"];


     $query = "INSERT INTO friends_list (user_id, friend_id, status) VALUES ( '$userid', '$friendid', 'pending' )";
     $result = mysqli_query($connection, $query) or die('Error making select users query'.mysql_error());


   if ($result) {
     echo "request has been sent";

   }
   mysqli_close($connection);

 ?>
