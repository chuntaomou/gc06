<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GC06 - groups</title>
  <link rel="shortcut icon" href="../Icons/webicon.ico" type="image/x-icon">

  <!-- Bootstrap core CSS -->
   <link href="../css/bootstrap.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="../css/style.css" rel="stylesheet">
   <link href="../css/font-awesome.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

   <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>


  <body>
    <?php require "../includes/checklogin.php";
    ?>

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
          <li><a href="Friends.php">Friends</a></li>
          <li><a href="Groups.php">Groups</a></li>
          <li><a href="Photos.php">Photos</a></li>
          <li><a href="UserProfile1.php">Profile</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h1 class="page-header">Groups</h1>
             <?php include "../php/getGroups.php"; ?>
             <ul class="photos gallery-parent">
               <li><a href="../img/sample1.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/group.png" class="img-thumbnail" alt=""></a></li>
               <li><a href="../img/sample2.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/group.png" class="img-thumbnail" alt=""></a></li>
               <li><a href="../img/sample3.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/group.png" class="img-thumbnail" alt=""></a></li>
               <li><a href="../img/sample4.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/group.png" class="img-thumbnail" alt=""></a></li>
               <li><a href="../img/sample5.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/group.png" class="img-thumbnail" alt=""></a></li>
               <li><a href="../img/sample6.jpg" data-hover="tooltip" data-placement="top" title="image" data-gallery="mygallery" data-parent=".gallery-parent" data-title="title" data-footer="this is a footer" data-toggle="lightbox"><img src="../img/group.png" class="img-thumbnail" alt=""></a></li>

             </ul>
          </div>


          <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="modal">Open Modal</button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Choose your group member</h4>
              </div>
              <div class="modal-body">
                <div class="container">
                  <form>
                    <div class="row">
                    <div class="col-md-4">
                    <div class="form-group"
                      <label for="title" class="control-label">Circle name:</label>
                      <input type="text" class="form-control" id="title">
                    </div>
                    </div>
                  </div>
                </form>
                 <div class="row">
                  <div class="col-md-4">
                   <div class="panel panel-default">
                     <div class="panel-body">
                      Group member:
                      <h4 id="list"> </h4>
                     </div>
                   </div>
                  </div>
                </div>
                   <?php include "../php/listFriendsName.php" ?>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="create"> Create </button>
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
    <script>
    var array=[];
      $(".btn1").on("click", function(){

         var userid= this.id;
         array.push(userid);
         $.post("../php/getfriendDetail.php",{userid},function(data){
           $("#list").append(data+"<br></br>");
         })

      })
      $("#modal").on("click",function(){
        var array=[];
        $("#list").text("");
      })

      $("#create").on("click",function(){
         var title = $("#title").val();
         $.post("../php/createCircle.php",{title},function(data){
           var circleid = parseInt(data);
           alert(circleid);

           $.each(array, function(i, val){
             var value = parseInt(val);
             $.post("../php/memberCircle.php",{circleid,value},function(data1){
             })

           })
         })



      })

    </script>
  </body>
</html>
