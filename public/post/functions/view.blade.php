<?php

// ****** views function ********


function Views($id){
include'../info.php';
$vconn = new mysqli($bhost, $buser, $bpassword, $bdatabase) or exit("Error Connecting");

//getting views id 
$vid = $id;

//connecting to views table in posts
$vsql = "SELECT `views` FROM `posts` WHERE `id` = '$vid'";
$vquery = $vconn->query($vsql);
$fviews = $vquery->fetch_assoc();
$views = $fviews['views'];

//adding +1 to views in every reload
(int)$views = 1 + $views;


//updating views count after adding +1
$vusql = "UPDATE `posts` SET `views` = '$views' WHERE `id` = '$vid'";
$vuquery = $vconn->query($vusql);

}


?>