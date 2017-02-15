<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">

  <title>Login Page</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

</head>

<body>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading"><strong>Upload Profile Picture</strong> <small>click to upload</small></div>
      <div class="panel-body">

        <!-- Standar Form -->
        <h4>Select files from your computer</h4>
        <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
          <div class="form-inline">
            <div class="form-group">
              <input type="file" name="files[]" id="js-upload-files" multiple>
            </div>
            <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
          </div>
        </form>
      </div>
    </div>   <!--register row 1-->
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Fill In Details</strong></div>
        <div class="panel-body">
          <form action="regist.php" method="get">
          <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" class="form-control" id="username" placeholder="Input username" name="username">
          </div>
          <div class="form-group">
            <label for="Password1">Password</label>
            <input type="text" class="form-control" id="Password1" placeholder="Input password" name="password1">
          </div>
          <div class="form-group">
            <label for="Password2">Password</label>
            <input type="text" class="form-control" id="Password2" placeholder="Confirm password" name="password2">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Input name" name="name">
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" placeholder="Input city">
          </div>
          <div class="form-group">
            <label for="university">University</label>
            <input type="text" class="form-control" id="university" placeholder="Input university">
          </div>
          <div class="form-group">
            <label for="company">Work Place</label>
            <input type="text" class="form-control" id="company" placeholder="Input company">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="text" class="form-control" id="email" placeholder="Input email address">
          </div>
          <div class="form-group">
            <label for="phoneNum">Phone Number</label>
            <input type="tel" class="form-control" id="phoneNum" placeholder="Input phone number">
          </div>
          <div class="form-group">
            <span class="pull-right">
              <button type="submit"
              class="btn btn-sm btn-danger">Back</button>
              <button type="submit"
              class="btn btn-sm btn-success">Submit</button>
            </span>
          </div>
        </form>
        </div>
      </div>
  </div>
</body>
</html>
