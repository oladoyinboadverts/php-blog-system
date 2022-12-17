<?php

//single Model Management


$row = mysqli_fetch_assoc($query);

$postname = $row['name'];
$pcategory = $row['category'];
$pcat = explode(" ", $pcategory);
$pcat = implode("-", $pcat);
$newcategory = ucwords($pcategory);
$maincontent = $row['content'];
$datex = $row['date'];
$tags = $row['tags'];
$date = date('M d, Y | h:i A', $datex);
$image = $row['image'];
$imagealt = $row['imagealt'];

$sql2 = "SELECT * FROM `settings`";
$optq = $conn->query("SELECT `views` FROM `options`");
$squery = mysqli_query($connect, $sql2);
$sfetch = mysqli_fetch_assoc($squery);
$fetchoption = $optq->fetch_assoc();

$siteurl = $sfetch['imagedir'];
$site = $sfetch['siteurl'];
$views = $fetchoption["views"];

//views count
if($views == 1){
Views($id);
}elseif($views == 0){ }


include ("../templates/single.template.php");



?>