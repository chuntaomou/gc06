<?php
  session_start();
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $userid = $_SESSION['userid'];
  $circleArray = array();

  $query = "SELECT * FROM circle_detail WHERE circle_admin_user_id ='$userid' ";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  while ($row=mysqli_fetch_array($result)){
     $circleArray []= $row["circle_name"];
  }
  foreach($circleArray as $circleName){
    echo
   ('
   <div class="row">
     <div class="col-md-6">
      <a href="../">
       <p> '.$circleName.'</p>
      </a>
     </div>
   </div>
    ');
}

mysqli_close($connection);
?>
