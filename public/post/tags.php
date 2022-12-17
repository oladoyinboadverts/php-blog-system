<?php
$id = $_GET['s'];

$id = explode("-", $id);
$id = implode(" ", $id);

include 'head/connection.php';

include '../head.php';

function format_to_url($val){
	$val = trim($val);
	$val = str_replace(array(',', '<', ':', ';', '"', '>', '/','-', '(', ')', '[', ']', '{', '}', '&', '!', '$', '+', '’', '‘'), '', $val);
	$val = str_replace(array("  ", "    "), "-", $val);
	$val = explode(" ", $val);
	$val = strtolower(implode("-", $val));
	return $val;
}


//page limit query
$pgl = $conn->query("SELECT * FROM `options`");
$flimit = $pgl->fetch_assoc();
$limit = $flimit["tagsno"];
if($limit != 0){
  $page_limit = $limit;
}elseif($limit == 0){
	$page_limit = 5;
}




if(empty($_GET["page"]) || $_GET["page"] == 1){

include "../Model/tag.model.php";

}

elseif(!empty($_GET["page"]) && $_GET["page"] > 1){
	
include "../Model/tag.pagination.model.php";
	
}

?>



<?php
if(!isset($_GET["page"])){
	$siteurl = "page/";
}else{
	$siteurl = "";
}
//checking and setting values
if(empty($_GET["page"]) || $_GET["page"] == 1){
	$page_number = 1;
}elseif(!empty($_GET["page"]) && $_GET["page"] > 1){
	$page_number = $_GET["page"];
}

?>

<?php if($page_number > 1): ?>
<a href="<?=$siteurl.$page_number-1?>"><div>Previous</div></a>

<?php endif; ?>



<?php 
$id = $_GET['s'];

$id = explode("-", $id);
$id = implode(" ", $id);

$query = $conn->query("SELECT * FROM `posts` WHERE `tags` LIKE '%$id%'");
$count = $query->num_rows;
$cal = $count/$page_limit;
$result = ceil($cal);

if($result > 1){
	for($x=2;$x <= $result; $x++){
	echo "<a href='{$siteurl}{$x}'><div class='button'>{$x}</div></a>";
}
}

if($page_number < $result && $result > 1): ?>
<a href="<?=$siteurl.$page_number+1?>"><div>Next</div></a>
<?php endif; ?>






<?php

include'../foot.php';


?>