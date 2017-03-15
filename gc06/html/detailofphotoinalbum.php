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
              <div>
                <?php
                $photo_id=$_GET["id"];
                $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
                $query="SELECT * FROM photo_detail WHERE photo_id='$photo_id'";
                $result=mysqli_query($connection,$query) or die ("error in selecting ablum info");
                $row=mysqli_fetch_array($result);
                $image=$row["photo_url"];
                echo "
                <img src='../album/".$image."' >
                ";
                mysqli_close($connection);
                ?>
              </div>

              <div>
                <?php
                $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
                $query="SELECT * FROM photo_comment WHERE photo_id='$photo_id'";
                $result=mysqli_query($connection,$query);
                ?>
                <?php while($row=mysqli_fetch_array($result)): ?>
                  <li>
                    <?php
                    $senderid=$row["comment_by_user_id"];
                    $querysenderinfo="SELECT * FROM user_detail WHERE user_id='$senderid'";
                    $resultsenderinfo=mysqli_query($connection,$querysenderinfo);
                    $rowsenderinfo=mysqli_fetch_array($resultsenderinfo);
                    $senderimage=$rowsenderinfo["profile_pic"];
                    $outputsenderimage='
                    <img src="../images/'.$senderimage.'" class="img-thumbnail" alt="" style="width: 40px; height: 40px;">
                    ';
                    $outputsenderimage='
                    <img src="../images/'.$senderimage.'" class="img-thumbnail" alt="" style="width: 40px; height: 40px;">
                    ';
                    echo $outputsenderimage;
                    ?><?php echo $rowsenderinfo["first_name"]; ?></strong>
                    :<?php echo $row["comment_content"] ?>
                  </li>
                  <?php endwhile; ?>
            </div>
          </div>

          <div class="col-md-12">
            <h3>Comments</h3>
          </div>

          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">Adding comments</h4>
              </div>
              <div class="panel-body">
                <?php
                echo '
                <form method="post" action="../php/commentforphotoinalbum.php?id='.$_GET["id"].'" enctype="multipart/form-data">
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
  </body>
</html>
