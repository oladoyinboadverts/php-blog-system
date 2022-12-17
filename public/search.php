<?php
//search page

$info = $_GET['s'];

include 'connection.php';

include 'head.php';

include 'functions/function.php';

include 'class/class.php';




if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['s'])){
	
$info = trim($_GET["s"]);

$info = filter_var($info, FILTER_SANITIZE_SPECIAL_CHARS);

$sql = "SELECT * FROM `posts` WHERE `name` LIKE '%$info%' ORDER BY `date` DESC"; 

$query = $conn->query($sql);

if($query){
	
$check = $query->num_rows;
	
//search page class
$searchPage = new Blog\Home\SearchPage($info, $check, $query, $conn);


//search page model 
include "Model/Searchpage.model.php";
	


}

}else{
	
	echo "<form action='' method='GET'>
<input type='text' placeholder='Search Query' name='s'>
<input type='submit' name='submit'>
</form><br/>

";

}

include 'foot.php';

?>