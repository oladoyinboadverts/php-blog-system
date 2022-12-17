<?php 
include '../info.php';
include './class/Class.php';

$connect = mysqli_connect($bhost, $buser, $bpassword, $bdatabase) or die("ERROR OCCURED:" .mysqli_connect_error());

$reconn = new mysqli($bhost, $buser, $bpassword, $bdatabase);

$conn = mysqli_connect($bhost, $buser, "", $bdatabase);

include './class/Related.php';

?>