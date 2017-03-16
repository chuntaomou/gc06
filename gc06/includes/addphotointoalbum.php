<div class="col-md-12">
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
