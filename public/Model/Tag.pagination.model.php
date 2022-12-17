<?php

$sq = $reconn->query("SELECT * FROM `settings`");
$sfetch = $sq->fetch_assoc();
$siteurl = $sfetch["siteurl"];
$imgurl = $sfetch["imagedir"];
	
$page_number = $_GET["page"];


$t1 = $page_number-1;
$t2 = $t1*$page_limit;
	
$query = $reconn->query("SELECT * FROM `posts` WHERE `tags` LIKE '%$id%' ORDER BY `date` DESC LIMIT $t2, $page_limit");

$check = $query->num_rows;


for($x=0; $x < $check; $x++){	
$row = $query->fetch_assoc();

	$id = $row['id'];
	$name = $row['name'];
	$img = $row["image"];
	$imgalt = $row["imagealt"];
	$cat = $row["category"];
	$urlname = format_to_url($name);
	$url = "{$siteurl}{$id}-{$urlname}";
	$imageurl = "{$imgurl}{$img}";
	
	//tag post template 
	
	include "../templates/tag.template.php";
}

?>