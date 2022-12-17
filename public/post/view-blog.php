<?php
require 'head/connection.php';

(int)$id = $_GET['id'];

(string)$pn = $_GET["pn"];

//remove "/" from url and make the url accurate as title to restrict url manipulation
$pn2 = explode("/", $pn);
$pn2 = trim($pn2[0]);

//getting all ids in database as array in order to check & validate the url id 
$idquery = $connect->query("SELECT `id` FROM `posts`");
$chk = $idquery->num_rows;
for($x = 0; $x < $chk; $x++){
$idfetch = $idquery->fetch_assoc();
$ids[] = $idfetch["id"];
}



//check if $id is in $ids array, if yes then show post
if(in_array($id, $ids) && isset($pn)){
include'functions/function.php';
include '../head.php';
include'functions/view.blade.php';




$sql = "SELECT * FROM `posts` WHERE `id` = $id";
$qr = $conn->query($sql); 
$check = $qr->num_rows;
$ft = $qr->fetch_assoc();

//format post name as url in order to check later for match
$c_name = format_2_url($ft["name"]);


$query = mysqli_query($connect, $sql);

if(mysqli_num_rows($query) == 0){
	echo "
	<!DOCTYPE html><head><title>Post Not Found</title></head><body>
	<center><h1>404</h1></center></body>";
} 
//check if posts not empty and also check if post name is equal as url title
elseif($check != 0 && $c_name == $pn2){
	
	
include "../Model/Single.model.php";

//tags function
Tags($tags);

echo "<br/><hr/>";

include "../Model/Related.model.php";

//comment box
$comment = new Comment();
$comment->CommentBox($id, $cbox, $site);

//comments
ViewComments($id);

include "../Model/Recentpost.model.php";

}else{ Redirect("../404.php"); };


}
else{
	header("location: ".$site."/404.php");
}





echo'</div></div>';
include '../foot.php';
?>

