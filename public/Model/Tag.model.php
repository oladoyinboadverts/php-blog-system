<?php

$sql = "SELECT * FROM `posts` WHERE `tags` LIKE '%$id%' ORDER BY `date` DESC LIMIT $page_limit";

$query = mysqli_query($connect, $sql);

$sq = $reconn->query("SELECT * FROM `settings`");
$sfetch = $sq->fetch_assoc();
$siteurl = $sfetch["siteurl"];
$imgurl = $sfetch["imagedir"];

if($query){
	$num = mysqli_num_rows($query);
	
	echo "<h2>TAG: {$id} </h2><br/><hr/>
	";
	if($num > 0){
		
		for($x = 0; $x < $num; $x++){
	$row = mysqli_fetch_assoc($query);
	
	$id = $row['id'];
	$name = $row['name'];
	$img = $row["image"];
	$imgalt = $row["imagealt"];
	$cat = $row["category"];
	$urlname = format_to_url($name);
	$url = "{$siteurl}{$id}-{$urlname}";
	$imageurl = "{$imgurl}{$img}";
	
	//tag template
	include "../templates/tag.template.php";
	
		}
	}
	
	else{
		echo "No Post Like ".$id;
	}
}
else{
	echo "No Post Like ".$id;
}

?>