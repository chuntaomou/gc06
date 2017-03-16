
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
                <?php
                include "../includes/friendandgroupcols.php";
                ?>
              </div>

              <div class="row">
                <div class="col-md-8">
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
