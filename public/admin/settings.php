<!DOCTYPE>
<html lang="en">
<head><title>SETTINGS</title>

<?php

	include 'head/connection.php';
	
	include 'header.php';
	
	

//admin settings
if(isset($_SERVER['REQUEST_METHOD']) && isset($_POST['submitx'])){
	
	
	
	$homepage = $_POST['homepage'];
	$separator = $_POST['separator'];
	$siteurl = $_POST['siteurl'];
	$metatags = $_POST['metatags'];
	$metadesc = $_POST['metadesc'];
	$metauser = $_POST['metauser'];
	$copyright = $_POST['copyright'];
	$imagedir = $_POST['imagedir'];
	$headercode = mysqli_real_escape_string($connect, $_POST['headercode']);
	$footercode = mysqli_real_escape_string($connect, $_POST['footercode']);
	
	$sql = "UPDATE `settings` SET `homepage` = '$homepage', `sep` = '$separator', `siteurl` = '$siteurl', `metatags` = '$metatags', `metadesc` = '$metadesc', `metauser` = '$metauser', `copyright` = '$copyright', `imagedir` = '$imagedir', `headercode` = '$headercode', `footercode` = '$footercode'";
	
	$query = mysqli_query($connect, $sql);
	
	if($query){
	echo '<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong> Updated Successful </strong></div>';
									
								echo('
								<script>
								setTimeout("Redirect()", 2000);
								function Redirect(){
									window.location = "settings.php";
								}
								</script>
								
								');
	}else{
		echo '<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>Update Failed Due To Some Errors!</strong></div>';
	}
	
	



}
?>
	
	
	<?php
	
	echo' <div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Settings</h4>
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
	
	$sql = "SELECT * FROM `settings`";
	$query = mysqli_query($connect, $sql);
	
	if($query){
	
	$row = mysqli_fetch_assoc($query);
	
	$home = $row['homepage'];
	$sep = $row['sep'];
	$siteurl = $row['siteurl'];
	$desc = $row['metadesc'];
	$metatags = $row['metatags'];
	$user = $row['metauser'];
	$copyright = $row['copyright'];
	$imagedir = $row['imagedir'];
	$headercode = $row['headercode'];
	$footercode = $row['footercode'];

	

echo'
<form action="'.$_SERVER["PHP_SELF"].'" method="POST">
<label for="name">HOMEPAGE TITLE:</label>
<input type="text" value="'.$home.'" class="form-control" name="homepage"><br/><br/>

<label for="name">SEPARATOR:</label>
<input type="text" value="'.$sep.'" class="form-control" name="separator"><br/><br/>

<label for="name">SITE URL:</label>
<input type="text" value="'.$siteurl.'" class="form-control" name="siteurl"><br/><br/>

<label for="name">IMAGE DIRECTORY:</label>
<input type="text" value="'.$imagedir.'" class="form-control" name="imagedir"><br/><br/>


<label for="metatags">METATAGS:</label>
<input type="text" value="'.$metatags.'" class="form-control" name="metatags"><br/><br/>

<label for="name">META DESCRIPTION:</label>
<input type="text" value="'.$desc.'" class="form-control" name="metadesc"><br/><br/>

<label for="name">META AUTHOR:</label>
<input type="text" value="'.$user.'" class="form-control" name="metauser"><br/><br/>

<label for="name">COPYRIGHT:</label>
<input type="text" value="'.$copyright.'" class="form-control" name="copyright"><br/><br/>

<h3><i class="fa fa-code"></i> HEADER/FOOTER CODE</h3><hr><br/>

<label for="headercode">Custom HTML Header Code:</label>
<textarea name="headercode" class="form-control">'.$headercode.'</textarea><br/><br/>

<label for="footercode">Custom HTML Footer Code:</label>
<textarea name="footercode" class="form-control">'.$footercode.'</textarea><br/><br/><hr>

<center><input type="submit" class="btn btn-success" name="submitx"></center>

</form>';

	}







echo"</div></div></div></div></div>";

include 'footer.php';

?>

?>