<?php
namespace Admin\Functions;

function Data($name, $category, $content, $id){
	echo'<li>
	<a href="post/view-blog.php/?id='.$id.'">'.$name.'</a> ('. $category.') (<a href="admin/delete-post.php?id='.$id.'">Delete</a>)</li>
	';
}


//redirect function
function Redirect($val){
	echo'<script>
	setTimeout("redirect()");
	function redirect(){
		window.location = "'.$val.'";
	}
	</script>
	';
}


//url format conversion
function format_to_url($val){
	$val = trim($val);
	$val = str_replace(array(',', '<', ':', ';', '"', '>', '/','-', '(', ')', '[', ']', '{', '}', '&', '!', '$', '+', '’', '‘'), '', $val);
	$val = str_replace(array("  ", "    "), "-", $val);
	$val = explode(" ", $val);
	$val = strtolower(implode("-", $val));
	return $val;
}



?>