<?php
  session_start();
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $userid = $_SESSION['userid'];
  $circleArray = array();

  $output="";
  $query = "SELECT * FROM circle_detail WHERE circle_admin_user_id ='$userid' ";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  while ($row=mysqli_fetch_array($result)){
     $circleName= $row["circle_name"];
     $circleid=$row["circle_id"];
     $output.='
     <li>
     <a href="../html/Circlechat.php?id='.$circleid.'" target ="_blank">
     <img src="../img/group.png" class="img-thumbnail">
     </a>
     '.$circleName.'
     </li>
     ';
}

  $querymember="SELECT * FROM circle_members WHERE member_user_id='$userid'";
  $resultmember=mysqli_query($connection,$querymember) or die ("error in selecting member in circle");
  $countmember=mysqli_num_rows($resultmember);

  if($countmember>0){
    while($rowmember=mysqli_fetch_array($resultmember)){
      $circle_member_id=$rowmember["circle_id"];
      $queryfindname="SELECT * FROM circle_detail WHERE circle_id='$circle_member_id'";
      $resultfindname=mysqli_query($connection,$queryfindname) or die("error in finding name member");
      $row_member_name=mysqli_fetch_array($resultfindname);
      $circle_member_name=$row_member_name["circle_name"];
      $output.='
      <li>
      <a href="../html/Circlechat.php?id='.$circle_member_id.'">
      <img src="../img/group.png" class="img-thumbnail">
      </a>
      '.$circle_member_name.'
      </li>
      ';
    }
  }


  echo $output;
mysqli_close($connection);
?>
