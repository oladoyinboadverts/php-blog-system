<?php

include 'head.php';


echo"
<style>
body{
position:relative;	
}

h1{
	font-size:200px;
text-align:center;	
position:absolute;
top:100px;
bottom:50px;
right:50px;
left:50px;
transition:color 3s ease-in-out;
animation: moves 2s infinite;
}

@keyframes moves {
	from{
		font-size:200px;
		text-align:center;
		color:blue;
	top:100px;
bottom:50px;
right:50px;
left:50px;
	}
	to{
		font-size:190px;
		text-align:center;
		color:red;
	top:100px;
bottom:50px;
right:50px;
left:50px;

	}
}

h1:hover{
color:red;
}

</style>
<body>



";


//404 page

echo"<h1>404</h1>";

include'foot.php';

?>