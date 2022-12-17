<?php

include 'info.php';
include 'class/class.php';
include 'connection.php';
include 'functions/function.php';
include 'head.php';



?>


<?php
echo "<form action='go/search/' method='GET'>
<input type='text' placeholder='Search Query' name='s'>
<input type='submit'>
</form><br/>

";

echo "<div class='menu'><h2>POSTS</h2>";



//page limit query
$pgl = $conn->query("SELECT * FROM `options`");
$flimit = $pgl->fetch_assoc();
$limit = $flimit["indexno"];
if($limit != 0){
 (int) $post_limit = $limit;
}elseif($limit == 0){
	(int) $post_limit = 5;
}






if(empty($_GET["page"]) || (int)$_GET["page"] == 1){
  
       $query = $conn->query("SELECT * FROM `posts` ORDER BY `date` DESC LIMIT $post_limit");
       $check = $query->num_rows;

       if($check > 0){

       for ($id=0; $id < $check; $id++){
       $row = $query->fetch_assoc();
	   
	   $pid = $row["id"];
	   $name = $row["name"];
	   $category = ucwords($row["category"]);
	   $content = $row["content"];
	   $image = $row["image"];
	   $imagealt = $row["imagealt"];
	   $dateraw = $row["date"];
	   $date = date("d M, Y", $dateraw);
	   $date2 = date("d M", $dateraw);
	   
	   
	   
//select image and site url from settings table
	$msql = "SELECT * FROM `settings`";
	$imgquery= mysqli_query($connect, $msql);
	$imgfetch = mysqli_fetch_assoc($imgquery);
	$imagedir = $imgfetch['imagedir'];
	$siteurl = $imgfetch["siteurl"]; 
	$pn = format_to_url($name);
	$postlink = "{$siteurl}{$pid}-{$pn}/";
	   $imagelink = "{$imagedir}{$image}";
	
	//little check on if image alt is empty
	if(!empty($imagealt)){
		$imagealt = $imagealt;
	}else{ $imagealt = $name; } 
	
	//posts output
	include ("templates/home.template.php");
	
	   }
	
	}
     else{
	echo "No Post Yet";
	}
	}
	
	
elseif(!empty($_GET["page"]) && (int)$_GET["page"] > 1){
	$page_number = (int)$_GET["page"];
	$offset = $page_number - 1;
	(int)$offset = $offset * $post_limit;
	(int)$offset = floor($offset);
	
	
	$query = $conn->query("SELECT * FROM `posts` ORDER BY `date` DESC LIMIT $offset, $post_limit");
	(int)$check = $query->num_rows;

	if($check > 0){
	
	for($x = 0; $x < $check; $x++){
		$row = $query->fetch_assoc();
		
		 $pid = $row["id"];
	   $name = $row["name"];
	   $category = ucwords($row["category"]);
	   $content = $row["content"];
	   $image = $row["image"];
	   $imagealt = $row["imagealt"];
	   $dateraw = $row["date"];
	   $date = date("d M, Y", $dateraw);
	   $date2 = date("d M", $dateraw);
	   
	   
	   
//select image and site url from settings table
	$msql = "SELECT * FROM `settings`";
	$imgquery= mysqli_query($connect, $msql);
	$imgfetch = mysqli_fetch_assoc($imgquery);
	$imagedir = $imgfetch['imagedir'];
	$siteurl = $imgfetch["siteurl"]; 
	$pn = format_to_url($name);
	$postlink = "{$siteurl}{$pid}-{$pn}/";
	   $imagelink = "{$imagedir}{$image}";
	
	//little check on if image alt is empty
	if(!empty($imagealt)){
		$imagealt = $imagealt;
	}else{ $imagealt = $name; } 
	
	//posts output
	include ("templates/home.template.php");
		
	}
	
	}else{
		Redirect("404.php", "100");
	}
	
}


echo"</div>";


?>

<center> 

<?php

//homepage pagination

if(isset($_GET["page"])){
	$page_number = $_GET["page"];
}else{
	$page_number = 1;
}


$sqr = $conn->query("SELECT * FROM `settings`");
$settings = $sqr->fetch_assoc();


 if($page_number > 1): ?><a href="<?=$settings["siteurl"];?>page/<?=$page_number-1?>/">Previous </a><?php endif; ?> <?php
 
$query = $conn->query("SELECT * FROM `posts`");
$total = $query->num_rows;
$final = ceil($total / $post_limit);

 if($page_number < $final): ?><a href="<?=$settings["siteurl"];?>page/<?=$page_number+1?>/">Next</a><?php else: ?><a></a><?php endif; ?></center>



<?php


//more posts
if(is_homepage()){
get_post_by_category("music", "5", "section/music/", $conn);
}

if(is_homepage()){
get_post_by_category("news", "5", "section/music/", $conn);
}

if(is_homepage()){
get_post_by_category("lyrics", "5", "section/music/", $conn);
}
	



?>






</body>




<?php include 'foot.php'; ?>