
<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
?>

<!---  php for uploading photots the uploaded photos are stored in ../images/  ---->



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GC06 - profile</title>
  <link rel="shortcut icon" href="../Icons/webicon.ico" type="image/x-icon">

  <!-- Bootstrap core CSS -->
   <link href="../css/bootstrap.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="../css/font-awesome.css" rel="stylesheet">
   <link href="../css/style.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
   <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   <?php require "../includes/checklogin.php";
   ?>



</head>

  <body>

    <?php require "../includes/checklogin.php";
    ?>

    <?php require "../includes/headerforotherpages.php";
    ?>



    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="profile">
              <h1 class="page-header" id="username"><?php include_once "../php/userProfile.php"; ?></h1>
              <div class="row">
                <div class="col-md-4">
                  <!-- show user image  -->
                  <?php
                  $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
                  $id=$_GET['id'];
                  $query="SELECT * FROM user_detail WHERE user_id='$id'";
                  $result=mysqli_query($connection,$query) or die("fail to execute query");
                  $row=mysqli_fetch_array($result);


                  if($row["profile_pic"]==NULL){

                    echo "<img src='../img/user.png' style='height:229px;' class='img-thumbnail' alt=''>";
                  }else{
                    echo "<img src='../images/".$row["profile_pic"]."' style='height:229px;' class='img-thumbnail' alt=''>";
                  }
                  mysqli_close($connection);
                  ?>
                <!--  <img src="../img/user.png" class="img-thumbnail" alt=""> -->
                  <form method="post" action="../php/upload.php" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div>
                      <input type="file" name="image">
                    </div>
                    <div>
                      <input type="submit" name="upload" value="Upload user image">
                    </div>
                  </form>
                </div>
              <?php

               include "../php/getUserDetail.php";


                ?>
              </div><br><br>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Profile Wall</h3>
                    </div>
                    <div class="panel-body">
                      <form>
                        <div class="form-group">
                          <textarea class="form-control" placeholder="Write on the wall"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                        <div class="pull-right">
                          <div class="btn-toolbar">
                            <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i>Text</button>
                            <button type="button" class="btn btn-default"><i class="fa fa-file-image-o"></i>Image</button>
                            <button type="button" class="btn btn-default"><i class="fa fa-file-video-o"></i>Video</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<<<<<<< HEAD
=======
          <div class="col-md-4">
            <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">My Friends</h3>
              </div>
              <div class="panel-body">
                <ul style="padding:0px;">
                  <?php
                  include "../php/mysql_connect.php";
                  ini_set('display_error', '1');
                  error_reporting(E_ALL);
                  $userid = $_SESSION["userid"];
                  $query = "SELECT user_id,friend_id FROM friends_list WHERE user_id ='$userid' or friend_id = '$userid' and status='friend' ";
                  $result = mysqli_query($connection, $query) or die( 'Error occur selecting friends'.mysqli_error());
                  $friendidArray = array();

                  if (mysqli_num_rows($result)!= 0){
                    while ($row=mysqli_fetch_array($result)){
                     if ($row["user_id"]==$userid)  $friendidArray[]=$row["friend_id"];
                        else $friendidArray[]=$row["user_id"];

                       }
                    foreach ($friendidArray as $friendid){
                        $query = "SELECT * from user_detail where user_id='$friendid' ";
                        $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
                        $row = mysqli_fetch_array($result);
                        $id = $row["user_id"];
                        $name = $row["first_name"].$row["last_name"];
                        if($row["profile_pic"]==NULL){
                          $icon='../img/user.png';
                        }  else
                        {
                          $icon="../images/{$row['profile_pic']}";
                        }
                       echo
                        ('
                          <li>
                            <a href="../html/UserProfile.php?id='.$id.'" class ="thumbail">
                              <img src= '.$icon.' alt ="usericon" style="width: 40px; height: 40px">
                              '.$name.'
                            </a>
                          </li>
                      ');
                     }
                  }

                  mysqli_close($connection);
                   ?>

                </ul>
                <div class="clearfix"></div>
                <div class="row text-center">
                <a class="btn btn-primary" href="../html/Friends.php" style="margin-top: 10px;">View All Friends</a>
              </div>
              </div>
            </div>
            <div class="panel panel-default groups">
              <div class="panel-heading">
                <h3 class="panel-title">Latest Groups</h3>
              </div>
              <div class="panel-body">
                <?php
                include "../php/mysql_connect.php";
                ini_set('display_error', '1');
                ini_set('error_reporting', E_ALL);

                $userid=$_SESSION["userid"];
                $output="";
                $query = "SELECT * FROM circle_detail WHERE circle_admin_user_id ='$userid' ";
                $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());

                while($row=mysqli_fetch_array($result)){
                  $circleName= $row["circle_name"];
                  $circleid=$row["circle_id"];
                  $output.='
                  <div class="group-item">
                  <a href="../html/Circlechat.php?id='.$circleid.'" target ="_blank">
                  <img src="../img/group.png" class="img-thumbnail">
                  </a>
                    <p>The name of this group is '.$circleName.'.</p>
                  </div>
                  <div class="clearfix"></div>
                  ';
                }

                $querymember="SELECT * FROM circle_members WHERE member_user_id='$userid'";
                $resultmember=mysqli_query($connection,$querymember) or die ("error in selecting member in circle");
                $countmember=mysqli_num_rows($resultmember);

                if($countmember>0){
                  while($rowmember=mysqli_fetch_array($resultmember)){
                    $circle_member_id=$rowmember["circle_id"];
                    $queryfindname="SELECT * FROM circle_detail WHERE circle_id='$circle_member_id'";
                    $resultfindname=mysqli_query($connection,$queryfindname) or die("error in finding name member");
                    $row_member_name=mysqli_fetch_array($resultfindname);
                    $circle_member_name=$row_member_name["circle_name"];
                    $output.='
                    <div class="group-item">
                    <a href="../html/Circlechat.php?id='.$circle_member_id.'" target ="_blank">
                    <img src="../img/group.png" class="img-thumbnail">
                    </a>
                      <p>The name of this group is '.$circle_member_name.'.</p>
                    </div>
                    <div class="clearfix"></div>
                    ';
                  }
                }

                mysqli_close($connection);
                echo $output;
                ?>
                <div class="clearfix"></div>
                <a href="../html/Groups.php" class="btn btn-primary">View All Groups</a>
              </div>
            </div>
          </div>

          <?php
          include "../includes/friendandgroupcols.php";
          ?>
>>>>>>> b5ef82104fdf0fb9443e6dca4b00ce9f2a58281d

        </div>
      </div>
    </section>

    <script>
  $(document).ready(function(){

    $("#save").click(function(){
      var firstname = $("#firstname").val();
      var lastname = $("#lastname").val();
      var gender = $("#gender").val();
      var city = $("city").val();
      var workplace = $("workplace").val();
      var phonenumber = $("phonenumber").val();
      $.post("../php/updateProfile.php"),{firstname, lastname, gender, city, workplace, phonenumber},
       function(data){
         alert(data);
       }
    })

    $('#edit').click(function(){
      $('#profile').html(
       'hello'
     );
    })
  })
    </script>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  </body>
</html>
