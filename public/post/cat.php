<?php



if(isset($_GET['id'])){
	
	$id = $_GET['id'];
	$id = explode("-", $id);
	$id = implode(" ", $id);
	
	
  include ('head/connection.php');
  include '../head.php';
  include 'functions/function.php';
  
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
$limit = $flimit["categoryno"];
if($limit != 0){
  $page_limit = $limit;
}elseif($limit == 0){
	$page_limit = 5;
}
  
  

  if(empty($_GET["page"]) || $_GET["page"] == 1){
	 
  	$sql = "SELECT * FROM `posts` WHERE `category` LIKE '%$id' LIMIT $page_limit";
	$asql = "SELECT `siteurl`,`imagedir`  FROM `settings`";
	
  
  $query = mysqli_query($connect, $sql);
  
  if($query){
	  
	  $check = mysqli_num_rows($query);
	  
	  
	  if($check > 0){
		 
	 
	include "../Model/Category.model.php";
	
	  }
	  
	  else{
		  
		    Redirect("/404.php");
			
		  die("No Posts Found");
		  
		
		  
	  }
  }
  
  
  else{
	 die(""); 
  } }
  
  elseif(!empty($_GET["page"]) && (int)$_GET["page"] > 1){
	 
	 
	 include "../Model/Category.pagination.model.php";
	 
	 
  }
  
   
  
  if(isset($_GET["page"])){
	  $page_number = $_GET["page"];
  }else{
	  $page_number = 1; 
  }
  
  $prev = $page_number-1;
  
 if($page_number > 1){
	 echo'<a href="'.$prev.'">Prev</a>';
 }
  
$query = $reconn->query("SELECT * FROM `posts` WHERE `category` LIKE '%$id'");
$check = $query->num_rows;

$total = $check/$page_limit;
$total = ceil($total);
$next = $page_number+1;

if(!isset($_GET["page"])){
	$txt = "page/";
}else{
	$txt = "";
}

if($total > $page_number){
	echo '<a href="'.$txt.$next.'">Next</a>
	';
}
  
  
  
  
  
  
  
	
}else{
	
 Redirect("/404.php");
	  
die("PAGE NOT FOUND");	
	
}




include '../foot.php';




?>