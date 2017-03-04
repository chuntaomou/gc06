
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

   <?php require "../includes/checklogin.php";
   ?>

   <script type="text/javascript">
   $(document).ready(function(){
      //var username;
        $.get("../php/userProfile.php",function(data){
          var username=data;
          $("#username").append(username);   //get username
        });
});
   </script>

</head>

  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../php/newhomepage.php">Home</a></li>
            <li><a href="../html/Friends.php">Friends</a></li>
            <li><a href="../html/Groups.php">Groups</a></li>
            <li><a href="../html/Photos.php">Photos</a></li>
            <li><a href="../html/UserProfile.php">Profile</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="profile">
              <h1 class="page-header" id="username"></h1>
              <div class="row">
                <div class="col-md-4">
                  <!-- show user image  -->
                  <?php
                  $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
                  $id=$_SESSION["userid"];
                  $query="SELECT * FROM user_detail WHERE user_id='$id'";
                  $result=mysqli_query($connection,$query) or die("fail to execute query");
                  $row=mysqli_fetch_array($result);

                  echo $id;
                  echo $row["profile_pic"];

                  if($row["profile_pic"]==NULL){
                    echo "sdaf";
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
              $test=5;
              if($test==0){
                echo "
                  <div class='col-md-8'>
                    <ul>
                      <li><strong>Name:</strong>Lou Lou</li>
                      <li><strong>Email:</strong>loushen@gmail.com</li>
                      <li><strong>City:</strong>London</li>
                      <li><strong>University:</strong>UCL</li>
                      <li><strong>Number:</strong>0734767637</li>
                      <li><strong>DOB:</strong>September 16th</li>
                    </ul>
                    <span class='pull-right'>
                      <button type='submit'
                      class='btn btn-sm btn-danger'>Unfriend</button>
                    </span>
                  </div>";
              }else{
                echo "
                  <div class='col-md-8'>
                    <ul>
                      <li><strong>Name:</strong>Lou Lou</li>
                      <li><strong>Email:</strong>loushen@gmail.com</li>
                      <li><strong>City:</strong>London</li>
                      <li><strong>University:</strong>UCL</li>
                      <li><strong>Number:</strong>0734767637</li>
                      <li><strong>DOB:</strong>September 16th</li>
                    </ul>
                    <span class='pull-right'>
                      <button type='submit'
                      class='btn btn-sm btn-success'>friend</button>
                    </span>
                  </div>";
              }
              /*
              echo "
                <div class='col-md-8'>
                  <ul>
                    <li><strong>Name:</strong>Lou Lou</li>
                    <li><strong>Email:</strong>loushen@gmail.com</li>
                    <li><strong>City:</strong>London</li>
                    <li><strong>University:</strong>UCL</li>
                    <li><strong>Number:</strong>0734767637</li>
                    <li><strong>DOB:</strong>September 16th</li>
                  </ul>
                  <span class='pull-right'>
                    <button type='submit'
                    class='btn btn-sm btn-info'>Unfriend</button>
                  </span>
                </div>";
                */
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
          <div class="col-md-4">
            <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">My Friends</h3>
              </div>
              <div class="panel-body">
                <ul>
                  <li><a href="profile.html" class="thumbnail"><img src="../img/user.png" alt=""></a></li>
                  <li><a href="profile.html" class="thumbnail"><img src="../img/user.png" alt=""></a></li>
                  <li><a href="profile.html" class="thumbnail"><img src="../img/user.png" alt=""></a></li>
                  <li><a href="profile.html" class="thumbnail"><img src="../img/user.png" alt=""></a></li>
                  <li><a href="profile.html" class="thumbnail"><img src="../img/user.png" alt=""></a></li>
                  <li><a href="profile.html" class="thumbnail"><img src="../img/user.png" alt=""></a></li>
                  <li><a href="profile.html" class="thumbnail"><img src="../img/user.png" alt=""></a></li>
                  <li><a href="profile.html" class="thumbnail"><img src="../img/user.png" alt=""></a></li>
                  <li><a href="profile.html" class="thumbnail"><img src="../img/user.png" alt=""></a></li>
                </ul>
                <div class="clearfix"></div>
                <a class="btn btn-primary" href="#">View All Friends</a>
              </div>
            </div>
            <div class="panel panel-default groups">
              <div class="panel-heading">
                <h3 class="panel-title">Latest Groups</h3>
              </div>
              <div class="panel-body">
                <div class="group-item">
                  <img src="../img/group.png" alt="">
                  <h4><a href="#" class="">Sample Group One</a></h4>
                  <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                </div>
                <div class="clearfix"></div>
                <div class="group-item">
                  <img src="../img/group.png" alt="">
                  <h4><a href="#" class="">Sample Group Two</a></h4>
                  <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                </div>
                <div class="clearfix"></div>
                <div class="group-item">
                  <img src="../img/group.png" alt="">
                  <h4><a href="#" class="">Sample Group Three</a></h4>
                  <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                </div>
                <div class="clearfix"></div>
                <a href="#" class="btn btn-primary">View All Groups</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
