<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GC06 - Blogs</title>
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
          <h1 class="page-header">Blogs</h1>
          <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div><!-- /input-group -->
    <br>
    <br>
          <div class="list-group">
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Blog1</h4>
              <p class="list-group-item-text">loushen changde meiwoshuai</p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Blog2</h4>
              <p class="list-group-item-text">loushen changde meiwoshuai</p>
            </a>
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Blog3</h4>
              <p class="list-group-item-text">loushen changde meiwoshuai</p>
            </a>
          </div>
        </div>
        <?php
        include "../includes/friendandgroupcols.php";
        ?>
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
