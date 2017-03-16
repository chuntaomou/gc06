<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GC06 - friends</title>
  <link rel="shortcut icon" href="../Icons/webicon.ico" type="image/x-icon">

  <!-- Bootstrap core CSS -->
   <link href="../css/bootstrap.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="../css/style.css" rel="stylesheet">
   <link href="../css/font-awesome.css" rel="stylesheet">
</head>


  <body>
    <?php require "../includes/checklogin.php";
    ?>


    <?php require "../includes/headerforotherpages.php";
    ?>



    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h1 class="page-header">Friends</h1>
            <ul class="photos gallery-parent">
              <div class="row">
               <?php
                include "../php/listAllFriends.php";

               ?>
             </div>


            <!--  <li><a href="../img/sample1.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/user.png" class="img-thumbnail" alt=""></a></li>
              <li><a href="../img/sample2.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/user.png" class="img-thumbnail" alt=""></a></li>
              <li><a href="../img/sample3.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/user.png" class="img-thumbnail" alt=""></a></li>
              <li><a href="../img/sample4.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/user.png" class="img-thumbnail" alt=""></a></li>
              <li><a href="../img/sample5.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/user.png" class="img-thumbnail" alt=""></a></li>
              <li><a href="../img/sample6.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/user.png" class="img-thumbnail" alt=""></a></li>
            -->
            </ul>
          </div>

          <?php
          include "../includes/friendandgroupcols.php";
          ?>
          <!--
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
        -->
        </div>
      </div>
    </section>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/ekko-lightbox.js"></script>
    <script>
      $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
      });
      $(function () {
      $('[data-hover="tooltip"]').tooltip()
      })
    </script>
  </body>
</html>
