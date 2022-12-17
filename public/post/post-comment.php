<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cid']) && isset($_POST['name']) && isset($_POST['comment']) && isset($_POST['submit'])){

include 'head/connection.php';

$cid = $_POST['cid'];
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$comment = filter_var(htmlentities(stripslashes(strip_tags($_POST['comment']))), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$x = date("Y-m-d");
$date = strtotime($x);

$sql = sprintf("INSERT INTO `comments` (`name`, `comment`, `date`, `cid`) VALUES ('$name', '%s', '$date', '$cid')", mysqli_real_escape_string($conn, $comment));

$query1 = $conn->query($sql);



if($query1 == true){
	function format_to_url($val){
	$val = trim($val);
	$val = str_replace(array(',', '<', ':', ';', '"', '>', '/','-', '(', ')', '[', ']', '{', '}', '&', '!', '$', '+'), '', $val);
	$val = str_replace(array("  ", "    "), "-", $val);
	$val = explode(" ", $val);
	$val = strtolower(implode("-", $val));
	return $val;
}

	$id = $_POST['cid'];
	$pquery = $reconn->query("SELECT * FROM `posts` WHERE `id`='$id'");
	$squery = $reconn->query("SELECT `siteurl` FROM `settings`");
	$pfetch = $pquery->fetch_assoc();
	$sfetch = $squery->fetch_assoc();
	$postname = format_to_url($pfetch["name"]);
	$siteurl = $sfetch["siteurl"];
	$uniqid = uniqid();
	
	$id = $_POST['cid'];
	$cid = $_POST['cid'];
	
header ('Location: '.$siteurl.$id.'-'.$postname.'/?cid=#'.$cid.$uniqid);
exit();
}else{

echo "error occured";
}


}
else{

header('Location: /index.php',TRUE,301);
die();

}

?>