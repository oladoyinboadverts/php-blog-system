<?php
session_start();
if(!isset($_SESSION["username"])){
exit(header("Location: ../login.php"));
}






?>