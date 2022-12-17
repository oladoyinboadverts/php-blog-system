<?php include'header.php'; ?>


							
						<?php if(!isset($_GET["edit"]) && !isset($_GET["delete"])): ?>	
						<div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Add New Category</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- START breadcrumb -->
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.php">Home</a></li>
                            
                            <li class="active">Add New Category</li>
                        </ol>
                        <!-- END breadcrumb -->
                    </div>
                    
                </div>
                <!-- END PAGE COVER -->
				


<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">
						
							 <div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<label for="cname">Category Name:</label><br/>
<input type="text" placeholder="Enter Name" class="form-control" name="cname" required><br/>
<label for="slug">Slug:</label><br/>
<input type="text" class="form-control" placeholder="Enter Slug" name="slug" ><br/>
<label for="description">Description:</label><br/>
<textarea name="description" class="form-control"></textarea><br/><br/>
<input class="btn btn-block btn-success" type="submit" name="submit">

</form>
</div>

<?php endif;  ?>
 

<?php
include 'head/connection.php';
include'functions/function.php';

 
if(isset($_POST['submit'])){

$name = $_POST['cname'];
$desc = $_POST['description'];
$slug = $_POST['slug'];

$slug1 = explode(" ", $slug);
$slug2 = implode("-", $slug1);
$slug = strtolower($slug2);

$sql = "INSERT INTO `category` (`name`, `slug`, `description`) VALUES ('$name', '$slug', '$desc')";

$query = mysqli_query($connect, $sql);
if($query){
echo "successful";

Redirect("create-category.php");

}
else{
echo "not successful";
}	

exit();

}





//edit category
if(isset($_GET['edit'])){
	echo'<div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Edit Category</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- START breadcrumb -->
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.php">Home</a></li>
                            
                            <li>Add New Category</li>
							<li class="active">Edit</li>
                        </ol>
                        <!-- END breadcrumb -->
                    </div>
                    
                </div>
                <!-- END PAGE COVER -->
				


<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">';
	
$result = [];
$eid = $_GET['edit'];
$edits = "SELECT * FROM `category` WHERE `id` = $eid";
$editq = mysqli_query($connect, $edits);
$editrn = mysqli_num_rows($editq);
if($editrn > 0){
	$fetch = mysqli_fetch_assoc($editq);
	$id = $fetch['id'];
	$name = $fetch['name'];
	$slug = $fetch['slug'];
	$desc = $fetch['description'];
	


	
	echo'
							 <div class="form-group">
<form action="process.php?edit='.$id.'" method="POST">
<label for="cname">Category Name:</label><br/>
<input type="text" value="'.$name.'" class="form-control" name="cname" required><br/>

<label for="cname">Slug:</label><br/>
<input type="text" value="'.$slug.'" class="form-control" name="slug" required><br/>

<label for="description">Description:</label><br/>
<textarea name="description" class="form-control">'.$desc.'</textarea><br/><br/>
<input class="btn btn-block btn-success" value="Update Category" type="submit" name="csubmit">

</form>
</div>';
	
}else{
	$result = ("No record Found");
}

}


	


if(isset($_GET['delete'])){
	
	echo '<div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Delete Category</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- START breadcrumb -->
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.php">Home</a></li>
                            
                            <li>Add New Category</li>
							<li class="active">Delete</li>
                        </ol>
                        <!-- END breadcrumb -->
                    </div>
                    
                </div>
                <!-- END PAGE COVER -->
				


<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">';
	
	$id = $_GET['delete'];
	
	printf("
	<div style='padding:100px;background-color:red;color:white;'>
	<p> Are You Sure You Want To Delete This Category?</p><br/>
	<a href='process.php?delete=%s'><button class='btn btn-success'>Yes, Please</button></a>  <a href='create-category.php'><button class='btn btn-danger'>No</button></a>
	</div>
	<p id='#del'></p>
	", $id);
	
	
}






//category lists

$csql = "SELECT * FROM `category`";
$cquery = mysqli_query($connect, $csql);
$cnum = mysqli_num_rows($cquery);
if($cnum > 0){
	echo "<br/><br>
	<h2>All Categories</h2><br><hr>
	";
	for($x = 0; $x < $cnum; $x++){
	$crow = mysqli_fetch_assoc($cquery);
	$id = $crow['id'];
	$cname = $crow['name']; 
	$url = explode(" ", $cname);
	$url = strtolower(implode("-", $url));
	
		printf("<h3>%s   <a href='?edit=%s&#edit' class='editcat'><button type='button' class='btn btn-outline-success width-100-xs' data-toggle='modal' data-target='#exampleModalFillInModal'>
                                            Edit Category
                                        </button></a>     <a href='?delete=%s&#del'><button type='button' class='btn btn-outline-danger width-100-xs' data-toggle='modal' data-target='#exampleModalFillInModal'>
                                            Delete
                                        </button></a>   <a href='../section/%s/'><button type='button' class='btn btn-outline-danger width-100-xs' data-toggle='modal' data-target='#exampleModalFillInModal'>
                                            View Category
                                        </button></a></h3><br/><hr>",$cname, $id, $id, $url);
		
		
	}
}



echo"
</div>
</div>
</div>
</div>
</div>

";


include'footer.php';
?>











