<?php
$db_host="localhost";
$db_username="root";
$db_password="";
$db_name="socialsite_db";

@mysql_connect("$db_host","$db_username","$db_password","$db_name") or die ("could not connect to mysql");
@mysql_select_db("$db_name") or die ("No database");

echo "connect sucessfully";
?>
