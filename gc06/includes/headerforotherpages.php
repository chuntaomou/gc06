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
        <li class="active"><a href="../html/userProfile.php?id=<?php echo $_GET['id']; ?>">Profile</a></li>
        <li><a href="../html/friends.php?id=<?php echo $_GET['id']; ?>">Blogs</a></li>
        <li><a href="../html/Photos.php?id=<?php echo $_GET['id']; ?>">Photo</a></li>
        <li><a href="../html/photos.php?id=<?php echo $_GET['id']; ?>">Text</a></li>
      </ul>
     <ul class="nav navbar-nav pull-right">
      <li><a href="../php/newhomepage.php">Home</a></li>
     </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
