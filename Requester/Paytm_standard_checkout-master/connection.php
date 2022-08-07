<?php
$con= mysqli_connect("localhost","root","");
$db = mysqli_select_db($con,'fitness');
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

?>