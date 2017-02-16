<?php

    include "../php/mysql_connect.php";

    ini_set('display_error', '1');

    ini_set('error_reporting', E_ALL);



    $email =  $_POST['email'];

    $password =  $_POST['password'];

    $query = "INSERT INTO user_login (user_name, pass_word) VALUES ( '$email', SHA('$password') )";

    $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());

    if ($result) {

      echo "1 record added";

    }



    mysqli_close($connection);

 ?>
