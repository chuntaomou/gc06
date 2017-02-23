<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
?>
<!DOCTYPE html>
<?php
$friendmayknowfirst_name=array('');
$friendmayknowlast_name=array('');
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

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/homepage.js"></script>
  <?php require "../includes/checklogin.php"
  ?>
  <script type="text/javascript">
  function searchq(){
    var searchTxt=$("input[name='search']").val();
    $.post("../php/search.php",{searchVal:searchTxt},function(output){
      $("#output").html(output);
    });
  }
  </script>
  <script>
  $("li"){
    float:right;
  }
  </script>
</head>

<body>
  <div class="container" style="background: #F8F8FF">
    <?php require '../includes/headbar.php';
    ?>
    <div class="row">
      <div class="col-sum-12" id="thebasic">
        <a href="../html/userProfile.html" style="text-decoration: underline; font-size: 40px;">Hi, <?php echo $_SESSION["username"]; ?></a>
        <form style="float: right; padding-top: 20px; padding-bottom: 20px;" action="" method="post">
          <input class="typeahead" type=“text” placeholder="search for people" name="search" onkeydown="searchq();">
      <!--    <button type=“submit”>Search</button> -->
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2" id="output" style="float:right;">
      </div>
    </div>
    <div class="row" style="background-color:#3b5998;">
      <ul>
        <div class="col-sm-4">
          <a href="../html/addtext.php" style="text-decoration:none; color: white; font-size: 25px; padding-left: 175px; text-center">Add Text</a>
        </div>
        <div class="col-sm-4">
          <a href="../html/addphoto.php" style="text-decoration:none; color: white; font-size: 25px; padding-left: 175px; text-center">Add Photo</a>
        </div>
        <div class="col-sm-4">
          <a href="../html/addblog.php" style="text-decoration:none; color: white; font-size: 25px; padding-left: 175px; text-center">Add Blog</a>
        </div>
      </ul>
    </div>
    <div class="row">
      <div class="col-sm-4" style="background-color: white; height: 1000px; margin-left: 40px; margin-top: 15px; margin-botton: 15px;">
        <div id="friendmayknowcol">


          <!-- search friend may know to user in database -->
          <?php include "../php/mysql_connect.php";
          $query="SELECT * FROM user_detail";
          $result=mysqli_query($connection,$query);
          $count=mysqli_num_rows($result);
          if($count==0){
            echo "There is no user you may know....";
          }else{

            while($row=mysqli_fetch_array($result)){
              if($friendmayknowlast_name[0]==null){
                $friendmayknowlast_name[0]=$row["last_name"];
                $friendmayknowfirst_name[0]=$row["first_name"];
              }else{
                $friendmayknowlast_name[]=$row["last_name"];
                $friendmayknowfirst_name[]=$row["first_name"];
              }
            }

          }
          mysqli_close($connection);
          foreach($friendmayknowfirst_name as $friendfirst_name){
            echo "
            <div id='$friendfirst_name'>

            <img
            src='http://image.shutterstock.com/display_pic_with_logo/639289/639289,1316701142,11/stock-vector-graphic-illustration-of-man-in-business-suit-as-user-icon-avatar-85147087.jpg'
            width='40' height='40'>
            <div id='friendbutton'>
            <button id='fri' onclick='add();'>Add Friend</button>
            </div>
            <div id='ignorebutton'>
            <button id='ign' onclick='ignore();'>Ignore</button>
            </div>
            <div id='name'>
              $friendfirst_name
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
