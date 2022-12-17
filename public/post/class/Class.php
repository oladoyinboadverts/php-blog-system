<?php
include '../settings/info.php';
//class 

class Db{
public $host;
public $user;
public $password;
public $database;

function __construct($host, $user, $password, $database){
$this->host = $host;
$this->user = $user;
$this->password = $password;
$this->database = $database;
}	
function Database($host, $user, $password, $database){
$connection = mysqli_connect($host, $user, $password, $database) or die("ERROR:" .mysqli_connect_error());
}
}






class Comment{
	public $id;

function CommentBox($id, $cbox, $site){
	if($cbox == "Enable"){
	echo "<h3>Make Comment</h3>";
	
	echo "<form action='".htmlentities($site.'go/post-comment')."' method='POST'>
	<input type='hidden' name='cid' value='".$id."' required>
	<label for='name'>Enter Name</label><br/>
	<input type='text' name='name'  placeholder='Enter Name' class='i'/><br/><br/>
	
	<label for='comment'>Comment</label><br/>
	<textarea name='comment' class='content' required></textarea><br/><br/>
	
	<input type='submit' name='submit'>
	
	</form><br/><hr/>
	";
}elseif($cbox == "Disable"){
echo "";	
	
}
}
	
}



?>