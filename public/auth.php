<?php


session_start();

if(isset($_SESSION["username"])){
	echo'
	<script>
	setTimeout("Redirect()");
	function Redirect(){
		window.location = "member/";
	}
	</script>
	';
}



?>