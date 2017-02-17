<?php
if(!(isset($_SESSION["username"]))){
  echo "<script type='text/javascript'>window.location.href = '../html/Login.php'</script>";
}
?>
