<!DOCTYPE html>
<?php
$friendmayknow=array('Mike','Jason'.'Jack','John','Samantha');
$_SESSION["name"]="Tom";
echo "Session variables are set."
?>
<html lang="en">
<head>
  <title>GC06 - Home</title>
  <link rel="shortcut icon" href="../Icons/webicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <link href="../css/homepage-css.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="container" style="background: #F8F8FF">
    <?php require '../includes/headbar.php';
    ?>
    <div class="row">
      <div class="col-sum-12">
        <a href="userprofile.php" style="text-decoration: underline; font-size: 40px;">Hi, username</a>
        <form style="float: right; padding-top: 20px; padding-bottom: 20px;">
          <input type=“text” placeholder="search for people">
          <button type=“submit”>Search</button>
        </form>
      </div>
    </div>
    <div class="row" style="background-color:#3b5998;">
      <ul>
        <div class="col-sm-4">
          <a href="addtext.php" style="text-decoration:none; color: white; font-size: 25px; padding-left: 175px; text-center">Add Text</a>
        </div>
        <div class="col-sm-4">
          <a href="addphoto.php" style="text-decoration:none; color: white; font-size: 25px; padding-left: 175px; text-center">Add Photo</a>
        </div>
        <div class="col-sm-4">
          <a href="addblog.php" style="text-decoration:none; color: white; font-size: 25px; padding-left: 175px; text-center">Add Blog</a>
        </div>
      </ul>
    </div>
    <div class="row">
      <div class="col-sm-4" style="background-color: white; height: 1000px; margin-left: 40px; margin-top: 15px; margin-botton: 15px;">
        <div id="friendmayknowcol">
          <?php
          foreach($friendmayknow as $friend){
            echo "
            <div>

            <img
            src='http://image.shutterstock.com/display_pic_with_logo/639289/639289,1316701142,11/stock-vector-graphic-illustration-of-man-in-business-suit-as-user-icon-avatar-85147087.jpg'
            width='40' height='40'>
            <div id='friendbutton'>
            <button id='fri'>Add Friend</button>
            </div>
            <div id='ignorebutton'>
            <button id='ign'>Ignore</button>
            </div>
            <div id='name'>
              $friend
            </div>
            </div>
            ";
          }
          ?>
        </div>
      </div>
      <div class="col-sm-7" style="background-color: white; height: 1000px; float: right; margin-right: 40px; margin-top: 15px; margin-botton: 15px;">
        <div id="statuscol">
          <div id="u_info">
          <div class="u_image">
            <img src="https://iso.500px.com/wp-content/uploads/2016/02/stock-photo-141092249-1500x1000.jpg"
            width="80" height="60">
          </div>
          <div class="u_name">
            <a href="" style="text-decoration:none; color:#076abf;" >Emma</a>
          </div>
          <div class="u_time">
            18 hours ago
          </div>
        </div>
        <div id="u_content">
          <div class="u_textorphoto">
            it snows outside!<br>
            it's so beautiful!
          </div>
        </div>
          <div class="u_commentbar">
            <a href="#" id="like" style="text-decoration:none;"><span><img src="../Icons/likeicon.png" height="45" width="45">Like</span></a>
            <a href="#" id="comment" style="text-decoration:none;"><span><img src="../Icons/commenticon.png" height="25" width="20">Comment</span></a>
            <a href="#" id="share" style="text-decoration:none;"><span><img src="../Icons/shareicon.png" height="25" width="20">Share</span></a>
          </div>
          <div id="u_info">
          <div class="u_image">
            <img src="https://iso.500px.com/wp-content/uploads/2016/02/stock-photo-141092249-1500x1000.jpg"
            width="50" height="50">
          </div>
          <div class="u_c_name">
            <a href="" style="text-decoration:none; color:#076abf;" >Emma</a>
          </div>
          <div class="u_c_comment">
            first comment belongs to myself
          </div>
          <div class="u_c_date">
            17 hours ago
          </div>
          <div class="u_response">
            <a href="#" style="text-decoration:none;"><span>Like</span></a>
            <a href="#" style="text-decoration:none;"><span>Reply</span></a>
          </div>
        </div>
        </div>
      </div>
    </div>

  <?php require '../includes/footer.php';
  ?>
  </div>
</body>
</html>
