<?php
include '../info.php';
include'header.php';
include_once'functions/function.php';

echo'<div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Add New Post</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- START breadcrumb -->
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.php">Home</a></li>
                            
                            <li class="active">Add New Post</li>
                        </ol>
                        <!-- END breadcrumb -->
                    </div>
                    
                </div>
                <!-- END PAGE COVER -->
				


<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">';

//category update 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['edit']) && isset($_POST['csubmit'])){
	$conn = new mysqli($bhost, $buser, $bpassword, $bdatabase);
	
	$id = $_GET['edit'];
	$name = $_POST['cname'];
	$slug = $_POST['slug'];
	$desc = mysqli_real_escape_string($conn, $_POST['description']);
		 $slug1 = explode(" ", $slug);
         $slug2 = implode("-", $slug1);
         $slug = strtolower($slug2);
	


$sql = "UPDATE `category` SET `Name` = '$name', `slug` = '$slug', `description` = '$desc' WHERE `id` = $id";

$query = $conn->query($sql);
	
if($query){
	echo '<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>SUCCESS :</strong>Updated Successfully.
                                </div>';
	
  
	
	echo('<br><br><center><a href="create-category.php"><button class="btn btn-success">GO BACK TO CATEGORY</button></a>
</center>');

echo'<script>
setTimeout("redirect()", 1000);

function redirect(){
	window.location="create-category.php";
}
</script>';
}
else{ echo '<div class="alert alert-danger alert-raised mb-2" role="alert">
                                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Error :</strong> Not Updated
                                </div>';}
	
	
	

}



//category delete
elseif(isset($_GET['delete'])){
	
	$id = $_GET['delete'];
	
	$conn = new mysqli($bhost, $buser, $bpassword, $bdatabase);
	
	$sql = "DELETE FROM `category` WHERE `id` = $id";
	
	$query = $conn->query($sql);
	
	if($query){
	echo '<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>SUCCESS :</strong>Category Deleted Successfully.
                                </div>';	
		 
	
	echo('<br><br><center><a href="create-category.php"><button class="btn btn-success">GO BACK TO CATEGORY</button></a>
</center>');

echo'<script>
setTimeout("redirect()", 4000);

function redirect(){
	window.location="create-category.php";
}
</script>';
	}
	else{
		echo '<div class="alert alert-danger alert-raised mb-2" role="alert">
                                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Error :</strong> Category Not Deleted
                                </div>';
		
	}
	
}


//page edit
elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['esubmit']) && isset($_GET['pedit'])){
	
$conn = new mysqli($bhost, $buser, $bpassword, $bdatabase);

$id = $_GET['pedit'];
$name = $_POST['name'];
$slug = Admin/Functions/format_to_url($_POST['slug']);
$content = mysqli_real_escape_string($conn, $_POST['content']);

$psql = "UPDATE `page` SET `name` = '$name', `content` = '$content' WHERE `id` = $id";
$pquery = $conn->query($psql);
if($pquery){	
echo("<center><h1>Page Updated Successfully</h1><br/><br>
<a href='page.php'><button class='btn btn-success'>GO BACK TO PAGE</button></a>
</center>");

echo'<script>
setTimeout("redirect()", 4000);

function redirect(){
	window.location="page.php";
}
</script>';
}
else{
echo'  <div class="alert alert-danger alert-raised mb-2" role="alert">
                                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Error :</strong>Page Cannot Be Updated Due To Some Errors<br/>
									
									
                                </div>';	
}
	
}

//page delete
elseif(isset($_GET['pdelete'])){
$conn = new mysqli($bhost, $buser, $bpassword, $bdatabase);
$id = $_GET['pdelete'];	
$sql = "DELETE FROM `page` WHERE `id` = $id";

$delq = $conn->query($sql);
if($delq){
	echo'<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>SUCCESS :</strong><h1>POST DELETE SUCCESSFULLY</h1>.
                                </div>';
	
	echo('<br/><br><center><a href="page.php"><button class="btn btn-success">GO BACK TO PAGE</button></a>
</center>');

echo'<script>
setTimeout("redirect()", 4000);

function redirect(){
	window.location="page.php";
}
</script>';

}else{
	echo('<div class="alert alert-danger alert-raised mb-2" role="alert">
                                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong>Error :</strong> Page Not Deleted
                                </div>');
}

}


else{

echo'<script>
setTimeout("redirect()", 4000);

function redirect(){
	window.location="../404.php";
}
</script>';


}

echo'</div>
</div>
</div>
</div></div></div>
</div>';



include'footer.php';

exit();
die();
?>