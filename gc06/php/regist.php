<!--
this file is used to enable users to regist an account
-->
<?php
$username=$_GET["username"];
$password1=$_GET["password1"];
$password2=$_GET["password2"];
$name=$_GET["name"];
?>
<html>
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
      <div class="panel-heading"><strong>Registration Status</strong></div>
      <div class="panel-body">
        <?php
        if($password1===$password2):
        echo "true";
      else:
        echo "false";
        end if;
        ?>
      </div>
    </div>
  </div>
  <?php echo $_GET["username"]?><br>
  <?php echo $_GET["password1"]?><br>
  <?php echo $_GET["name"]?>
</body>
</html>
