<?php

require 'connection.php';

$nameErr = $passwordErr = "";

include_once "auth.php";

if(isset($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["submit"])){
define("PASS_SALT", "S/?DELAJA2KPK6291@OLADOYIN%VINCENT#258&@nJkPx");

$username = strtolower(trim($_POST["username"]));
$password = crypt($_POST["password"], PASS_SALT);

$query = $conn->query("SELECT * FROM `users`");
$num = $query->num_rows;
for($x = 0; $x < $num; $x++){
$fetch = $query->fetch_assoc();
$name[] = $fetch["username"];
}

if(in_array($username, $name) == true){

$find = $conn->query("SELECT `password`, `fullname` FROM `users` WHERE `username` = '$username'");
$get = $find->fetch_assoc();
$p = $get["password"];
$fullname = $get["fullname"];

if(!empty($password)){
	
//final login confirmaation
if($password != $p){
$passwordErr = "Invalid Password!";	
}

elseif($password == $p){
	
	$_SESSION["username"] = $username;
	
	header("Location: member/dashboard.php");
	
}
//
}else{
	$passwordErr = "Input a password!";
}
}
elseif(in_array($username, $name) == false){
$nameErr = "Invalid Username";
}


}






?>


<form action="<?php $_SERVER["PHP_SELF"];  ?>" method="POST">
<label for="username">UserName: </label>
<input type="text" name="username" placeholder="Enter Name" required /> <?php echo "<b style='color:red;'>$nameErr</b>"; ?><br/><br>

<label for="password">Password: </label>
<input type="password" name="password" placeholder="Enter Password" required /> <?php echo "<b style='color:red;'>$passwordErr</b>"; ?><br/><br>

<input type="submit" name="submit" />
</form>




<?php
include_once"foot.php";

?>