<?php



$sql3 = "SELECT * FROM `options`";
$query = $reconn->query($sql3);
$fetch = $query->fetch_assoc();
$cbox = $fetch['commentbox'];
$rbox = $fetch['related'];




//related posts
$related = new Related($tags, $pcategory, $pcat, $rbox);
echo "<br/><hr/>";





?>