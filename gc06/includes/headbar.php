<?php

$connection=mysqli_connect('localhost','root','root','socialsite_db') or die('Error connecting to MySQL server.'. mysql_error());
$id=$_SESSION["userid"];
$query="SELECT * FROM friends_list WHERE friend_id='$id' and status='pending' ";
$requestlist=array('');

$result=mysqli_query($connection,$query);
$count=mysqli_num_rows($result);
$output=null;
if($count==0){
  $output="there is no friend request";
}else{
  while($row=mysqli_fetch_array($result)){
    $requestid=$row["user_id"];
    //get the request user's firstname and lastname
    $query="SELECT * FROM user_detail WHERE user_id='$requestid' ";
    $result2 = mysqli_query($connection,$query);
    $row2 = mysqli_fetch_array($result2);
    $requestfirstname = $row2["first_name"];
    $requestlastname = $row2["last_name"];

    $output.="<div id='$requestid'>
    <img
    src='http://image.shutterstock.com/display_pic_with_logo/639289/639289,1316701142,11/stock-vector-graphic-illustration-of-man-in-business-suit-as-user-icon-avatar-85147087.jpg'
    width='40' height='40'>
    <div id='friendbutton'>
    <button id='$requestid' class ='acceptfriend'>accept</button>
    </div>
    <div id='ignorebutton'>
    <button id='$requestid' class ='ignorebutton'>Ignore</button>
    </div>
    <div id='id'>".$requestfirstname." ".$requestlastname."</div></div>";
  }
}
mysqli_close ($connection);
?>
<div class="row">
  <div class="col-sm-12" style="background-color:#3b5998;">
    <a href="homepage.php"><img src="../Icons/logo.png" class="img-rounded" alt="Meet" height="40" width="35"></a>
    <a href="#" style="color: white; float: right; padding-top: 10px;">My Account</a>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#friendrequest" style="float: right;">Friend Request</button>
    <button type="button" id="logout" class="btn btn-primary" style="float: right">Log out</button>

<!--    <a href="#" style="color: white; float: right; padding-top: 10px;">Friend Request | </a>  -->
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="friendrequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Friend Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        echo $output;
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script>
$(".acceptfriend").click(function(){
  var friendid = this.id;
  var elem = document.getElementById(this.id);
  elem.parentElement.removeChild(elem);
         //post the friend request data to the database
           $.post("../php/acceptfriend.php",{friendid},
             function(data){
            alert(data);
          })
})


$("#logout").click(function() {

   window.location="../html/Login.php";
});
</script>
