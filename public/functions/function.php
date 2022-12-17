<?php
function format_to_url($val){
	$val = trim($val);
	$val = str_replace(array(',', '<', ':', ';', '"', '>', '/','-', '(', ')', '[', ']', '{', '}', '&', '!', '$', '+', '’', '‘'), '', $val);
	$val = str_replace(array("  ", "    "), "-", $val);
	$val = explode(" ", $val);
	$val = strtolower(implode("-", $val));
	return $val;
}




function Redirect($val, $min){
	echo'
	<script>
	setTimeout("Redirect()", '.$min.');
	function Redirect(){
		window.location = "'.$val.'";
	}
	</script>
	';
}



function get_post_by_category(string $category, int $limit, string $more, $conn){
	
	$getquery = $conn->query("SELECT * FROM `posts` WHERE `category` = '$category' LIMIT $limit");
	$check = $getquery->num_rows;
	if($check > 0){
		
		$heading = ucwords($category);
		
		echo "<br /><h3>{$heading}</h3><br />";
		
		for($x=0; $x < $check; $x++){
			
			
	   $row = $getquery->fetch_assoc();
	   $pid = $row["id"];
	   $name = $row["name"];
	   $category = $row["category"];
	   $content = $row["content"];
	   $image = $row["image"];
	   $imagealt = $row["imagealt"];
	   $dateraw = $row["date"];
	   $date = date("d M, Y", $dateraw);
	   $date2 = date("d M", $dateraw);
	   
	   
	   
//select image and site url from settings table
	$imgquery= $conn->query("SELECT * FROM `settings`");
	$imgfetch = $imgquery->fetch_assoc();
	$imagedir = $imgfetch['imagedir'];
	$siteurl = $imgfetch["siteurl"]; 
	$pn = format_to_url($name);
	$postlink = "{$siteurl}{$pid}-{$pn}/";
	   $imagelink = "{$imagedir}{$image}";
	
	//little check on if image alt is empty
	if(!empty($imagealt)){
		$imagealt = $imagealt;
	}else{ $imagealt = $name; } 
	
	include "templates\home2.template.php";
	
		}
		
		echo '<a href="'.$more.'"><div><h3>More...</h3></div>';
	}
	
	

}




function is_homepage(){
	
	$home = $_SERVER["PHP_SELF"];
	$home = basename($home, ".php");
	
	if(empty($_GET["page"]) || $_GET["page"] == 1 && $home == "index"){
		return true;
	}
	
	return false;
}



?>