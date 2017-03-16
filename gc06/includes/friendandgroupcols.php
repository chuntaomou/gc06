<div class="col-md-4">
  <div class="panel panel-default friends">
    <div class="panel-heading">
      <h3 class="panel-title">My Friends</h3>
    </div>
    <div class="panel-body">
      <ul>
        <?php
        include "../php/mysql_connect.php";
        ini_set('display_error', '1');
        error_reporting(E_ALL);
        //$userid = $_SESSION["userid"];
        //$userid=$_GET["id"];
        $userid=$_SESSION["userid"];
        $query = "SELECT user_id,friend_id FROM friends_list WHERE user_id ='$userid' or friend_id = '$userid' and status='friend' ";
        $result = mysqli_query($connection, $query) or die( 'Error occur selecting friends'.mysqli_error());
        $friendidArray = array();

        if (mysqli_num_rows($result)!= 0){
          while ($row=mysqli_fetch_array($result)){
           if ($row["user_id"]==$userid)  $friendidArray[]=$row["friend_id"];
              else $friendidArray[]=$row["user_id"];

             }
          foreach ($friendidArray as $friendid){
              $query = "SELECT * from user_detail where user_id='$friendid' ";
              $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
              $row = mysqli_fetch_array($result);
              $id = $row["user_id"];
              $name = $row["first_name"].$row["last_name"];
              if($row["profile_pic"]==NULL){
                $icon='../img/user.png';
              }  else
              {
                $icon="../images/{$row['profile_pic']}";
              }
             echo
              ('
                <li>
                  <a href="../html/UserProfile.php?id='.$id.'" class ="thumbail">
                    <img src= '.$icon.' alt ="usericon" style="width: 40px; height: 40px">
                    '.$name.'
                  </a>
                </li>
            ');
           }
        }

        mysqli_close($connection);
         ?>

      </ul>
      <div class="clearfix"></div>
      <?php
      $id=$_SESSION["userid"];
      echo '
      <a class="btn btn-primary" href="../html/Friends.php?id='.$id.'" style="margin-top: 10px;">View All Friends</a>
      ';
      ?>
    </div>
  </div>
  <div class="panel panel-default groups">
    <div class="panel-heading">
      <h3 class="panel-title">Latest Groups</h3>
    </div>
    <div class="panel-body">
      <?php
      include "../php/mysql_connect.php";
      ini_set('display_error', '1');
      ini_set('error_reporting', E_ALL);

      //$userid=$_SESSION["userid"];
      //$userid=$_GET["id"];
      $userid=$_SESSION["userid"];
      $output="";
      $query = "SELECT * FROM circle_detail WHERE circle_admin_user_id ='$userid' ";
      $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());

      while($row=mysqli_fetch_array($result)){
        $circleName= $row["circle_name"];
        $circleid=$row["circle_id"];
        $output.='
        <div class="group-item">
        <a href="../html/Circlechat.php?id='.$circleid.'" target ="_blank">
        <img src="../img/group.png" class="img-thumbnail">
        </a>
          <p>The name of this group is '.$circleName.'.</p>
        </div>
        <div class="clearfix"></div>
        ';
      }

      $querymember="SELECT * FROM circle_members WHERE member_user_id='$userid'";
      $resultmember=mysqli_query($connection,$querymember) or die ("error in selecting member in circle");
      $countmember=mysqli_num_rows($resultmember);

      if($countmember>0){
        while($rowmember=mysqli_fetch_array($resultmember)){
          $circle_member_id=$rowmember["circle_id"];
          $queryfindname="SELECT * FROM circle_detail WHERE circle_id='$circle_member_id'";
          $resultfindname=mysqli_query($connection,$queryfindname) or die("error in finding name member");
          $row_member_name=mysqli_fetch_array($resultfindname);
          $circle_member_name=$row_member_name["circle_name"];
          $output.='
          <div class="group-item">
          <a href="../html/Circlechat.php?id='.$circle_member_id.'" target ="_blank">
          <img src="../img/group.png" class="img-thumbnail">
          </a>
            <p>The name of this group is '.$circle_member_name.'.</p>
          </div>
          <div class="clearfix"></div>
          ';
        }
      }

      mysqli_close($connection);
      echo $output;
      ?>
      <div class="clearfix"></div>
      <?php
      //$id=$_GET["id"];
      $id=$_SESSION["userid"];
      echo '
      <a href="../html/Groups.php?id='.$id.'" class="btn btn-primary">View All Groups</a>
      ';
      ?>
    </div>
  </div>
</div>
