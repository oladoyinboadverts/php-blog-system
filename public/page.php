<?php
include'head.php';
include_once'connection.php';

if(isset($_GET["id"])){
	
	$id = $_GET["id"];
	
	$query = $conn->query("SELECT * FROM `page` WHERE `slug` = '$id'");
	$fetch = $query->fetch_assoc();
	$id = $fetch["id"];
	$name = $fetch["name"];
	$content = $fetch["content"];

include "templates/page.template.php";

}

include "foot.php";
?>


