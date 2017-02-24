<?php

    session_start();

    ini_set('display_errors', '1');
    ini_set('error_reporting', E_ALL);

$connection =    mysqli_connect('localhost','root','root','socialsite_db')    or die('Error connecting to MySQL server.'. mysql_error());

 //Fetching Values from URL
$email=$_POST['email1'];
$password= ($_POST['password1']);  // Password Encryption, If you like you can also leave sha1

// check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
 {
    echo "Invalid Email.......";
 }
else
 {//matching user input email and password with stored email and password in database
  $query="SELECT * FROM user_login WHERE user_name='$email' AND pass_word='$password'";
  //$query="SELECT * FROM user_login";
	$result = mysqli_query($connection,$query);
  $row = mysqli_fetch_array($result);
  //echo $row["user_name"];
	if($row==null)
      {
		 echo "Email or Password is wrong...!!!!";
	  }
	else
	{
		echo "Successfully Logged in...";
    $_SESSION["username"]=$row["user_name"];
    $_SESSION["userid"]=$row["user_id"];
	}
 }

//connection closed
mysqli_close ($connection);
?>
