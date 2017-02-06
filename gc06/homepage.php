<!DOCTYPE html>
<?php
$friendmayknow=array('Mike','Jason'.'Jack','John','Samantha');
?>
<html lang="en">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script src="js/homepagecontroller.js"></script>
  <title>GC06 - Home</title>
  <link rel="shortcut icon" href="icons/webicon.ico" type="image/x-icon">
  <link href="css/gc06.css" rel="stylesheet" type="text/css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container" style="background: #F8F8FF">
    <?php require 'includes/headbar.php';
    ?>
      <div class="row">
        <a href="userprofile.php" id="user">Hi, username</a>
        <form class="searchform cf" id="quick_search">
          <input type=“text” placeholder="search for people">
          <button type=“submit”>Search</button>
        </form>
      </div>
      <div class="row" style="background-color:#3b5998; padding-top: 20px;">
        <ul>
          <div class="col-sm-4">
            <a href="addtext.php" id="addtext" style="text-decoration:none;">Add Text</a>
          </div>
          <div class="col-sm-4">
            <a href="addphoto.php" id="addphoto" style="text-decoration:none;">Add Photo</a>
          </div>
          <div class="col-sm-4">
            <a href="addblog.php" id="addblog" style="text-decoration:none;">Add Blog</a>
          </div>
        </ul>
      </div>
      <div id="contentframe">
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
            <a href="#" id="like" style="text-decoration:none;"><span><img src="icons/likeicon.png" height="45" width="45">Like</span></a>
            <a href="#" id="comment" style="text-decoration:none;"><span><img src="icons/commenticon.png" height="25" width="20">Comment</span></a>
            <a href="#" id="share" style="text-decoration:none;"><span><img src="icons/shareicon.png" height="25" width="20">Share</span></a>
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
        <div class="col-sm-4" style="background-color: white; height: 900px;">
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
    </div>
  <?php require 'includes/footer.php';
  ?>
</div>
</body>
</html>
