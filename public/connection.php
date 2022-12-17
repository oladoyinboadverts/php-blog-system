<?php 
include 'info.php';

$connect = mysqli_connect($bhost, $buser, $bpassword, $bdatabase) or die("ERROR OCCURED:" .mysqli_connect_error());

$conn = new Mysqli($bhost, $buser, $bpassword, $bdatabase) or die();
?>