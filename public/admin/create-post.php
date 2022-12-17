<?php
$error ="";
include'../info.php';


$connect = mysqli_connect($bhost, $buser, $bpassword, $bdatabase);


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
	
	
	
if (isset($_POST["postname"]) && isset($_POST["category"]) && isset($_POST["content"])){
	
	$id = ' ';
	$name = mysqli_real_escape_string($connect, $_POST['postname']);
	$category = $_POST['category'];
	$content = mysqli_real_escape_string($connect, $_POST['content']);
	$tags = $_POST['tags'];
	$metaname = $_POST['metaname'];
	$metadesc = $_POST['metadesc'];
	$metatags = $_POST['metatags'];
	$imgalt = $_POST['imagealt'];
	
	$fdate = $_POST['date'];
	$date = strtotime($fdate);
	
	
	if(!empty($_FILES["image"])){
		$image = basename($_FILES["image"]["name"]);
		$imgdir = "../static/".$image;
		$filetypecheck = explode(".", $image);
		$filetemp = $_FILES["image"]["tmp_name"];
		$filetype = strtolower($filetypecheck[1]);
		$lists = array("jpg", "jpeg", "png", "webp", "jfif", "gif");
		
		if(in_array($filetype, $lists) == true){
			
		$imagex = basename($_FILES['image']['name']);
		
	
		
	$sql = sprintf("INSERT INTO `posts` (`id`, `name`, `category`, `content`, `tags`, `date`, `image`, `imagealt`, `metatitle`, `metadesc`, `metatags`) VALUES ('$id', '$name', '$category', '%s', '$tags', '$date', '$imagex', '$imgalt', '$metaname', '$metadesc', '$metatags')", $content);
	
	$query = mysqli_query($connect, $sql);
	
	if($query){
   move_uploaded_file($filetemp, $imgdir);
		 
		
		$success = 'Content Created Successfully.';
		

		
	}
	else{
		$error = "failed to create content";
		
	}
			
		}else{ $error = "IMAGE FILE TYPE NOT ACCEPTED"; }
		
		
	
	
	}else{
		$error = "upload an image to continue";
	}
	
	
	
}

else{
	
$error = "Complete The Input Value";	
	
}
	
}



?>


<?php include 'header.php'; ?>

<style>
.i{
width: 400px;
height:50px;	
}


.submit{
	padding:10px;
	background-color:blue;
	color:white;
	
}

</style>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

 <div class="row bg-title clearfix page-title">
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
			<?php	
			
			if(!empty($success)): ?>
<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>SUCCESS : <?=$success?></strong></div>
									
								<?php endif; ?>
								

<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">

<center>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
 <div class="form-group">
<label for="postname">PostName:</label>
<input type="text" id="exampleFormControlInput1" class="form-control" name="postname" placeholder="Enter Post Name" required>
</div>
<br/><br/>

<label for="date">Date:</label>
<input type="datetime-local" name="date" value ="<?php echo date('Y-m-d\This:i:s');  ?>" required><br/><br/>

<label for="category">Category:</label>
<select class="custom-select" name="category">
<option></option>
<?php

$sql = "SELECT `name`, `slug` FROM `category`";

$query = mysqli_query($connect, $sql);

if($query){
	$num = mysqli_num_rows($query);
	for($x = 0; $x < $num; $x++){
	$row = mysqli_fetch_assoc($query);
	$name = $row['slug'];
	
	
	echo "<option>$name</option>";
	}
	
}


?>
</select><br/><br>
 <div class="form-group">

<label for="content">Content:</label>
<textarea name="content" id="summernote" class="form-control" placeholder="Enter Content"   rows="10" cols="80" required> <div id="summernote"></div></textarea><br/><br/>
</div>
 <div class="form-group">
<label for="text">Tags:</label>
<input type="text" class="form-control" placeholder="tags" name="tags"/></div>
<br/><br/>

<h2>SEO</h2><br/>
 <div class="form-group">
<label for="metaname">Meta Name:</label>
<input type="text" class="form-control" placeholder="Enter Title" name="metaname"/>
<br/><br/>
<label for="metadesc">Meta Description:</label>
<input type="text" class="form-control" placeholder="Enter Description" name="metadesc"/>
<br/><br/>

<label for="metakeywords">Meta Keywords:</label><br/>
<input type="text" class="form-control" name="metatags" placeholder="Enter Keywords"><br/><br></div>




<h2>Featured Image</h2><br/>

<div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">File:</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div><br/>

<label for="imagealt">Image Alt:</label><br/>
<input type="text" class="form-control" name="imagealt" placeholder="Image Alt Name"><br/>



<input type="submit" name="submit" class="btn btn-success">

</form>
</center>
 </textarea></div></div></div></div></div>


<?php include'footer.php'; ?>


