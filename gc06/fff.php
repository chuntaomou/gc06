<div class="col-sm-7 col-sm-offset-1" style="overflow-y: scroll; height:800px;">
  <?php
  $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
  $id=$_SESSION["userid"];

 foreach($friendArray as $friendid) {
  $query="SELECT * FROM photo_detail WHERE posted_by_user_id='$friendid' ORDER BY posted_date DESC";
  $result=mysqli_query($connection,$query) or die("fail to execute query");
  $count=mysqli_num_rows($result);

  if($count>=1){
    while($row=mysqli_fetch_array($result)){
      $photo_id=$row["photo_id"];
      $postid=$row["posted_by_user_id"];
      $photo=$row["photo_url"];
      $text=$row["photo_content"];
      $query2="SELECT * FROM user_detail WHERE user_id='$postid'";
      $result2=mysqli_query($connection,$query2);
      $row2=mysqli_fetch_array($result2);
      $userimage=$row2["profile_pic"];
      $username=$row2["first_name"];
      $photodate=$row["posted_date"];
      $output.= "
      <div id='statuscol'>
      <div class='row' id='u_status' style='padding:3px;'>
        <div class='row' id='u_info'>
        <div class='u_image'>
          <img src='../images/{$userimage}' width='40' height='40'
          >
        </div>
        <div class='u_name'>
          <a href='' style='text-decoration:none; color:#076abf;' >{$username}</a>
        </div>
        <div class='u_time pull-right' style='text-align:center;'>
        {$photodate}
        </div>
        <div class='row'>
         <div class='col-md-12'>
         <div class='u_delete pull-right style='text-align:center;'>
          <a href='../php/deletephoto.php?id={$photo_id}'>
           delete
          </a>
         </div>
         </div>
        </div>

      </div>
      <div id='u_content'>
        <div class='u_textorphoto'>
          <img src='../uploads/{$photo}' style='height:229px;' class='img-thumbnail center-block' alt=''>
          {$text}
        </div>
      </div>
        <div class='u_commentbar btn-group btn-group-justified' style='margin-top:3px;' role='group'>
        <div class='btn-group' role='group'>
          <button type='button' class='btn btn-default' id='Like'>
            <span class='glyphicon glyphicon-heart'aria-hidden=' true'></span>
            Like</button></div>
          <div class='btn-group' role='group'>
          <button type='button' class='btn btn-default commentform' id='$photo_id'>Comment</button></div>
            <div class='btn-group' role='group'>
          <button type='button' class='btn btn-default' id='share'>Share</button></div>
        </div>
        <div id='commentform$photo_id'>
        <form>
        <textarea class='form-control' id='content$photo_id' cols='60' style='height: 55px; margin-top:5px;' placeholder='Add Comments ....'></textarea>
        </form>
        <div class='btn-group btn-group-justified' style='margin-top:3px; margin-bottom:3px;' role='group'>
        <div class='btn-group' role='group'>
        <button class='btn btn-success photocomment' id='$photo_id'>Submit</button></div>
        <div class='btn-group' role='group'>
        <button class='btn btn-danger cancelform' id='$photo_id'>Cancel</button></div>
        </div>
        </div>
      ";
      $querycomment="SELECT * FROM photo_comment WHERE photo_id='$photo_id' ORDER BY comment_date DESC";
      $resultcomment=mysqli_query($connection,$querycomment) or die("asdfasdf");
      $countcomment=mysqli_num_rows($resultcomment);
      if($countcomment>0){
        while($rowcomment=mysqli_fetch_array($resultcomment)){
          $commentID=$rowcomment["comment_id"];
          $commentid=$rowcomment["comment_by_user_id"];
          $query3="SELECT * FROM user_detail WHERE user_id='$commentid'";
          $result3=mysqli_query($connection,$query3);
          $row3=mysqli_fetch_array($result3);
          $commentimage=$row3["profile_pic"];
          $commentcontent=$rowcomment["comment_content"];
          $commentname=$row3["first_name"].$row3["last_name"];
          $commenttime=$rowcomment["comment_date"];
          //find the name who comment on it



          $output.="
          <div id='u_info'>
          <div class='u_image'>
            <img src='../images/{$commentimage}'
            width='50' height='50'>
          </div>
          <div class='u_c_name'>
            <a href='' style='text-decoration:none; color:#076abf;' >{$commentname}</a>
          </div>
          <div class='u_c_comment'>
            {$commentcontent}
          </div>
          <div class='u_c_date'>
            {$commenttime}
          </div>
          <div class='u_c_delete' >
           <a href='../php/deleteComment.php?id={$commentID}'>
            delete
           </a>
          </div>
          </div>
          ";
        }
      }
      $output.="
      </div>
      </div>"
      ;
    }
    echo $output;
  }
}
  mysqli_close($connection);
  ?>
</div>
