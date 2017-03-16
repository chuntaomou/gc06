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
    <form class="pull_right" id="blogsearch">
      <input class="typeahead" type=“text” placeholder="search for blog" name="search" onkeydown="searchblog();">
      <div id="output">
      </div>
    </form>
    </div><!-- /input-group -->
    <br>
    <br>
          <div class="list-group">

            <?php

            include "../blog/listBlog.php"; ?>
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

  function searchblog(){
    var searchtext=$("input[name='search']").val();
    
    $.post("../blog/searchblog.php",{searchval:searchtext},function(output){
      $("#output").html(output);
    });
  }
  </script>
</body>
</html>
