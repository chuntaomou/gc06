<?php

include "../php/mysql_connect.php";
ini_set('display_error', '1');
error_reporting(E_ALL);

$userid = $_GET["id"];
$query = "SELECT * FROM blog_detail WHERE created_by_user_id ='$userid'  ";
$result = mysqli_query($connection, $query) or die( 'Error occur selecting friends'.mysqli_error());
echo 1;
if (mysqli_num_rows($result)!= 0){
  while ($row=mysqli_fetch_array($result)){
     $blogid = $row["blog_id"];
     $blogtitle =$row["blog_title"];
     $blogcontent = $row["blog_content"];
     $blogdate = $row["created_date"];

   echo('
     <a href="../php/Blogcontent.php?id='.$blogid.'" class="list-group-item">
       <h4 class="list-group-item-heading">'.$blogtitle.'</h4>
       <p class="list-group-item-text">'.$blogdate.'</p>
     </a>
   ');
   }


}

mysqli_close($connection);
 ?>
