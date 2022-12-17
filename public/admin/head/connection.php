<?php 
include '../info.php';
include './class/class.php';

$connect = mysqli_connect($bhost, $buser, $bpassword, $bdatabase) or die("ERROR OCCURED:" .mysqli_connect_error());

$conn = new mysqli($bhost, $buser, $bpassword, $bdatabase);

?>