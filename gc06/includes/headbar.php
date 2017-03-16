<?php

$connection=mysqli_connect('localhost','root','root','socialsite_db') or die('Error connecting to MySQL server.'. mysql_error());
$id=$_SESSION["userid"];
$query="SELECT * FROM friends_list WHERE friend_id='$id' and status='pending' ";
$requestlist=array('');

$result=mysqli_query($connection,$query);
$count=mysqli_num_rows($result);
$output=null;
$outputfriend=null;
if($count==0){
  $outputfriend="there is no friend request";
}else{
  while($row=mysqli_fetch_array($result)){
    $requestid=$row["user_id"];
    //get the request user's firstname and lastname
    $query="SELECT * FROM user_detail WHERE user_id='$requestid' ";
    $result2 = mysqli_query($connection,$query);
    $row2 = mysqli_fetch_array($result2);
    $requestfirstname = $row2["first_name"];
    $requestlastname = $row2["last_name"];
    $pic = $row2["profile_pic"];

    $outputfriend.="
    <div class='row' id='$requestid'>
    <div class='col-md-1'>
    <img
    src='../images/{$pic}'
    width='40' height='40'>
    </div>
    <div class='col-md-7' style='padding-left:10px; padding-top:10px'>
    <ul id='id'>
    <a href='../html/UserProfile.php?id=".$requestid."'>
    <strong>".$requestfirstname." ".$requestlastname."</strong>
    </a>
    </ul>
    </div>
    <div class='col-md-2 ' id='friendbutton'>
    <button type='button' id='$requestid' class ='btn btn-success acceptfriend'>accept</button>
    </div>
    <div class='col-md-2 'id='ignorebutton'>
    <button type='button' id='$requestid' class ='btn btn-danger ignorebutton'>Ignore</button>
    </div>
    </div>

    ";
  }
}
mysqli_close ($connection);
?>
<div class="row center-block" style="background-color:#536c9c">

    <a href="newhomepage.php"><img src="../img/logo.jpg" class="img-rounded" alt="Meet"></a>
    <div class="buttons-in-header pull-right">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#friendrequest" >Friend Request</button>
    <button type="button" id="logout" class="btn btn-primary" >Log out</button>
  </div>

<!--    <a href="#" style="color: white; float: right; padding-top: 10px;">Friend Request | </a>  -->

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
        echo $outputfriend;
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
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

$("#close").click(function(){
    window.location ="../php/newhomepage.php";
})


$("#logout").click(function() {

   window.location="../html/Login.php";
});
</script>
