<?php
session_start();
?>
<!DOCTYPE html>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

  <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Fill In Details <?php echo $_SESSION['userid']; ?> </strong></div>
        <div class="panel-body">

          <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" placeholder="Input name">
          </div>

          <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" placeholder="Input name">
          </div>

          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" placeholder="Input city">
          </div>

          <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" id="gender" placeholder="Input gender">
          </div>

          <div class="form-group">
            <label for="statement">Work Place/Univercity</label>
            <input type="text" class="form-control" id="statement" placeholder="Input work place/university">
          </div>

          <div class="form-group">
            <label for="phoneNum">Phone Number</label>
            <input type="tel" class="form-control" id="phoneNum" placeholder="Input phone number">
          </div>

          <div class="form-group">
            <span class="pull-right">
              <button type="submit"
              class="btn btn-sm btn-danger" id ="back">Back</button>

              <button type="submit"
              class="btn btn-sm btn-success" id ="submit">Submit</button>
            </span>

          </div>
        </div>
      </div>
  </div>

<script>

  $(document).ready(function(){
    $("#submit").click(function(){

      var firstname = $("#firstname").val();
      var lastname = $("#lastname").val();
      var city = $("#city").val();
      var gender = $("#gender").val();
      var statement = $("#statement").val();
      var phonenumber = $("#phomeNum").val();

      $.post("../php/registration2.php",{firstname, lastname, city, gender, statement, phonenumber},
       function(data){
        alert(data);
        window.location = "../php/newhomepage.php";
      })
    })

    $("#back").click(function(){
      window.location = "../html/Registration1.html";
    })
  })

</script>
</body>
</html>
