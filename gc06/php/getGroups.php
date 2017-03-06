<?php
  session_start();
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $userid = $_SESSION['userid'];

  $query = "SELECT * FROM circle_detail WHERE circle_admin_user_id ='$userid' ";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  $row=mysqli_fetch_array($result);
  $name = $row["circle_name"];
  $circleid = $row ["circle_id"];
 echo
('
   <div class="row">
     <div class="col-md-6">
      <a href="..">
       <p> '.$name.' circleid:'.$circleid.'</p>
      </a>
     </div>
   </div>
');
mysqli_close($connection);
?>
