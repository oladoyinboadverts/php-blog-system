<?php

include"auth/blade.auth.php";

if(isset($_GET['id'])){

include 'head/connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM `posts` WHERE `id` = $id";
$query = mysqli_query($connect, $sql);

if($query == true){
echo "DELETED SUCCESSFULLY";

}
else{
echo "ERROR OCCURED";

}



}


?>