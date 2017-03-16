<?php

include "../php/mysql_connect.php";
ini_set('display_error', '1');
error_reporting(E_ALL);

$blogid = $_GET["blogid"];
$query = "SELECT * FROM blog_detail WHERE blog_id ='$blogid'  ";
$result = mysqli_query($connection, $query) or die( 'Error occur selecting friends'.mysqli_error());
$row =mysqli_fetch_array($result);
$content = $row["blog_content"];
$title = $row["blog_title"];

if ($result){

   echo ('      <h2 class="blog-post-title">'.$title.'</h2>
           <p>'.$content.'</p>
        ');
}


mysqli_close($connection);
 ?>
