<?php
session_start();
$connection=mysqli_connect("localhost","root","root","socialsite_db");
ini_set('display_error', '1');
error_reporting(E_ALL);
 $userid = $_SESSION["userid"];
$query = "SELECT user_id,friend_id FROM friends_list WHERE (user_id ='$userid' or friend_id = '$userid') and status='friend' ";
$result = mysqli_query($connection, $query) or die( 'Error occur selecting friends'.mysqli_error());
$friendidArray = array();

if (mysqli_num_rows($result)!= 0){
  while ($row=mysqli_fetch_array($result)){
   if ($row["user_id"]==$userid)  $friendidArray[]=$row["friend_id"];
      else $friendidArray[]=$row["user_id"];

     }
  foreach ($friendidArray as $friendid){
      $query = "SELECT * from user_detail where user_id='$friendid' ";
      $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
      $row = mysqli_fetch_array($result);
      $id = $row["user_id"];
      $name = $row["first_name"].$row["last_name"];
      if($row["profile_pic"]==NULL){
        $icon='../img/user.png';
      }  else
      {
        $icon="../images/{$row['profile_pic']}";
      }
     echo

      ('
       <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class ="row">
                <div class ="col-xs-6 col-md-6">
                 <p > '.$name.' </p>
                </div>
                <div class="col-md-6">
                 <button type="button" class="btn1" id="'.$friendid.'">
                  add
                 </button>
                </div>
             </div>
            </div>
          </div>
        </div>
      </div>

    ');



   }


}

mysqli_close($connection);
 ?>
