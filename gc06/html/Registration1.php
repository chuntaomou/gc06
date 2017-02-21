<?php

ini_set('display_error', '1');
ini_set('error_reporting', E_ALL);
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

      <!--register row 1-->

      <div class="panel panel-default">

        <div class="panel-heading"><strong>Fill In Details</strong></div>

        <div class="panel-body">

          <div class="form-group">

            <label for="email1">Email address</label>

            <input type="email" class="form-control" id="email1" placeholder="Input email address">

          </div>

          <div class="form-group">

            <label for="email2">Email address</label>

            <input type="email" class="form-control" id="email2" placeholder="Re-enter email address">

          </div>

          <div class="form-group">

            <label for="Password">Password</label>

            <input type="text" class="form-control" id="password" placeholder="New password">

          </div>

          <div class="form-group">

            <span class="pull-right">

              <button type="submit"

              class="btn btn-sm btn-danger" >Back</button>

              <button type="submit"

              class="btn btn-sm btn-success" id = "submit">Submit</button>

            </span>

          </div>

        </div>

      </div>

  </div>



  <script>

   $(document).ready(function(){

     $("#submit").click(function(){

       var email1 = $("#email1").val();

       var email2 = $("#email2").val();

       var password1 = $("#password").val();

     if (email1 === email2) {



        $.post("../php/registration1.php",{email:email1, password:password1},

        function(data){

          if(data=='Invalid Email.......'){
            alert(data);
          }else{
            alert(data);
            window.location = "../html/registration2.php";
          }
        })

      } else {

        alert("two emails are different!");      }

     });

  })

  </script>





</body>
</html>
