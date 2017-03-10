<?php
session_start();
$image=$_POST["image"];
$_SESSION["circleicon"]=$image;
echo $image;
?>
