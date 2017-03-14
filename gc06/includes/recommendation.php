<?php



  $queryinfo="SELECT * FROM user_detail WHERE user_id='$recommendid'";
  $resultinfo=mysqli_query($connection,$queryinfo);
  $rowinfo=mysqli_fetch_array($resultinfo);
  $image=$rowinfo["profile_pic"];
  $firstname=$rowinfo["first_name"];
  $lastname=$rowinfo["last_name"];


  echo "
  <div class='row' style='margin:10px'>
  <div id='$recommendid'>
  <img
  src='../";
  if ($image==NULL) echo "img/user.png"; else  echo "images/{$image}";
  echo "'
  width='40' height='40'>
  <div id='name'>
    $firstname  $lastname
  </div>

  <div class='btn-group btn-group-justified' style='margin-top:3px; margin-bottom:3px;' role='group'>
  <div id='friendbutton'class='btn-group' role='group'>
  <button type='button' id='$recommendid' class ='btn btn-success btn-block addfriend'>Add Friend</button>
  </div>

  <div id='ignorebutton' class='btn-group' role='group'>
  <button type='button' id='$recommendid' class ='btn btn-danger btn-block ignorebutton'>Ignore</button>
  </div>
  </div>
  </div>
  </div>
  ";

?>
