<?php

if(isset($_SERVER["REQUEST_METHOD"])){
	$text = $_POST["name"];
	
	echo "Hello, ".$text;
}

?>