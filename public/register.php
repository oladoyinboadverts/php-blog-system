<?php


require 'connection.php';

include_once "head.php";

include_once "auth.php";

define("PASS_SALT", "S/?DELAJA2KPK6291@OLADOYIN%VINCENT#258&@nJkPx");

$username = $fullname = $password = $nameErr = $fullnameErr = $passwordErr = "";

if(isset($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST["username"]) && isset($_POST["fullname"]) && isset($_POST["password"]) && isset($_POST["submit"])){
	

function validate($val){
$val = trim($val);
$val = strip_tags($val);
$val = stripslashes($val);
$val = htmlspecialchars($val); 

return $val;
}




if(!empty($_POST["username"])){
	
$nme = strtolower(trim($_POST["username"]));
$db = $conn->query("SELECT `username` from `users`");
	$num = $db->num_rows;
	
	for($x = 0; $x < $num; $x++){
		$fetch = $db->fetch_assoc();
		$uname[] = $fetch["username"];
	}
	
	if(in_array($nme, $uname) == false){
		$username = validate($nme);
		
	}elseif(in_array($nme, $uname) == true){
		$nameErr = "UserName Already Exist, Please Choose Another";
	}

}else{
	$nameErr = "UserName section is empty";
}


	
if(!empty($_POST["fullname"])){
	$fullname = validate($_POST["fullname"]);
}else{
	$fullnameErr = "Full Name section is empty";
}

if(!empty($_POST["password"])){
	$password = crypt($_POST["password"], PASS_SALT);
}else{
	$passwordErr = "Password section is empty";
}


	
if(!empty($username) && !empty($fullname) && !empty($password)){
$put = $conn->query("INSERT INTO `users`(`username`, `fullname`, `password`) VALUES ('$username', '$fullname', '$password')");

print $put == true ? "<center><h3>Form Submitted Successfully.</h3><br/><br>
<h4><a href='login.php'>Proceed To Login</a></h4></center>" : "Error Occurred";	

}else{
	echo "fix those errors";
}
	
}


?>


<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<label for="name">Username: </label>
<input type="text" name="username" placeholder="Enter UserName" required > <?php echo $nameErr; ?> <br/>

<label for="name">Full Name: </label>
<input type="text" name="fullname" placeholder="Enter Full Name" required > <?php echo $fullnameErr;  ?><br/>

<label for="password">Password: </label>
<input type="password" name="password" placeholder="Enter Password" required ><?php echo $passwordErr;   ?><br/>

<input type="submit" name="submit" value="Submit" required />

</form>








<?php

include_once'foot.php';

?>