<!-- search friend may know to user in database -->
<?php include "../php/mysql_connect.php";
$query="SELECT * FROM user_detail";
$result=mysqli_query($connection,$query);
$count=mysqli_num_rows($result);
if($count==0){
  echo "There is no user you may know....";
}else{

  while($row=mysqli_fetch_array($result)){
    if($friendmayknowfirst_name[0]==null){
      $friendmayknowid[0]=$row["user_id"];
      $friendmayknowfirst_name[0]=$row["first_name"];
    }else{
      $friendmayknowid[]=$row["user_id"];
      $friendmayknowfirst_name[]=$row["first_name"];
    }
  }

}

mysqli_close($connection);
$count=0;
foreach($friendmayknowid as $friendid){
  echo "
  <div class='row' style='margin:10px'>
  <div id='$friendid'>

  <img
  src='http://image.shutterstock.com/display_pic_with_logo/639289/639289,1316701142,11/stock-vector-graphic-illustration-of-man-in-business-suit-as-user-icon-avatar-85147087.jpg'
  width='40' height='40'>
  <div id='name'>
    $friendmayknowfirst_name[$count]
  </div>
  <div class='btn-group btn-group-justified' style='margin-top:3px; margin-bottom:3px;' role='group'>
  <div id='friendbutton'class='btn-group' role='group'>
  <button type='button' id='$friendid' class ='btn btn-success btn-block addfriend'>Add Friend</button>
  </div>
  <div id='ignorebutton' class='btn-group' role='group'>
  <button type='button' id='$friendid' class ='btn btn-danger btn-block ignorebutton'>Ignore</button>
  </div>
  </div>
  </div>
  </div>
  ";
  $count=$count+1;
}
?>


if($countselect>0){
  while($rowselect=mysqli_fetch_array($resultselect)){
    if($rowselect["user_id"]!=$userid){
      $recommededfriend=$rowselect["user_id"];
      $queryinsert="INSERT INTO friends_recommendations (user_id,recommended_friend) VALUES ('$userid','$recommendedfriend')";
      mysqli_query($connection,$queryinsert);
    }
  }
