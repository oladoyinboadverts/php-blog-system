<!DOCTYPE html>
<head><title>Code</title></head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<body>

<form>

<input type="text" placeholder="Enter Name">
<input type="text" placeholder="Enter Level">
<input type="submit" class="submit">
</form>

<script>
$(document).ready(function() {
    $("form .submit").ready(function(e){
		e.preventDefault();
		$.ajax({
			method: "POST"
			url: "https://127.0.0.1/blog/codetest.php"
			async: "true"
		});
		
.done(function(msg){
	alert("Sent Successfully" + msg);
})
	});
});

</script>
</body>


<?php

echo $x = date("Y-m-d");

echo $y = strtotime($x);

echo $to = date("y M", $y);





	?>










