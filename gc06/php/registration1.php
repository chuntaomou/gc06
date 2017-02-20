<?php
    session_start();
    include "../php/mysql_connect.php";
    ini_set('display_error', '1');
    ini_set('error_reporting', E_ALL);


/*
    $email =  $_POST['email'];

    $password =  $_POST['password'];

    $query = "INSERT INTO user_login (user_name, pass_word) VALUES ( '$email', SHA('$password') )";

    $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());

    if ($result) {

      echo "1 record added";

    }



    mysqli_close($connection);
*/
   $email=$_POST['email'];
   $password=$_POST['password'];

   $email=filter_var($email,FILTER_SANITIZE_EMAIL);
   if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     echo "Invalid Email.......";
   }else{
     $query = "INSERT INTO user_login (user_name, pass_word) VALUES ( '$email', SHA('$password') )";
     $result = mysqli_query($connection, $query) or die('Error making select users query'.mysql_error());

   }
   if ($result) {
     echo "1 record added";
     $_SESSION['userid']=mysqli_insert_id($connection);
     echo (mysqli_insert_id($connection));
   }
   mysqli_close($connection);

 ?>
