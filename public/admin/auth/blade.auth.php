<?php
session_start();

if(!isset($_SESSION["adminauth"])){
	exit(header("Location: ./login.auth.php"));
}



?>