<?php
//  session_start();
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $myid = $_SESSION["userid"];
  $userid = $_GET['id'];
  $friend =0;  //0 代表不是朋友， 1代表是朋友

  $query = "SELECT * FROM user_detail WHERE user_id ='$userid'";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  $row=mysqli_fetch_array($result);
  $firstname = $row["first_name"];
  $lastname = $row["last_name"];
  $gender = $row["gender"];
  $city = $row["city"];
  $workplace = $row["work_place"];
  $phonenumber= $row["phone_number"];
  $privacy = $row["privacy_id"];

$output = NULL;
$output.='<form action="../php/updateProfile.php" method="post" id="form1">';
$output.='<li><strong>First Name:</strong><input type="text" name="firstname" value='.$firstname.'></li>';
$output.='<li><strong>Name:</strong><input type="text" name="lastname" value='.$lastname.'></li>';
$output.='<li><strong>Gender:</strong><input type="text" name="gender" value='.$gender.'></li>';
$output.='<li><strong>City:</strong><input type="text" name="city" value='.$city.'></li>';
$output.='<li><strong>Work place:</strong><input type="text" name="workplace" value='.$workplace.'></li>';
$output.='<li><strong>Number:</strong><input type="text" name="phonenumber" value='.$phonenumber.'></li>';
$output.='</form>';
$output.='<li><button class="btn btn-default pull-right" type="submit" form="form1"> save</button></li>';
//先判断是否是自己，如果是自己的话 就可以编辑
if ($myid == $userid) {
  echo('
      <div class="btn-group">
      <button type="button" class="btn btn-default">Choose profile privacy</button>
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu">
        <li><a href="../php/setUserPrivacy.php?privacy=0">only friends</a></li>
        <li><a href="../php/setUserPrivacy.php?privacy=1">circle can see</a></li>
        <li><a href="../php/setUserPrivacy.php?privacy=2">all users</a></li>
      </ul>
      </div>'
  );
  echo("<div class='col-md-8' id='profile'>
    <ul>
      <li><strong>First Name:</strong>{$firstname}</li>
      <li><strong>Last Name:</strong>{$lastname}</li>
      <li><strong>Gender:</strong>{$gender}</li>
      <li><strong>City:</strong>{$city}</li>
      <li><strong>Work place:</strong>{$workplace}</li>
      <li><strong>Number:</strong>{$phonenumber}</li>
      <li><strong>DOB:</strong>September 16th</li>
      <li><button class='btn btn-default pull-right' id='edit'> edit</button></li>
    </ul>
  </div>
 <script>
   $('#edit').click(function(){
     $('#profile').html(
      '".$output."'
    );
   })
   $('#cancel').click(function(){
      alert(1);
   })
 </script>


  ");

}


//判断他们是否是朋友
  $query2 ="SELECT * FROM friends_list where user_id='$myid' or friend_id='$myid'";
  $result2 =mysqli_query($connection, $query2) or die('Error making select users query'.mysqli_error());
  $num2 =mysqli_num_rows($result2);
  if ($num2!=0){
   while ($row2=mysqli_fetch_array($result2)){
    // echo $row2["user_id"];
    if (($row2["user_id"]==$userid)||($row2["friend_id"]==$userid))   { $friend=1;}
   }
 }
 //三种情况 ： 一种是自己的profile 一种是好友的profile 一种是陌生人的profile
//先判断是什么profile 然后再判断用户的隐私等级

//如果不是自己的话 ，先判断他们是否为朋友
if ($myid!=$userid) {
  //如果是朋友的话 ，直接就可以看profile
  if($friend==1){
    echo("<div class='col-md-4'>
      <ul>
        <li><strong>First Name:</strong>{$firstname}</li>
        <li><strong>Last Name:</strong>{$lastname}</li>
        <li><strong>Gender:</strong>{$gender}</li>
        <li><strong>City:</strong>{$city}</li>
        <li><strong>Work place:</strong>{$workplace}</li>
        <li><strong>Number:</strong>{$phonenumber}</li>
        <li><strong>DOB:</strong>September 15th</li>
        ");
  }
  //不是朋友 但是 对方的profile可以显示给陌生人的话，就可以看

   else if($privacy==2){

  echo("<div class='col-md-8'>
    <ul>
      <li><strong>First Name:</strong>{$firstname}</li>
      <li><strong>Last Name:</strong>{$lastname}</li>
      <li><strong>Gender:</strong>{$gender}</li>
      <li><strong>City:</strong>{$city}</li>
      <li><strong>Work place:</strong>{$workplace}</li>
      <li><strong>Number:</strong>{$phonenumber}</li>
      <li><strong>DOB:</strong>September 16th</li>
      <li><button type='submit' class='btn btn-default pull-right' id='add'> add friend</button></li>
    </ul>
  </div>
 <script>
   $('#add').click(function(){
     var friendid = {$userid}
     $.post('../php/addfriend.php',{friendid},function(data){
      alert(data)
     });
   })
 </script>

  ");
}
//如果不是朋友 而且设置了对陌生人不可见。 那么就看不见profile
else { echo ("<div class='col-md-8'>
    <ul>
      <li><strong>This user set the profile only visible to friends</strong></li>
      <li><button type='submit' class='btn btn-default pull-right' id='add'> add friend</button></li>
    </ul>
  </div>
 <script>
   $('#add').click(function(){
     var friendid = {$userid}
     $.post('../php/addfriend.php',{friendid},function(data){
      alert(data)
     });
   })
 </script>

  ");
  }
}

mysqli_close($connection);
?>
