<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GC06 - groups</title>
  <link rel="shortcut icon" href="../Icons/webicon.ico" type="image/x-icon">

  <!-- Bootstrap core CSS -->
   <link href="../css/bootstrap.css" rel="stylesheet">

   <!-- Custom styles for this template -->
   <link href="../css/style.css" rel="stylesheet">
   <link href="../css/font-awesome.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

   <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
            <h1 class="page-header">Groups
              <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="modal">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              </button>
            </h1>

             <ul class="photos gallery-parent">
               <?php include "../php/getGroups.php"; ?>
             </ul>
             <!-- Trigger the modal with a button -->


          </div>





        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Choose your group member</h4>
              </div>
              <div class="modal-body">
                <div class="container">
                  <form>
                    <div class="row">
                    <div class="col-md-4">
                    <div class="form-group"
                      <label for="title" class="control-label">Circle name:</label>
                      <input type="text" class="form-control" id="title">
                    </div>
                    </div>
                  </div>
                </form>
                 <div class="row">
                  <div class="col-md-4">
                   <div class="panel panel-default">
                     <div class="panel-body">
                      Group member:
                      <h4 id="list"> </h4>
                     </div>
                   </div>
                  </div>
                </div>

                   <?php
                    include "../php/listFriendsName.php";
                    ?>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="create"> Create </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

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
    <script>
    var array=[];
      $(".btn1").on("click", function(){

         var userid= this.id;
         array.push(userid);
         $.post("../php/getfriendDetail.php",{userid},function(data){
           $("#list").append(data+"<br></br>");
         })

      })
      $("#modal").on("click",function(){
        var array=[];
        $("#list").text("");
      })

      $("#create").on("click",function(){
         var title = $("#title").val();
         $.post("../php/createCircle.php",{title},function(data){
           var circleid = parseInt(data);
           alert(circleid);

           $.each(array, function(i, val){
             var value = parseInt(val);
             $.post("../php/memberCircle.php",{circleid,value},function(data1){
             })

           })
         })

         window.location="../html/Groups.php";
      })

    </script>
  </body>
</html>
