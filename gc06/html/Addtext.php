<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GC06 - Add Text</title>
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
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h1 class="page-header">Add Text</h1>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Write something</h3>
                </div>
                <div class="panel-body">
                  <form>
                    <div class="form-group">
                      <textarea class="form-control" style="height: 150px;" placeholder="Write something about today"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                    <div class="pull-right">
                      <button type="submit" class="btn btn-default">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default groups">
            <div class="panel-heading">
              <h3 class="panel-title">Set groups accessibility</h3>
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
              <button style="background: red; color: white; outline: none; border:none; border-radiius: 5px; display: inline-block;">Can't see</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
