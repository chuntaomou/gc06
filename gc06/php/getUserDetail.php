<?php
  include "../php/mysql_connect.php";
  ini_set('display_error', '1');
  ini_set('error_reporting', E_ALL);

  $userid = $_GET['id'];

  $query = "SELECT * FROM user_detail WHERE user_id ='$userid'";
  $result = mysqli_query($connection, $query) or die('Error making select users query'.mysqli_error());
  $row=mysqli_fetch_array($result);
  $name = $row["first_name"]."&nbsp".$row["last_name"];
  $gender = $row["gender"];
  $city = $row["city"];
  $workplace = $row["work_place"];
  $phonenumber= $row["phone_number"];


  echo("<div class='col-md-8'>
    <ul>
      <li><strong>Name:</strong>{$name}</li>
      <li><strong>Gender:</strong>{$gender}</li>
      <li><strong>City:</strong>{$city}</li>
      <li><strong>Work place:</strong>{$workplace}</li>
      <li><strong>Number:</strong>{$phonenumber}</li>
      <li><strong>DOB:</strong>September 16th</li>
      <li><button type='submit' class='btn btn-default pull-right' id='add'> add friend</button></li>
    </ul>
  </div>
 <script>
   $('#add').click(function(){
     var friendid = {$userid}
     $.post('../php/addfriend.php',{friendid},function(data){
      alert(data)
     });
   })
 </script>

  ");

mysqli_close($connection);
?>
