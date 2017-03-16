<?php
$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
//$id=$_SESSION["userid"];
$id=$_GET["id"];
$userid=$_SESSION["userid"];
$output="";
$type=3;

$query1="SELECT * FROM friends_list WHERE user_id='$id' AND friend_id='$userid'";
$query2="SELECT * FROM friends_list WHERE user_id='$userid' AND friend_id='$id'";

$result1=mysqli_query($connection,$query1);
$result2=mysqli_query($connection,$query2);

$count1=mysqli_num_rows($result1);
$count2=mysqli_num_rows($result2);

if(($count1+$count2)==0){
  //friends of friends
  $hostid=$_SESSION["userid"];
  $queryfriendofhost="SELECT * FROM friends_list WHERE user_id='$hostid' or friend_id='$hostid'";
  $resultfriendofhost=mysqli_query($connection,$query);
  $countfriendofhost=mysqli_num_rows($resultfriendofhost);

  if($countfriendofhost>0){
    while($rowfriendofhost=mysqli_fetch_array($resultfriendofhost)){
      if($rowfriendofhost["userid"]==$hostid){
        if($rowfriendofhost["friend_id"]==$_GET["id"]){
          $type=2;
        }
      }else{
        if($rowfriendofhost["user_id"]==$_GET["id"]){
          $type=2;
        }
      }
    }
  }

  //in same circle
}else{
  //friends
  $type=0;
}

if($type==0){
  $id=$_GET["id"];
  $output="";
  $query="SELECT * FROM photo_album WHERE created_by_user_id='$id'";
  $result=mysqli_query($connection,$query) or die ("Error in selecting photo albums");
  $count=mysqli_num_rows($result);

  if($count>0){
    while($row=mysqli_fetch_array($result)){
      $album_title=$row["album_name"];
      $album_icon=$row["album_pic"];
      $album_id=$row["album_id"];

      $output.='
      <li>
      <a href="../html/Photocollection.php?id='.$album_id.'">
      <img src="../albumicons/'.$album_icon.'" class="img-thumbnail" alt="">
      '.$album_title.'
      </a>
      </li>
      ';
    }
  }else{
    $output="there is no album yet";
  }
}else if($type==2){
  $id=$_GET["id"];
  $output="";
  $query="SELECT * FROM photo_album WHERE created_by_user_id='$id'";
  $result=mysqli_query($connection,$query) or die ("Error in selecting photo albums");
  $count=mysqli_num_rows($result);

  if($count>0){
    while($row=mysqli_fetch_array($result)){
      $album_title=$row["album_name"];
      $album_icon=$row["album_pic"];
      $album_id=$row["album_id"];
      $album_privacy=$row["privacy_id"];

      if($album_privacy!=1){
        $output.='
        <li>
        <a href="../html/Photocollection.php?id='.$album_id.'">
        <img src="../albumicons/'.$album_icon.'" class="img-thumbnail" alt="">
        '.$album_title.'
        </a>
        </li>
        ';
      }
    }
}else{
  $output="Sorry, you can view albums";
}

echo $output;

mysqli_close($connection);
?>
//erd diagram message view// picture// delete contract//
