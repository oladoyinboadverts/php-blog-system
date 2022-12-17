<?php



// ***** comment function *******
function ViewComments($id){
	include '../info.php';
$conn = mysqli_connect($bhost, $buser, $bpassword, $bdatabase);
$sql ="SELECT `name`, `comment`, `date` FROM `comments` WHERE `cid` = $id";

$query = mysqli_query($conn, $sql);
$check = mysqli_num_rows($query);


//check whether comments exist
if($check > 0){
	
	//frontend comments heading  
	
echo"<h4>COMMENTS (".$check.")</h4><br/>";
	
	//outputting all values from comment table
 for($x = 0; $x < $check; $x++){
$row = mysqli_fetch_assoc($query);

//converting comments to bin values and striping slashes from comments
$name= $row['name'];
$comment = $row['comment'];
$date = $row['date'];
$date = date("d M", $date);

 
 
 	include "../templates/comment.template.php";


	}
	
	mysqli_free_result($query);	
	
}else{
	
echo "";	
}
}


//***** tags function ********
function Tags($values){
	include '../info.php';
$conn1 = mysqli_connect($bhost, $buser, $bpassword, $bdatabase);

//getting siteurl from setings table
$tql = "SELECT * FROM `settings`";
$tquery = mysqli_query($conn1, $tql);
$tf = mysqli_fetch_assoc($tquery);
$siteurl = $tf['siteurl'];

//tags heading in frontend
echo "<b>TAGS:</b>  ";	

//exploding inputed tags value
$value = explode(", ", $values);

//running query for array value and imploding the url after explosion
for ($x = 0; $x < count($value); $x++){
	
$tagurl = implode("-", explode(' ', $value[$x]));
$url = "{$siteurl}tag/{$tagurl}/";

include "../templates/tag.single.template.php";

}
	
}





//redirect function
function Redirect($val){
	echo'
	<script>
	setTimeout("Redirect()");
	function Redirect(){
		window.location = "'.$val.'";
	}
	</script>
	';
}
       

function format_2_url($val){
	$val = trim($val);
	$val = str_replace(array(',', '<', ':', ';', '"', '>', '/','-', '(', ')', '[', ']', '{', '}', '&', '!', '$', '+', '’', '‘'), '', $val);
	$val = str_replace(array("  ", "    "), "-", $val);
	$val = explode(" ", $val);
	$val = strtolower(implode("-", $val));
	return $val;
}
	   




?>