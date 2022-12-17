<?php
include_once "header.php";
include_once "head/connection.php";
include_once "functions/function.php";

//options for number of category posts, tags post, related post limit, recent posts limit

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comment"]) && isset($_POST["relatedb"]) && is_numeric($_POST["category"]) && is_numeric($_POST["tags"]) && is_numeric($_POST["recent"]) & is_numeric($_POST["related"]) && is_numeric($_POST["homepage"])){
	
	(int)$homepage = $_POST["homepage"];
	(int)$category = $_POST["category"];
	(int)$tags = $_POST["tags"];
	(int)$recent = $_POST["recent"];
	(int)$related = $_POST["related"];
	$commentb = $_POST["comment"];
	$relatedb = $_POST["relatedb"];
	$views = $_POST["views"];
	
	if($views == "Enable"){
	$views = "1";
	}elseif($views = "Disable"){
	$views = "0";
}
	

	//try this query, if there is error, then catch exception $e
	try{
		
	$query = $conn->query("UPDATE `options` SET `indexno` = '$homepage', `categoryno` = '$category', `tagsno` = '$tags', `recentno` = '$recent', `relatedno` = '$related', `commentbox` = '$commentb', `related` = '$relatedb', `views` = '$views'");
	if($query){
		echo'<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>SUCCESS :</strong>Updated Successfully</div> ';
		
        Admin\Functions\Redirect("article.system.php");		
						
	}
	
	}
	catch(exception $e){
		throw $e;
		
		return false;
	}
}
?>

<div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Article System</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- START breadcrumb -->
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.php">Home</a></li>
                            
                          
							<li class="active">Article System</li>
                        </ol>
                        <!-- END breadcrumb -->
                    </div>
                    
                </div>
                <!-- END PAGE COVER -->
				


<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">
							
<?php 
$vl = $vr = $rle = $rld =$vid = $vie = "";

$query = $conn->query("SELECT * FROM `options`");
$ft = $query->fetch_assoc();
$homepage = $ft["indexno"];
$category = $ft["categoryno"];
$tags = $ft["tagsno"];
$related = $ft["relatedno"];
$recent = $ft["recentno"];

//comments/related/views section options
$comment = $ft["commentbox"];
$relatedb = $ft["related"];
$views = $ft["views"];

if($comment == "Enable"){
	$vl = "selected";
	$vr = " ";
	} 
	elseif($comment == "Disable"){
		$vl = "";
		$vr = "selected";
	}
	
if($relatedb == "Enable"){
$rle = "selected";
$rld = " ";
}elseif($relatedb == "Disable"){
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

?>							
							
<div class="form-group">

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<label for="comment">Comment Box:</label>
<select name="comment" class="custom-select">
<option <?=$vl?>>Enable</option>
<option <?=$vr?>>Disable</option>
</select><br/><br>



<label for="name">Post Views:</label>
<select name="views" class="custom-select">
<option <?=$vie?>>Enable</option>
<option <?=$vid?>>Disable</option>
</select></br><br>



<label for="number">Number Of Posts Per Page In Homepage (Default: 5):</label>
<input type="number" name="homepage" value="<?=$homepage?>" class="form-control" ><br/><br/>


<label for="number">Number Of Category Posts Per Page (Default: 5):</label>
<input type="number" name="category" value="<?=$category?>" class="form-control"><br/><br/>


<label for="number">Number Of Tags Posts Per Page (Default: 5):</label>
<input type="number" name="tags" value="<?=$tags?>" class="form-control" ><br/><br/>

<label for="name">Related Post:</label>
<select name="relatedb" class="custom-select">
<option <?=$rle?>>Enable</option>
<option <?=$rld?>>Disable</option>
</select><br/><br>
<label for="number">Number Of Related Posts Per Page (Default: 5):</label>
<input type="number" name="related" value="<?=$related?>" class="form-control"><br/><br/>


<label for="number">Number Of Recent Posts Per Page (Default: 5):</label>
<input type="number" name="recent" value="<?=$recent?>" class="form-control"><br/><br/>
<input type="submit" value="Update Settings" class="btn btn-success">

</form></div><br/><br/><hr>



</div>
</div>
</div>
</div>
</div>


<?=include "footer.php"?>