<?php
include '../info.php';
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



class PostData{
	
public $name;
public $category;
public $content;

function __construct($name, $category, $content){
$this->name = $name;
$this->category = $category;
$this->content = $content;
}	

function GetPost($name, $category, $content){
	
	echo "<h2 class='heading'>".$this->name."</h2><br/>";
	
	echo "<h3 class='subheading'>".$this->category."</h3><br/>";
	
	echo "<p class='content'>".$this->content."</p>";
	
	
}

}


class Comment{
	public $id;

function CommentBox($id){
	echo "<form action='/blog/post-comment.php' method='POST'>
	<input type='hidden' name='cid' value='".$id."'>
	<label for='name'>Enter Name</label><br/>
	<input type='text' name='name'  placeholder='Enter Name' class='i'/><br/><br/>
	
	<label for='email'>Enter Email (it will kept private)</label><br/>
	<input type='email' name='email' placeholder='Email' class='i'/><br/><br/>
	
	<label for='comment'>Comment</label><br/>
	<textarea name='comment' class='content'></textarea><br/><br/>
	
	<input type='submit' name='submit'>
	
	</form>
	";
}

}


?>