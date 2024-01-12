<?php
session_start();
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con, 'restaurant')or die(mysqli_error($con));
?>