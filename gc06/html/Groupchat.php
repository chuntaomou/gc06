<?php
session_start();
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
    $query="SELECT * FROM circle_messages";
    $result=mysqli_query($connection,$query) or die("error in executing query");
    ?>
    <div id="container">
      <header>
        <h1>Chat Room</h1>
      </header>

      <div id="messages">
        <?php while($row=mysqli_fetch_array($result)): ?>
          <li class="message">
            <?php echo $row["message_sent_user_id"] ?></strong>
            :<?php echo $row["message_content"] ?>
          </li>
          <?php endwhile; ?>
      </div>

      <div id="inputs">
        <form method="post" action="../php/process.php">
          <input type="text" id="username" name="username" placeholder="Enter Your Name"/>
          <input type="text" id="newmessage" name="message" placeholder="Enter A Message"/>
          <input type="submit" id="show-btn" name="submit" value="Show It"/>
        </form>
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
