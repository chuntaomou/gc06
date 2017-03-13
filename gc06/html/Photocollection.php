<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GC06 - photocollection</title>
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
            <h1 class="page-header">Photo</h1>
            <ul class="photos gallery-parent">
              <?php
              $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
              $output="";
              mysqli_close($connection);
              ?>
            </ul>
          </div>

          <div class="col-md-12">
            <h3>Add a new album</h3>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Adding a new photo</h4>
              </div>
              <div class="panel-body">
                <form method="post" action="../php/addphototoalbum.php?id=$_GET["id"]" enctype="multipart/form-data">
                  <input type="file" name="image" value="Add from system" class="btn btn-default">
                  <!--<button class="btn btn-default" type="file">Add from system</button>-->
                  <div class="form-group">
                    <textarea class="form-control" name="text" cols="60" style="height: 100px;" placeholder="Add a title for your photo album"></textarea>
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
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
