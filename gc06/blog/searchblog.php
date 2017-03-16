<?php
session_start();
$output=null;
$myid=$_SESSION["userid"];


$connection = mysqli_connect('localhost','root','root','socialsite_db') or die('Error connecting to MySQL server.'. mysql_error());

if(isset($_POST['searchval'])){
  $searchq=$_POST['searchval'];
  //$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
  $query="SELECT * FROM blog_detail WHERE blog_title LIKE '%$searchq%'";
  $result=mysqli_query($connection,$query);

  $count=mysqli_num_rows($result);

  if($count==0){
    $output.="there is no result";
  }else{
    while($row=mysqli_fetch_array($result)){
      $blogtitle=$row["blog_title"];
      $blogid=$row["blog_id"];
      $blogowner=$row["created_by_user_id"];
      //if blog owner is friend
      $query1="SELECT * FROM friends_list WHERE (user_id='$myid' AND friend_id='$blogowner') AND status='friend'";
      $query2="SELECT * FROM friends_list WHERE (user_id='$blogowner' AND friend_id='$myid') AND status='friend'";

      $result1=mysqli_query($connection,$query1);
      $result2=mysqli_query($connection,$query2);

      $count1=mysqli_num_rows($result1);
      $count2=mysqli_num_rows($result2);

      if((($count1+$count2)>0)||($myid==$blogowner)){
        if($myid==$blogowner){
          $output.="<li><a href='../html/Blogcontent.php?blogid=".$blogid."&id=".$blogowner."'>Your blog: ".$blogtitle."</a></li>";
        }else{
          $output.="<li><a href='../html/Blogcontent.php?blogid=".$blogid."&id=".$blogowner."'>Friend blog: ".$blogtitle."</a></li>";
        }
      }
    }
  }

  if($output==null){
    $output.="there is no result";
  }

}
echo $output;
mysqli_close($connection);

?>
