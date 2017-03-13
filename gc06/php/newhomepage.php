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
  <link href="../css/style.css" rel="stylesheet" type="text/css">


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
  <div class="container" style="background: #F8F8FF; padding:0px;">
    <!-- header -->
    <?php require '../includes/headbar.php';
    ?>

    <div class="row" style="margin:0px;">
      <div class="col-12" id="thebasic">


        <a href="../html/UserProfile.php?id=<?php echo $_SESSION["userid"]; ?>" style="font-size:40px;">Hi, <?php echo $_SESSION["firstname"]; echo "&nbsp"; echo $_SESSION["lastname"]; ?></a>
        <form class="pull-right" action="" method="post" id="searchbox" style="margin-top:20px">


          <input class="typeahead" type=“text” placeholder="search for people" name="search" onkeydown="searchq();">
      <!--    <button type=“submit”>Search</button> -->
      <div id="output" >
      </div>
        </form>
      </div>
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
    <div class="navbar-collapse collapse" style="padding:0px;">
      <ul class="nav nav-tabs nav-justified" style="margin-bottom:20px;">
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
    <div class="row" style="margin:0px;">
      <div class="col-md-4" style="background-color: white; overflow-y: scroll; height:350px;"">
        <div id="friendmayknowcol">
          <?php include "../php/mysql_connect.php";   //friend recommendation
          $userid=$_SESSION["userid"];
          $queryselect="SELECT * FROM friends_list WHERE user_id='$userid' OR friend_id='$userid' AND status='friend'";
          $resultselect=mysqli_query($connection,$queryselect);
          $countselect=mysqli_num_rows($resultselect);

          if($countselect>0){
            while($rowselect=mysqli_fetch_array($resultselect)){
              if($rowselect["user_id"]==$userid){
                $friendid=$rowselect["friend_id"];
              }else{
                $friendid=$rowselect["user_id"];
              }

              $queryrecommend="SELECT * FROM friends_list WHERE user_id='$friendid' OR friend_id='$friendid' AND status='friend'";
              $resultrecommend=mysqli_query($connection,$queryrecommend) or die("error in executing queryrecommend");
              $countrecommend=mysqli_num_rows($resultrecommend);

              if($countrecommend>0){
                while($rowrecommend=mysqli_fetch_array($resultrecommend)){
                  if($rowrecommend["user_id"]==$friendid){
                    if($rowrecommend["friend_id"]!=$userid){
                      $recommendid=$rowrecommend["friend_id"];
                    }
                  }else{
                    if($rowrecommend["user_id"]!=$userid){
                      $recommendid=$rowrecommend["user_id"];
                    }
                  }
                }

                if(isset($recommendid)){
                  $queryinfo="SELECT * FROM user_detail WHERE user_id='$recommendid'";
                  $resultinfo=mysqli_query($connection,$queryinfo);
                  $rowinfo=mysqli_fetch_array($resultinfo);
                  $image=$rowinfo["profile_pic"];
                  $firstname=$rowinfo["first_name"];
                  $lastname=$rowinfo["last_name"];

                  echo "
                  <div class='row' style='margin:10px'>
                  <div id='$recommendid'>
                  <img
                  src='../images/";
                  echo $image;
                  echo "'
                  width='40' height='40'>
                  <div id='name'>
                    $firstname  $lastname
                  </div>

                  <div class='btn-group btn-group-justified' style='margin-top:3px; margin-bottom:3px;' role='group'>
                  <div id='friendbutton'class='btn-group' role='group'>
                  <button type='button' id='$recommendid' class ='btn btn-success btn-block addfriend'>Add Friend</button>
                  </div>

                  <div id='ignorebutton' class='btn-group' role='group'>
                  <button type='button' id='$recommendid' class ='btn btn-danger btn-block ignorebutton'>Ignore</button>
                  </div>
                  </div>
                  </div>
                  </div>
                  ";
                }
              }
            }
          }

          mysqli_close($connection);
          ?>
        </div>
      </div>

      <div class="col-sm-7 col-sm-offset-1" style="overflow-y: scroll; height:800px;">
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
            $querycomment="SELECT * FROM photo_comment WHERE photo_id='$photo_id'";
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
      window.location.href="../php/newhomepage.php";
    }else{
      alert("no comment input !");
    }
  });

  $(".textcomment").click(function(){
    var id=this.id;
    var content=$("#content"+id).val();

    if(content.length>0){
      var id=this.id.replace("text","");
      $.post("../php/textcomment.php",{textid:id,text:content},function(data){
        //do nothing
      });
      $("#commentform"+id).hide();
    }else{
      alert("no comment input !");
    }
  });


</script>

<br>
<br>
  <?php require '../includes/footer.php';
  ?>
  </div>
</body>
</html>
