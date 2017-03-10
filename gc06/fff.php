<?php
$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
$id=$_SESSION["userid"];
$query="SELECT * FROM photo_detail";
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
    echo "
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
        18 hours ago
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
        <button type='button' class='btn btn-default' id='Like'>Like</button></div>
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
      <div id='u_info' class='clearfix'>
      <div class='u_image'>
        <img src='https://iso.500px.com/wp-content/uploads/2016/02/stock-photo-141092249-1500x1000.jpg'
        width='50' height='50' style='vertical-align:inherit;'>
      </div>
      <div id='u_commentlist'>
      <div id='comment1'>
      <div class='u_c_name '>
        <a href='' style='text-decoration:none; color:#076abf;' ><b>Emma</b></a>
      </div>
      <div class='u_c_comment'>
        first comment belongs to myself
      </div>
      </div>
      <div class='u_c_date'>
        17 hours ago
      </div>
      <div class='u_response'>
        <a href='#' style='text-decoration:none;'><span>Like</span></a>
        <a href='#' style='text-decoration:none;'><span>Reply</span></a>
      </div>
      </div>
    </div>
    </div>
    </div>
    ";
  }
}
mysqli_close($connection);

?>
