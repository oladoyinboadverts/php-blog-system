<?php
include"header.php";

if(isset($_SERVER["REQUEST_METHOD"]) == "POST"  && isset($_FILES["image"]) && isset($_POST["submit"])){
	
	include'head/connection.php';
	
	$sql = "SELECT `imagedir` FROM `settings`";
	
	$query = $conn->query($sql);
	$fetch = $query->fetch_assoc();
	
	$imagedir = $fetch["imagedir"];
	
	
		$image = $_FILES["image"];
		
		$filename = $_FILES["image"]["name"];
		$filetmp = $_FILES["image"]["tmp_name"];
		
		$file_ext = explode(".", $filename);
		
		$newfile = uniqid()."_".time().".".strtolower($file_ext[1]);
		
		$uploadloc = "../static/".$newfile;
		
		
		if(file_exists($uploadloc) == false){
			
			move_uploaded_file($filetmp, $uploadloc);
			
			echo'<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>SUCCESS :</strong> Image File ('.$newfile.') Uploaded Successfully. 
                                </div>';
			
			echo'
			<script>
			setTimeout("Redirect()", 2000);
			function Redirect(){
				window.location = "filemanager.php";
			}
			</script>
			';
			
		}else{
			"image is already available";
		}
		
		

	
}else{
	exit("NO IMAGE SELECTED");
}
	


include'footer.php';

?>