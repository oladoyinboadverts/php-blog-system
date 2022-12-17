<?php

require "autoload.php";

$query = $conn->query("SELECT * FROM `users` WHERE `username` = '$username'");
$fetch = $query->fetch_assoc();
$name = $fetch["fullname"];

echo'<style>


body{
background-color:rgb(244,248,251);
position:relative;	
}



.heading{
margin-right:90px;
float:right;
display:flex;
flex-direction:row;	
}

#menu{
	display:none;
}

#dropdown-item{
	display:none;
}


.headerbtn{
	color:white;
	background-color:black;
	margin-right:10px;
	padding:6px;
	border-radius:3px;
}

.heading > b{
	margin: 6px;
}

.row{	
	display:flex;
	flex-wrap:wrap;
}

.row > div {
background-color:rgb(255,255,255);
flex:40%;
width:50%;
margin: 30px;
border: 2px; solid rgb(244,248,251);
padding:30px;
position:relative;
box-shadow: 4px 2px 7px 1px #727989;
}

.row > div > i{
	background-color:rgb(244,248,251);
	padding:30px;
	box-shadow: 1px 1px 4px 1px #727989;
}

.row > div > .no2{
	background-color:blue;
	color:white;
	margin-top:20px;
	padding: 8px;
	float:right;
}

.row > div > .no1{
	margin-top:20px;
	padding: 8px;
	float:right;
}

form > .email {
	rows: 50px;
	cols: 90px;
	border: 2px solid blue;
	padding:10px 90px;
	border-radius:1px;
	
	box-shadow:1px 1px black;
}

form > button{
	background-color:blue;
	color:white;
	padding:10px;
	font-weight: 1000;
}

h3{
	font-weight: 1000;
}

.callback{
	background-color:blue;
	color:white;
	border: 2px solid black;
	padding:10px;
}

.subscribe{
display:none;
padding:20px;
box-shadow: 4px 2px 7px 1px #727989;
background-color:white;
border: 1px solid blue;
width:95vw;
position:center;
}

.datashow{
	display:block !important;
}


@media(max-width: 900px){
.heading{
display:none;
}	

#menu{
	background-color:black;
	color:white;
	display: block;
	margin:10px;
	padding:40px;
	box-shadow: 4px 2px 3px rgb(49,66,99);
	position:relative;
}

#menu > b > a > .right{
	float: right;
	color:white;
}

#menu > b > i{
	
}

#dropdown-item{
	display:none;
	flex-direction:colomn;
	flex-wrap:wrap;
	item-align:center;
	text-align:center;
	background-color:black;
	margin:9px;
}

.show{
	display:flex !important;
}



#dropdown-item > b{
	border: 2px solid white;
	color:white;
	flex:100%;
	padding:20px;
}

#dropdown-item > b > a{
	color:white;
	text-decoration:none;
}

form > .email {
	rows: 50px;
	cols: 50px;
	border: 2px solid blue;
	padding:10px 70px;
}

form > button{
	background-color:blue;
	color:white;
	padding:10px;
	font-weight: 1000;
}

h3{
	font-weight: 1000;
}

.subscribe{
display:none;
padding:20px;
box-shadow: 4px 2px 7px 1px #727989;
background-color:white;
border: 1px solid blue;
position:absolute;
width:92%;
z-index:10;
top:50;
bottom:0;
right:40;
left:40;
}

}



</style>
';


echo '
<div class="container">
<h3>  
<div class="heading" style="">
<b>Home</b>
<b>Members</b>
<b>Preference</b>
<b><a href="#" data-item="logout.php" id="logout"><b class="headerbtn"><i class="fa fa-sign-out"></i> Logout</a></b><br/><br/><br>
</div> 


<div id="menu">
<b><i class="fa fa-dashboard fa-2x"><small> Dashboard</small></i> <a href="#" id="drop"><i class="fa fa-th-large fa-2x right"></i></a></b></div></h3>

<div id="dropdown-item">
<b><a href="/">Home</a></b>
<b><a href="/">Members</a></b>
<b><a href="/">Preference</a></b>
<b><a href="#" data-item="logout.php" id="logout"><b class="headerbtn"><i class="fa fa-sign-out"></i> Logout</a></b>
</div>
 ';



?>


<br><div><h3 class="" style="margin-left:30px;">Welcome, <?php echo $name; ?></h3></div><br/>
<div class="row">
<div><i class="fa fa-user-circle fa-2x"></i>  <b class="no1">0 Comment Posted</b></div> 
<div><i class="fa fa-wrench fa-2x"></i>  <b class="no2"><a href="#" class="datasetting" data-set="#">Settings >></a></b></div> 

</div><br/><br/>

<div class="subscribe">
<h3 style="margin-left:30px;text-align:center;">Opt-In For News Update Via Mail</h3><br>
<center>
<div id="callback"></div>
<form>
<input type="email" class="email"/><br/><br>
<button type="submit">Subscribe For Latest Update</button>
</form></center>


</div>

</div>


<script>
$(document).ready(function(){
	$("#drop").on({ 
	
	click : function(){
	
		$("#dropdown-item").toggleClass("show");
	}
	});
	
	
	
	
	
	var Logout = $("#logout").attr("data-item");
	
	$("#logout").click(function(){
		
		window.title = "Logout";
		
		$(".container").load(Logout);
		
	});
	
	
	
	$("form .email").val("Email.....");
	
	$("form button").click(function(e){
		var Email = $(".email").val();
		
		
		e.preventDefault();
		
		$.ajax({
			url: "process.php",
			method: "POST",
			data: {
			email: Email,
            esubmit: "submit"		
			},
			
			success: function(data){
				$("#callback").html("<div class='callback'>" + data + "</div><br/><br>");
			}
			
			
		});
		
	});
	
	
	
	
$(".datasetting").css({"color" : "white",
"text-decoration" : "none"
});

$(".datasetting").click( function(e){
	e.preventDefault();
	$(".subscribe").toggleClass("datashow");
});
	
	
	
	
	
	
});

</script>