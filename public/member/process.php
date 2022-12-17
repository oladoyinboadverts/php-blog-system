<?php
include 'autoload.php';

$email = $_POST["email"];


if(isset($email) && isset($_POST["esubmit"]) == "submit"){
	
	$query = $conn->query("UPDATE `users` SET `email` = '$email' WHERE `username` = '$username'");
	
	if($query){
		echo "Subscribed Successfully";
	}
	else{
		echo "An Error Occurred";
	}
}


?>