<?php

class Related{
	
public $postname;

public $pcategory;

public $rbox;


	
function __construct($tags, $pcategory, $pcat, $rbox){
	$this->tags = $tags;
	$this->cat = $pcategory;
	$this->Similar($rbox);
	
}
	
	
	
protected function Similar($rbox){
	
	if($rbox == "Enable"){
	$re = $this->tags;
	$re = explode(", ",$re);
	$all = implode("|", $re);
	include "../info.php";
	
function format_2_url4($val){
	$val = trim($val);
	$val = str_replace(array(',', '<', ':', ';', '"', '>', '/','-', '(', ')', '[', ']', '{', '}', '&', '!', '$', '+', '’', '‘'), '', $val);
	$val = str_replace(array("  ", "    "), "-", $val);
	$val = explode(" ", $val);
	$val = strtolower(implode("-", $val));
	return $val;
}

$conn1 = mysqli_connect($bhost, $buser, $bpassword, $bdatabase);

//page limit query
$pgl = $conn1->query("SELECT * FROM `options`");
$flimit = $pgl->fetch_assoc();
$limit = $flimit["relatedno"];
if($limit != 0){
  $page_limit = $limit;
}elseif($limit == 0){
	$page_limit = 5;
}



//get all posts related to the post tags using REGEXP

$sql7 = "SELECT * FROM `posts` WHERE `tags` REGEXP '$all' LIMIT $page_limit";
$query = mysqli_query($conn1, $sql7);
if($query){
$numrow = mysqli_num_rows($query);
if($numrow > 0){

	
echo "<h2>Related Posts</h2><br/>";	

	$sql = "SELECT * FROM `settings`";
	$squery = mysqli_query($conn1, $sql);
	$sfetch = mysqli_fetch_assoc($squery);
	$siteurl = $sfetch['siteurl'];
	$imgdir = $sfetch['imagedir'];
	
	for($x = 0; $x < $numrow; $x++){
	$fetch = mysqli_fetch_assoc($query);
	$id = $fetch['id'];
	$rname = $fetch['name'];
	$category = $fetch['category'];
	$image = $fetch['image'];
	$urlname= format_2_url4($rname);
	$imageurl = "{$imgdir}{$image}";
	$url = "{$siteurl}{$id}-{$urlname}";

include "../templates/related.template.php";





}

}else{
	echo "";
}
}else{
echo"Error In Query";	
}

}elseif($rbox == "Disable"){
	echo"";
}

}





function ShowRecent(){
	$this->MorePost();
}







//recent posts function

protected function MorePost(){
	include "../info.php";
	
	
	
function format_to_url5($val){
	$val = trim($val);
	$val = str_replace(array(',', '<', ':', ';', '"', '>', '/','-', '(', ')', '[', ']', '{', '}', '&', '!', '$', '+', '’', '‘'), '', $val);
	$val = str_replace(array("  ", "    "), "-", $val);
	$val = explode(" ", $val);
	$val = strtolower(implode("-", $val));
	return $val;
}

	
$conn2 = new mysqli($bhost, $buser, $bpassword, $bdatabase);

//page limit query
$pgl = $conn2->query("SELECT * FROM `options`");
$flimit = $pgl->fetch_assoc();
$limit = $flimit["recentno"];
if($limit != 0){
  $page_limit = $limit;
}elseif($limit == 0){
	$page_limit = 5;
}



$mql = "SELECT `id`, `name`, `category`, `image` FROM `posts` ORDER BY `date` DESC LIMIT $page_limit";
$sql = "SELECT `siteurl`, `imagedir` FROM `settings`";
$mq = $conn2->query($mql);
$sq = $conn2->query($sql);
$check = $mq->num_rows;
if($check > 0){
	echo "<br/><h2>RECENT POSTS</h2>";
	$fes = $sq->fetch_assoc();
	$sitename = $fes['siteurl'];
	$imgdir = $fes['imagedir'];
	for($x = 0; $x < $check; $x++){
		$f = $mq->fetch_assoc();
		$id = $f['id'];
		$name = $f['name'];
		$urlname = format_to_url5($name);
		$image = $f['image'];
	    $url = "{$sitename}{$id}-{$urlname}";
		$imageurl = "{$imgdir}{$image}";

   include"../templates/recentpost.template.php";
   
   
		}
}else{
	
	
	echo"";
	
}
}
	
}


?>