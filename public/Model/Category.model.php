<?php
 $aquery = mysqli_query($connect, $asql);
		  $fad = mysqli_fetch_assoc($aquery);
		  $siteurl = $fad['siteurl'];
		  $imgurl = $fad['imagedir'];
		  printf("<h2>Category: %s</h2><br/>", $id);
	  
	 for($x = 0; $x < $check; $x++){
		 
		$row =  mysqli_fetch_assoc($query);
		$pid = $row['id'];
		$name = $row['name'];
		$img = $row["image"];
		$imgalt = $row["imagealt"];
		$cat = $row["category"];
		$blogname = format_to_url($name);
	    $imageurl = "{$imgurl}{$img}";
		$url = "{$siteurl}{$pid}-{$blogname}";
		
		
        include "../templates/category.template.php";
		
		
	 }
	 
	 ?>