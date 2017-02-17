<?php
session_start();
$connection = mysqli_connect('localhost','root','root','socialsite_db') or die('Error connecting to MySQL server.'. mysql_error());


if(isset($_POST['searchVal'])){
  $searchq=$_POST['searchVal'];
  $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
  $query="SELECT * FROM user_login WHERE user_name LIKE '%$searchq%'";
  $result = mysqli_query($connection,$query);
  //$row = mysqli_fetch_array($result);
  $count=mysqli_num_rows($result);
  if($count==0){
    $output="there was no search result";
  }else{
    while($row=mysqli_fetch_array($result)){
      $name=$row["user_name"];
      $output .="<li><a href='../html/uerProfile.html'>".$name."</a></li>";
    }
  }
}else{
  $output="no input";
}
echo $output;
?>
