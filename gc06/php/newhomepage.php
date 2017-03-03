<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
?>
<!DOCTYPE html>
<?php
$friendmayknowfirst_name=array('');
$friendmayknowid=array('');
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

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <!-- To check if user log in -->
  <?php require "../includes/checklogin.php";?>


  <!-- javascript for searchq() -->
  <script type="text/javascript">
  function searchq(){
    var searchTxt=$("input[name='search']").val();
    $.post("../php/search.php",{searchVal:searchTxt},function(output){
      $("#output").html(output);
    });
  }
  </script>

</head>

<body>
  <div class="container" style="background: #F8F8FF">
    <!-- header -->
    <?php require '../includes/headbar.php';
    ?>

    <div class="row">
      <div class="col-12" id="thebasic">

        <a href="../html/userProfile.php">Hi, <?php echo $_SESSION["firstname"]; echo "&nbsp"; echo $_SESSION["lastname"]; ?></a>
        <form class="pull-right" action="" method="post">
          <input class="typeahead" type=“text” placeholder="search for people" name="search" onkeydown="searchq();">
      <!--    <button type=“submit”>Search</button> -->
        </form>
      </div>
    </div>

      <div class="pull-right" id="output" >
      </div>
    <nav class="nav navbar-default">
      <div class="navbar-header">
        <button type="button" class="pull-left navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
    <div class="navbar-collapse collapse" >
      <ul class="nav nav-tabs nav-justified">
        <li>
          <a href="../html/addtext.php" style="text-center">Add Text</a>
        </li>
        <li>
          <a href="../html/addphoto.php" style="text-center">Add Photo</a>
        </li>
        <li>
          <a href="../html/addblog.php" style="text-center">Add Blog</a>
        </li>
      </ul>
    </div>
  </nav>
    <div class="row">
      <div class="col-md-4" style="background-color: white;">
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
            <div id='$friendid'>

            <img
            src='http://image.shutterstock.com/display_pic_with_logo/639289/639289,1316701142,11/stock-vector-graphic-illustration-of-man-in-business-suit-as-user-icon-avatar-85147087.jpg'
            width='40' height='40'>
            <div id='friendbutton'>
            <button id='$friendid' class ='addfriend'>Add Friend</button>
            </div>
            <div id='ignorebutton'>
            <button id='$friendid' class ='ignorebutton'>Ignore</button>
            </div>
            <div id='name'>
              $friendmayknowfirst_name[$count]
            </div>
            </div>
            ";
            $count=$count+1;
          }
          ?>
        </div>
      </div>

      <div class="col-sm-7" style="background-color: white; height: 1000px; float: right; margin-right: 40px; margin-top: 15px; margin-botton: 15px;">
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
              <div id='u_info'>
              <div class='u_image'>
                <img src='../images/{$userimage}'
                width='80' height='60'>
              </div>
              <div class='u_name'>
                <a href='' style='text-decoration:none; color:#076abf;' >{$username}</a>
              </div>
              <div class='u_time'>
                18 hours ago
              </div>
            </div>
            <div id='u_content'>
              <div class='u_textorphoto'>
                <img src='../uploads/{$photo}' style='height:229px;' class='img-thumbnail' alt=''>
                {$text}
              </div>
            </div>
              <div class='u_commentbar'>
                <button class='btn btn-default' id='Like'>Like</button>
                <button class='btn btn-default commentform' id='$photo_id'>Comment</button>
                <button class='btn btn-default' id='share'>Share</button>
              </div>
              <div id='commentform$photo_id'>
              <form>
              <textarea class='form-control' id='content$photo_id' cols='60' style='height: 55px;' placeholder='Add Comments ....'></textarea>
              </form>
              <button class='btn btn-default photocomment' id='$photo_id'>Submit</button>
              <button class='btn btn-default cancelform' id='$photo_id'>Cancel</button>
              </div>
              <div id='u_info'>
              <div class='u_image'>
                <img src='https://iso.500px.com/wp-content/uploads/2016/02/stock-photo-141092249-1500x1000.jpg'
                width='50' height='50'>
              </div>
              <div class='u_c_name'>
                <a href='' style='text-decoration:none; color:#076abf;' >Emma</a>
              </div>
              <div class='u_c_comment'>
                first comment belongs to myself
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
            ";
          }
        }
        mysqli_close($connection);

        ?>
      </div>
    </div>

  <script>
   $(".addfriend").click(function() {
    var friendid = this.id;
    alert(this.id); // or alert($(this).attr('id'));
    var elem = document.getElementById(this.id);
    elem.parentElement.removeChild(elem);
           //post the friend request data to the database
             $.post("../php/addfriend.php",{friendid},
               function(data){
              alert(data)
            })
   });

  $(".ignorebutton").click(function()  {
    alert(this.id);
    var elem = document.getElementById(this.id);
    elem.parentElement.removeChild(elem);
  });

  $(".commentform").click(function(){
    var id=this.id;
    $("#commentform"+id).show();
  });

  $(".cancelform").click(function(){
    var id=this.id;
    $("#commentform"+id).hide();
  });

  $(".photocomment").click(function(){
    var id=this.id;
    var content=$("#content"+id).val();

    if(content.length>0){
      $.post("../php/photocomment.php",{photoid:id,text:content},function(data){
        //do nothing
      });
      $("#commentform"+id).hide();
    }else{
      alert("no comment input !");
    }

  });
</script>

  <?php require '../includes/footer.php';
  ?>
  </div>
</body>
</html>
