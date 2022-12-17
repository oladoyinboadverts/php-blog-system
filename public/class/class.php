<?php
namespace Blog\Home;

include './info.php';
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



//Comment Class
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




class SearchPage{
	
	public $info;
	public $check;
	public $conn;
	protected $query;
	
	
	
	function __construct($info, $check, $query, $conn){
		$this->info = $info;
		$this->check = $check;
		$this->query = $query;
		$this->conn = $conn;
	}
	
	
function searchbox(){
printf("<h1>YOU SEARCHED FOR: %s</h1><br/><hr>
	
	<form action='' method='GET'>
	
	<input type='text' placeholder='%s' name='s'>
	<input type='submit'>
	</form><br/><hr>
	
	<div style='background-color:blue;color:white;padding:10px;'>%s Search Term Found.</div><br/><hr>
	", $this->info, $this->info, $this->check);
}	

function searchresult(){
	$conn = $this->conn;
for($x = 0; $x < $this->check; $x++){

$get = $this->query->fetch_assoc();

$id = $get['id'];
$name = $get['name'];
$url = format_to_url($name);

//settings query
$squery = $conn->query("SELECT * FROM `settings`");
$fetch = $squery->fetch_assoc();
$siteurl = $fetch["siteurl"];
$url = "{$siteurl}{$id}-{$url}";

include "./templates/searchpage.template.php";

	}
	
}
	
}







?>