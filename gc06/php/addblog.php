<?php
    session_start();
    include "../php/mysql_connect.php";
    ini_set('display_error', '1');
    ini_set('error_reporting', E_ALL);

    $userid=$_SESSION["userid"];
    $title=$_POST["title"];
    $content=$_POST["content"];

     $query = "INSERT INTO blog_detail (created_by_user_id, blog_title, blog_content) VALUES ( '$userid', '$title', '$content' )";
     $result = mysqli_query($connection, $query) or die('Error occur with query'.mysqli_error());


   if ($result) {
     echo "one blog has been added";

   }
   mysqli_close($connection);

 ?>
