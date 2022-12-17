<?php
include'head/header.php';
session_start();
if(isset($_SESSION["adminauth"])){
	echo'
	<script>
	
	setTimeout("Dash()");
	function Dash(){
		window.location = "index.php";
	}
	</script>
	';
}

$error = "";
$username = $password = " ";

if(isset($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["submitx"])){
	
	include 'head/connection.php';
	
	
	function Secure($value){
		$value = trim($value);
		$value = strip_tags($value);
		$value = stripslashes($value);
		$value = htmlspecialchars($value);
		return $value;
	}
	
	define('PASS_SALT', '$5$ro$manusesomejustsillywantstringvincforsaltback$');
	
	
	
$name = Secure($_POST["username"]);



if(!empty($name)){

	$check = $conn->query("SELECT `username` FROM `admin`");
	$ft = $check->fetch_assoc();
	$singlename = $ft["username"];
	
	
	if($name == $singlename){
	
	$query = $conn->query("SELECT `username`, `pass` FROM `admin` WHERE `username` = '$name'");
	if($query == true){
		$fetch = $query->fetch_assoc();
		$username = $fetch["username"];
		$pass = $fetch["pass"];
		
		if($name == $username){
			
			$password = $_POST["password"];
			
			$adminuser = $username;
			
			if(password_verify($password, $pass)){
	
			$_SESSION["adminauth"] = $adminuser;
			
			header("Location: index.php");
			
			}else{  $error = "Password Is Not Correct";   }
			
			
		}
		
	}else{  $error = "Username/Password Not Found";   }
	
}else{  $error = "Username/Password Not Found";   }
	
}else{ $error = "Username Is Empty";  }


}

?>







 
 <body class="nav-md theme-green">
 <div class="main-container login-register">
    <div class="d-flex justify-content-center h-100vh w-100 align-items-center">
	

 
         <div class="login-container">
            <div class="form-container">
				<?php if($error){
	
echo "<div class='alert alert-danger'>$error</div><br>";


 }else{ echo"";  }  ?>
                <div class="text-center logo-container">
                    <a href="/"><span class="icon-admin-logo text-theme logo"></span></a>
                </div>
                <h4 class="text-center">Log in to your accaunt</h4>
                <form action="<?php htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST" class="material-form">
                    <div class="form-group floating-label">
                        <input type="text" name="username" class="form-control" id="username">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-group floating-label">
                        <input type="password" name="password" class="form-control" id="password">
                        <label for="password">Password</label>
                        
                    </div>
                    <div class="form-check">
                        <div class="custom-control custom-checkbox material-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                            <label class="custom-control-label" for="rememberMe">Remember me</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submitx" class="btn btn-theme ripple btn-raised btn-block btn-submit">
                            <span>Log in</span>
                        </button>
                    </div>
                    <div class="form-group mb-0">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include"footer.php";  ?>