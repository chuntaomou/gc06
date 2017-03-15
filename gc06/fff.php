<?php
$connection=mysqli_connect("localhost","root","root","socialsite_db") or die("database is not connected");
//$id=$_SESSION["userid"];
$id=$_GET["id"];
$output="";
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
    <a href="../html/Photocollection.php?id='.$album_id.'">
    <img src="../albumicons/'.$album_icon.'" class="img-thumbnail" alt="">
    '.$album_title.'
    </a>
    </li>
    ';
  }
}else{
  $output="there is no album yet";
}

echo $output;

mysqli_close($connection);
?>
