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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="js/ekko-lightbox.js"></script>
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
            <div class="container">
              <div class="dropdown">
                <?php
                $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
                $album_id=$_GET["id"];
                $query="SELECT * FROM photo_album WHERE album_id='$album_id'";
                $result=mysqli_query($connection,$query) or die ("error in selecting ablum info");
                $row=mysqli_fetch_array($result);
                $privacy_id=$row["privacy_id"];
                if($privacy_id==0){
                  echo '<button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">show only to me
                  </button>';
                }else if($privacy_id==1){
                  echo '<button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">friends can see
                  </button>';
                }else{
                  echo '<button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">friends of friends also can see
                  </button>';
                }
                ?>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" id="menu2">
                  <li role="presentation"><a role="menuitem" tabindex="-1" id="a">show only to me</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" id="b">friends can see</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" id="c">friends of friends also can see</a></li>
                </ul>
              </div>
            </div>
            <ul class="photos gallery-parent">
              <?php
              $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
              $output="";
              $album_id=$_GET["id"];
              $query="SELECT * FROM photo_detail WHERE album_id='$album_id' ORDER BY posted_date DESC";
              $result=mysqli_query($connection,$query) or die ("fail to select photos in this album");
              $count=mysqli_num_rows($result);

              if($count>0){
                while($row=mysqli_fetch_array($result)){
                  $image=$row["photo_url"];
                  $output.='
                  <li>
                  <img src="../album/'.$image.'" class="img-thumbnail" alt="" id="photo" style="width: 200px; height: 200px">
                  </li>
                  ';
                }
              }else{
                echo "There is no photo yet, add some!";
              }

              echo $output;

              mysqli_close($connection);
              ?>
            </ul>
          </div>

          <!-- Modal -->
          <div id="photoModal" class="modal fade" role="dialog">
            <div class="modal-dialog">


          <div class="col-md-12">
            <h3>Add a new album</h3>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Adding a new photo</h4>
              </div>
              <div class="panel-body">
                <?php
                echo '
                <form method="post" action="../php/addphototoalbum.php?id='.$_GET["id"].'" enctype="multipart/form-data">
                  <input type="file" name="image" value="Add from system" class="btn btn-default">
                  <!--<button class="btn btn-default" type="file">Add from system</button>-->
                  <div class="form-group">
                    <textarea class="form-control" name="text" cols="60" style="height: 100px;" placeholder="Add a title for your photo album"></textarea>
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
                ';
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script>
      $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
      });
      $(function () {
      $('[data-hover="tooltip"]').tooltip()
      })

      $("#menu2 li a").click(function(){
      $("#menu1").text($(this).text());
      var privacy=$(this).text();
      <?php
      echo "

      ";
      ?>
      });
    </script>
  </body>
</html>
