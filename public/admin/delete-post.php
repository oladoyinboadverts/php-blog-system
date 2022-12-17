<?php
include "auth/blade.auth.php";

if(isset($_GET["delete-post"])){

include 'head/connection.php';

$id = $_GET['delete-post'];

$sql = "DELETE FROM `posts` WHERE `id` = $id";
$query = mysqli_query($connect, $sql);

if($query == true){
echo "DELETED SUCCESSFULLY";

echo'
<script>
setTimeout("Redirect()", 1000);
function Redirect(){
	window.location = "posts.php";
}
</script>

';

}
else{
echo "POST CANNOT BE DELETED";

}

}

else{
	exit();
}


?>