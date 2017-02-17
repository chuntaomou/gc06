<?php
session_start();
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

$name=$_SESSION["username"];
echo $name;
?>
