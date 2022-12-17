<?php
//page
include "../info.php";
include'header.php';
include_once'functions/function.php';

echo '<div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Add New Page</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- START breadcrumb -->
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.php">Home</a></li>
                            
                            <li class="active">Add New Page</li>
                        </ol>
                        <!-- END breadcrumb -->
                    </div>
                    
                </div>
                <!-- END PAGE COVER -->
				


<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">';
$alert = "";

 $conn = new mysqli($bhost, $buser, $bpassword, $bdatabase);
 
 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitx'])){

$id = '';
$name = $_POST['name'];

//check maybe slug is set, if not then use title as slug
if(empty($_POST['slug'])){
	$slug = Admin\Functions\format_to_url($_POST['name']);
}elseif(!empty($_POST['slug'])){
$slug = Admin\Functions\format_to_url($_POST['slug']);
}


$content = mysqli_real_escape_string($conn, $_POST['content']);

$sql = "INSERT INTO `page` (`id`, `name`, `slug`, `content`) VALUE ('$id', '$name', '$slug', '$content')";

$query = $conn->query($sql);

if($query){
$alert = '<div class="alert alert-success alert-raised mb-2" role="alert">
 <i class="fa fa-check" aria-hidden="true"></i> <strong>SUCCESS :</strong>Page Created Successfully.
                                </div><br/>';	
echo'<script>
setTimeout("redirect()", 1000);

function redirect(){
	window.location="page.php";
}
</script>';

}else{
	$alert = '<div class="alert alert-danger alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>ERROR :</strong>Page Not Created</div><br/>';
}

 }

echo $alert;
?>

	
<?php  if(!isset($_GET["edit"]) && !isset($_GET["delete"])):  ?>
<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<label for="name">Page Name:</label>
<input type="text" name="name" class="form-control" required><br/><br/>
<label for="name">Slug:</label>
<input type="text" name="slug" class="form-control"><br/><br/>
<label for="text">Content</label>
<textarea name="content" class="form-control"><div class="summernote"></div></textarea><br/><br/>

<input type="submit" value="Create New Page" class="btn btn-success" name="submitx">

</form></div><br/><br/><hr>
<?php endif;  ?>


<?php






if(isset($_GET['edit'])){
	
	echo"<br/><h2>EDIT PAGE</h2><br>";
$id = $_GET['edit'];
$esql = "SELECT * FROM `page` WHERE `id` = $id";	
$equery = $conn->query($esql);
if($equery){
	$efetch = $equery->fetch_assoc();
	$ename = $efetch['name'];
	$eslug = $efetch['slug'];
	$econtent = $efetch['content'];
	
printf('
		
													
<form action="process.php?pedit=%s" method="POST">
<label for="name">Page Name:</label>
<input type="text" name="name" class="form-control" value="%s" required><br/><br/>
<label for="name">Slug:</label>
<input type="text" name="slug" class="form-control" value="%s" required><br/><br/>
<label for="text">Content</label>
<textarea name="content" class="form-control" rows="15"><div id="summernote">%s</div></textarea><br/><br/>

<input type="submit" class="btn btn-success" name="esubmit">

</form>
',$id, $ename, $eslug, $econtent);	

}
else{
	$alert = "Page Not Available";
}
	
}


if(isset($_GET['delete'])){
$id = $_GET['delete'];
	
echo"<hr><div style='padding:100px;background-color:red;color:white;'>
	<p> Are You Sure You Want To Delete This Category?</p><br/>
	<a href='process.php?pdelete=".$id."'><button class='btn btn-success'>Yes, Please</button></a>  <a href='page.php'><button class='btn btn-alert'>No</button></a>
	</div>";
}










//list all pages
$lsql = "SELECT * FROM `page`";
$lquery = $conn->query($lsql);
$numrow = $lquery->num_rows;
if($numrow > 0){
echo"<br/><h3> PAGES</h3><hr><br/>";
for($x = 0; $x < $numrow; $x++){
	$fetch = $lquery->fetch_assoc();
	
	$id = $fetch['id'];
$name = $fetch['name'];
$slug = $fetch['slug']; 	
	
	echo "<i class='fa fa-file-text'></i>  <b>{$name}</b> <a href='?edit=$id'><button type='button' class='btn btn-outline-danger width-100-xs' data-toggle='modal' data-target='#exampleModalFillInModal'>
                                            Edit Page
                                        </button></a>  <a href='?delete=$id'><button type='button' class='btn btn-outline-danger width-100-xs'>
                                            Delete Page
                                        </button></a>  <a href='../page/{$slug}/'><button type='button' class='btn btn-outline-danger width-100-xs'>
                                            View Page
                                        </button></a><br/><hr>";
	
}
	
}
else{
	
echo "No Pages Yet";	
	
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