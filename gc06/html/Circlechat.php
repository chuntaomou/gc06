<?php
session_start();
$_SESSION["circleid"]=$_GET["id"];
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GC06 - groupchat</title>
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
    <?php
    $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
    $circleid=$_SESSION["circleid"];
    $query="SELECT * FROM circle_messages WHERE circle_id='$circleid'";
    $result=mysqli_query($connection,$query) or die("error in executing query");
    ?>

    <div id="container">
      <header>
        <h1>Chat Room</h1>
      </header>

      <div class="row center-block text-center">
      <div id="members">
        <ul class="photos gallery-parent nav nav-tabs nav-justified">
          <?php
          $circleid=$_GET["id"];
          $queryselectmembers="SELECT * FROM circle_members WHERE circle_id='$circleid'";
          $resultselectmembers=mysqli_query($connection,$queryselectmembers) or die("error in executing query--select members");
          $membercount=mysqli_num_rows($resultselectmembers);
          if($membercount>0){
            while($rowselectmembers=mysqli_fetch_array($resultselectmembers)){
              $memberid=$rowselectmembers["member_user_id"];
              $querymemberinfo="SELECT * FROM user_detail WHERE user_id='$memberid'";
              $resultmemberinfo=mysqli_query($connection,$querymemberinfo) or die ("error in finding member info");
              $rowmemberinfo=mysqli_fetch_array($resultmemberinfo);
              $image=$rowmemberinfo["profile_pic"];
              $name=$rowmemberinfo["first_name"];
              $output.='
              <li>
              <a href="">
              <img src="../images/'.$image.'" class="img-thumbnail" alt="">
              </a>
              '.$name.'
              </li>
              ';
            }
          }
          $queryselectadmin="SELECT * FROM circle_detail WHERE circle_id='$circleid'";
          $resultadmin=mysqli_query($connection,$queryselectadmin);
          $rowadmin=mysqli_fetch_array($resultadmin);
          $hostid=$rowadmin["circle_admin_user_id"];
          $queryadmininfo="SELECT * FROM user_detail WHERE user_id='$hostid'";
          $resultadmininfo=mysqli_query($connection,$queryadmininfo) or die("error in find admin info");
          $rowadmininfo=mysqli_fetch_array($resultadmininfo);
          $adminimage=$rowadmininfo["profile_pic"];
          $adminname=$rowadmininfo["first_name"];
          $output.='
          <li>
          <a href="">
          <img src="../images/'.$adminimage.'" class="img-thumbnail" alt="">
          </a>
          '.$adminname.'
          </li>
          ';
          echo $output;
          ?>
        </ul>
      </div>
    </div>

   <div class="row">
      <div id="messages">
        <?php while($row=mysqli_fetch_array($result)): ?>
          <li class="message">
            <?php
            $senderid=$row["message_sent_user_id"];
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
            :<?php echo $row["message_content"] ?>
          </li>
          <?php endwhile; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Chat input</h3>
          </div>
          <div class="panel-body">
            <form method="post" action="../php/process.php">
              <div class="form-group">
                <textarea class="form-control" name= "message" placeholder="Write here"></textarea>
              </div>
              <button type="submit" name="submit" class="btn btn-default pull-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

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
<?php
mysqli_close($connection);
?>
