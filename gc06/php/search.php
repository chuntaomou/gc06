<?php
session_start();
$connection = mysqli_connect('localhost','root','root','socialsite_db') or die('Error connecting to MySQL server.'. mysql_error());


if(isset($_POST['searchVal'])){
  $searchq=$_POST['searchVal'];
  $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
  $query="SELECT * FROM user_detail WHERE first_name LIKE '%$searchq%'";
  $result = mysqli_query($connection,$query);
  //$row = mysqli_fetch_array($result);
  $count=mysqli_num_rows($result);
  if($count==0){
    $output="there was no search result";
  }else{
    while($row=mysqli_fetch_array($result)){
      $name=$row["first_name"]."&nbsp".$row["last_name"];
      $userid =$row["user_id"];
      $output .="<li><a href='../html/UserProfile.php?id=".$userid."'>".$name."</a></li>";
    }
  }
}else{
  $output="no input";
}
echo $output;

mysqli_close($connection);
?>
