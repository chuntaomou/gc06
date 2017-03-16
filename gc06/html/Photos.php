<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GC06 - photos</title>
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
            <h1 class="page-header">Photo Albums</h1>
            <ul class="photos gallery-parent">
              <?php
              $connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
              $id=$_GET["id"];
              $userid=$_SESSION["userid"];
              $output="";
              $type=3;
             // if user view himself
              if($_SESSION["userid"]==$_GET["id"]){
                $query="SELECT * FROM photo_album WHERE created_by_user_id='$id'";
                $result=mysqli_query($connection,$query) or die ("Error in selecting photo albums");
                $count=mysqli_num_rows($result);

                if($count>0){
                  while($row=mysqli_fetch_array($result)){
                    $album_title=$row["album_name"];
                    $album_icon=$row["album_pic"];
                    $album_id=$row["album_id"];

                    $output.='
                    <li>
                    <a href="../html/Photocollection.php?id='.$album_id.'&userid='.$_GET["id"].'">
                    <img src="../albumicons/'.$album_icon.'" class="img-thumbnail" alt="">
                    '.$album_title.'
                    </a>
                    </li>
                    ';
                  }
                }else{
                  $output="there is no album yet";
                }
              }else{ //if user view others
                $query1="SELECT * FROM friends_list WHERE user_id='$id' AND friend_id='$userid'";
                $query2="SELECT * FROM friends_list WHERE user_id='$userid' AND friend_id='$id'";

                $result1=mysqli_query($connection,$query1);
                $result2=mysqli_query($connection,$query2);

                $count1=mysqli_num_rows($result1);
                $count2=mysqli_num_rows($result2);
                //if they are not friends
                if(($count1+$count2)==0){
                  //friends of friends
                  $hostid=$_SESSION["userid"];
                  $queryfriendofhost="SELECT * FROM friends_list WHERE (user_id='$hostid' or friend_id='$hostid') AND status='friend'";
                  $resultfriendofhost=mysqli_query($connection,$queryfriendofhost);
                  $countfriendofhost=mysqli_num_rows($resultfriendofhost);

                  if($countfriendofhost>0){
                    while($rowfriendofhost=mysqli_fetch_array($resultfriendofhost)){
                      if($rowfriendofhost["user_id"]==$hostid){
                        $friend_id=$rowfriendofhost["friend_id"];
                      }else{
                        $friend_id=$rowfriendofhost["user_id"];
                      }

                      $queryfriendoffriend="SELECT * FROM friends_list WHERE (user_id='$friend_id' or friend_id='$friend_id') AND status='friend'";
                      $resultfriendoffriend=mysqli_query($connection,$queryfriendoffriend);
                      $countfriendoffriend=mysqli_num_rows($resultfriendoffriend);

                      if($countfriendoffriend>0){
                        while($rowfriendoffriend=mysqli_fetch_array($resultfriendoffriend)){
                          if($rowfriendoffriend["user_id"]==$friend_id){
                            if($rowfriendoffriend["friend_id"]==$_GET["id"]){
                              $type=2;
                            }
                          }else{
                            if($rowfriendoffriend["user_id"]==$_GET["id"]){
                              $type=2;
                            }
                          }
                        }
                      }
                    }
                  }

                 //if in same circle
                 $hostid=$_SESSION["userid"];
                 $userid=$_GET["id"];
                 //host is a member of a circle
                 $querymemberhost="SELECT * FROM circle_members WHERE member_user_id='$hostid'";
                 $resultmemberhost=mysqli_query($connection,$querymemberhost);
                 $countmemberhost=mysqli_num_rows($resultmemberhost);

                 if($countmemberhost>0){
                   while($rowmemberhost=mysqli_fetch_array($resultmemberhost)){
                     $circle_id=$rowmemberhost["circle_id"];
                     $queryselectmember="SELECT * FROM circle_members WHERE circle_id='$circle_id'";
                     $resultselectmember=mysqli_query($connection,$queryselectmember) or die("error in selecting");
                     $countselectmember=mysqli_num_rows($resultselectmember);

                     if($countselectmember>0){
                       while($rowselectmember=mysqli_fetch_array($resultselectmember)){
                         if($rowselectmember["member_user_id"]==$_GET["id"]){
                           $type=$type+10;
                         }
                       }
                     }
                   }
                 }

                }else{
                  //friends
                  $type=0;
                }

                $query="SELECT * FROM photo_album WHERE created_by_user_id='$id'";
                $result=mysqli_query($connection,$query) or die ("Error in selecting photo albums");
                $count=mysqli_num_rows($result);
                echo $type;
                if($type==0){
                  if($count>0){
                    while($row=mysqli_fetch_array($result)){
                      $album_title=$row["album_name"];
                      $album_icon=$row["album_pic"];
                      $album_id=$row["album_id"];

                      $output.='
                      <li>
                      <a href="../html/Photocollection.php?id='.$album_id.'&userid='.$_GET["id"].'">
                      <img src="../albumicons/'.$album_icon.'" class="img-thumbnail" alt="">
                      '.$album_title.'
                      </a>
                      </li>
                      ';
                    }
                  }else{
                    $output="there is no album yet";
                  }
                }else if($type==2){
                  if($count>0){
                    while($row=mysqli_fetch_array($result)){
                      $album_title=$row["album_name"];
                      $album_icon=$row["album_pic"];
                      $album_id=$row["album_id"];
                      $album_privacy=$row["privacy_id"];

                      if($album_privacy==2){
                        $output.='
                        <li>
                        <a href="../html/Photocollection.php?id='.$album_id.'&userid='.$_GET["id"].'">
                        <img src="../albumicons/'.$album_icon.'" class="img-thumbnail" alt="">
                        '.$album_title.'
                        </a>
                        </li>
                        ';
                      }
                    }
                  }else{
                    $output="there is no album yet";
                  }
                }else if($type==12){
                  if($count>0){
                    while($row=mysqli_fetch_array($result)){
                      $album_title=$row["album_name"];
                      $album_icon=$row["album_pic"];
                      $album_id=$row["album_id"];
                      $album_privacy=$row["privacy_id"];

                      if($album_privacy!=0){
                        $output.='
                        <li>
                        <a href="../html/Photocollection.php?id='.$album_id.'&userid='.$_GET["id"].'">
                        <img src="../albumicons/'.$album_icon.'" class="img-thumbnail" alt="">
                        '.$album_title.'
                        </a>
                        </li>
                        ';
                      }
                    }
                  }else{
                    $output="there is no album yet";
                  }
                }else if($type==13){
                  if($count>0){
                    while($row=mysqli_fetch_array($result)){
                      $album_title=$row["album_name"];
                      $album_icon=$row["album_pic"];
                      $album_id=$row["album_id"];
                      $album_privacy=$row["privacy_id"];

                      if($album_privacy==1){
                        $output.='
                        <li>
                        <a href="../html/Photocollection.php?id='.$album_id.'&userid='.$_GET["id"].'">
                        <img src="../albumicons/'.$album_icon.'" class="img-thumbnail" alt="">
                        '.$album_title.'
                        </a>
                        </li>
                        ';
                      }
                    }
                  }else{
                    $output="there is no album yet";
                  }
                }else{
                  $output="Sorry, you can see albums";
                }
              }


              echo $output;
              mysqli_close($connection);
              ?>
            </ul>
          </div>

          <?php
          if($_SESSION["userid"]==$_GET["id"]){
            include "../includes/addnewalbum.php";
          }
          ?>

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
