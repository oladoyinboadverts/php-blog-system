 <?php
 
 $squery = $reconn->query("SELECT `siteurl`,`imagedir`  FROM `settings`");
	  $sfetch = $squery->fetch_assoc();
	  $siteurl = $sfetch["siteurl"];
	  $imgurl = $sfetch["imagedir"];
	  
	  $id = $_GET['id'];
	$id = explode("-", $id);
	$id = implode(" ", $id);
	  $pageid = $_GET["page"];
	  
	  $page = $pageid - 1;
	 $start_from = $page_limit * $page;
	 
	 $query2 = $reconn->query("SELECT * FROM `posts` WHERE `category` LIKE '%$id' LIMIT $start_from, $page_limit");
	 $check = $query2->num_rows;
	 
	 for($x=0; $x < $check; $x++){
	 $fetch = $query2->fetch_assoc();
	 
	$pid = $fetch['id'];
		$name = $fetch['name'];
		$img = $fetch["image"];
		$imgalt = $fetch["imagealt"];
		$cat = $fetch["category"];
		$blogname = format_to_url($name);
		$imageurl = "{$imgurl}{$img}";
		$url = "{$siteurl}{$pid}-{$blogname}";
		
		
	    include "../templates/category.template.php";
  
	 }
	 
  ?>