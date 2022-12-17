<?php

require 'head/connection.php';

include_once 'header.php';

echo'<div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Preferences</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- START breadcrumb -->
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.php">Home</a></li>
                            
                            <li class="active">Settings</li>
                        </ol>
                        <!-- END breadcrumb -->
                    </div>
                    
                </div>
                <!-- END PAGE COVER -->
				


<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">';


$vr = "";

if(isset($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST["comment"]) && isset($_POST["related"])){


$comment = $_POST["comment"];

$related = $_POST["related"];

$views = $_POST["views"];

if($views == "Enable"){
	$views = "1";
}elseif($views = "Disable"){
	$views = "0";
}
	


	
	
$sql = "UPDATE `options` SET `commentbox` = '$comment', `related` = '$related', `views` = '$views'";

$query = $conn->query($sql);

if($query){
	echo'<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>SUCCESS :</strong>Updated Successfully</div> ';
			echo'
			<script>
			setTimeout("Redirect()", 1000);
			function Redirect(){
				window.location = "options.php";
			}
			</script>
			
			';						
									
									
									
}else{
echo'<div class="alert alert-danger alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>ERROR :</strong>Error Occured</div>';
	
}



}




?>


<?php

$sql = "SELECT * FROM `options`";

$query = $conn->query($sql);

$fetch = $query->fetch_assoc();

$comment = $fetch["commentbox"];
$related = $fetch["related"];
$views = $fetch["views"];

if($comment == "Enable"){
	$vl = "selected";
	$vr = " ";
	} 
	elseif($comment == "Disable"){
		$vl = "";
		$vr = "selected";
	}
	
if($related == "Enable"){
$rle = "selected";
$rld = " ";
}elseif($related == "Disable"){
	$rle = " ";
	$rld = "selected";
}
	
if($views == "1"){
	$vie = "selected";
	$vid = " ";
}elseif($views == "0"){
	$vie = " ";
	$vid = "selected";
}


echo'

<form action="'.$_SERVER["PHP_SELF"].'" method="POST" class="form-control">

<label for="comment">Comment Box:</label>
<select name="comment" class="custom-select">
<option '.$vl.'>Enable</option>
<option '.$vr.'>Disable</option>
</select><br/><br>

<label for="name">Related Post:</label>
<select name="related" class="custom-select">
<option '.$rle.'>Enable</option>
<option '.$rld.'>Disable</option>
</select><br/><br>

<label for="name">Post Views:</label>
<select name="views" class="custom-select">
<option '.$vie.'>Enable</option>
<option '.$vid.'>Disable</option>
</select></br><br>

<center><input type="submit" class="btn btn-success"/></center>


</form>


';

echo'</div></div></div></div></div>';


include 'footer.php';

?>