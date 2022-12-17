<?php
include'header.php';



//delete file
if(isset($_GET["delete"])){
	
	

$file = $_GET["delete"];

if(!unlink($file)){
	echo'<div class="alert alert-danger alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>ERROR :</strong>File Cannot Be Deleted
                                </div>';
	
}else{
	
echo'<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>SUCCESS :</strong>File ('.$file.') Has Been Deleted.
                                </div>';

echo'
<script>
setTimeout("Redirect()", 2000);
function Redirect(){
	
	window.location = "filemanager.php";
}
</script>


';								
}






	
}

//file edit 
if(isset($_GET['edit'])){
	
	echo'<div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Edit File</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- START breadcrumb -->
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.php">Home</a></li>
                            
                            <li class="active">Edit File</li>
                        </ol>
                        <!-- END breadcrumb -->
                    </div>
                    
                </div>
                <!-- END PAGE COVER -->
				


<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">';
	
	$edit = $_GET["edit"];
	$oldname = $_GET["edit"];
	
	
	
	
	echo'
	<form action="'.$_SERVER["PHP_SELF"].'" method="POST">
	<input type="hidden" value="'.$oldname.'" name="oldname">
	
	<label for="name">File Name:</label>
	<input type="text" class="form-control" name="fileedit" value="'.$edit.'"/><br>
	

	<center><button type="submit" name ="editsave" class="btn btn-success">Save Edit</button></center>
	
	</form>
	
	';
	
	
	
}


//rename file
if(isset($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST["oldname"]) && isset($_POST["fileedit"]) && isset($_POST["editsave"]) ){
	
$old = $_POST["oldname"];
$name = $_POST["fileedit"];


if(rename("../static/$old", "../static/$name") == true){

	echo '<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>SUCCESS :</strong>File Edited Successfully</div>';
									
									
	
	exit('
	<script>
	setTimeout("Return()", 2000);
	function Return(){
		
		window.location ="filemanager.php";
	}
	</script>
	
	');
	
	
	
}else{
	echo"File Cannot Be Edited";

}


	
}




echo'</div></div></div></div></div>';

include'footer.php';
?>