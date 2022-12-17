<?php
include 'head/connection.php';
include'header.php';
echo '<div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Edit Post</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- START breadcrumb -->
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.php">Home</a></li>
                            
                            <li class="active">Edit Post</li>
                        </ol>
                        <!-- END breadcrumb -->
                    </div>
                    
                </div>
                <!-- END PAGE COVER -->
				


<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">';

$error= "";
$success ="";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['category']) && isset($_POST['content']) && isset($_POST['tags'])  && isset($_POST['submit'])){
	


$id = $_POST['id'];
$name = mysqli_real_escape_string($connect, $_POST['name']);
$category = $_POST['category'];
$content = mysqli_real_escape_string($connect, $_POST['content']);
$tags = $_POST['tags'];
$metaname =$_POST['metatitle'];
$metadesc = $_POST['metadesc'];
$metatags = $_POST['metatags'];
$datex = $_POST['date'];
$date = strtotime($datex);
$imgalt = $_POST['imagealt'];;
$image = $_FILES['image']['name'];
$imgdir = "../static/$image";


if(!empty($image)){
	
	//fetch data from settings
	$adminsql = "SELECT `imgfiletype` FROM `settings`";
	$adminqr = mysqli_query($connect, $adminsql);
	$afch = mysqli_fetch_assoc($adminqr);
	
	//get image basename
	$image = basename($_FILES['image']['name']);
	$ftype = explode (".", $image);
    $filetype= strtolower($ftype[1]);


//get elements from settings filetype
$lists = array("jpg", "jpeg", "webp", "png", "jfif");

if(in_array($filetype, $lists)){
	$imagetemp = $_FILES['image']['tmp_name'];
	
	move_uploaded_file($imagetemp, $imgdir);
	$success = "New Image Uploaded";
	
	
}
else{ $error = "IMAGE TYPE NOT ACCEPTED"; 
echo '<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>ERROR :</strong>'.$error.'</div>';
}

}
else{
	
		$image = $_POST['fileurl'];	
		
}


$sql = "UPDATE `posts` SET `name`='$name', `category` = '$category', `content`= '$content', `tags` = '$tags', `date` = '$date', `image` = '$image', `imagealt` = '$imgalt', `metatitle` = '$metaname', `metadesc` = '$metadesc', `metatags` = '$metatags' WHERE `id` = $id";


$query = mysqli_query($connect, $sql);

if($query){
	
	
	
	echo"<div class='alert alert-success alert-raised mb-2' role='alert'>
                                    <i class='fa fa-check' aria-hidden='true'></i> <strong>SUCCESS :</strong>
	Post Updated Successfully</div><br/>
	<center><h2><button class='btn btn-success' style='color:white;'><a href='posts.php' style='color:white;'>Back To Posts</a></button></h2></center><br/>";
	
	echo'
	<script>
	setTimeout("Redirect()", 2000);
	function Redirect(){
		window.location = "posts.php";
		
	}
	
	</script>
	
	';
	


}

else{
	
$error = "Content Not Updated";

echo '<div class="alert alert-success alert-raised mb-2" role="alert">
                                    <i class="fa fa-check" aria-hidden="true"></i> <strong>ERROR :</strong>'.$error.'</div>';

}	


if(!empty($error)){ echo $error; }
}
else{
	
	$error = "Failed To Submit Data";


}



?>









<!DOCTYPE>
<html lang="en">
<head><title>EDIT POST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width:device-width, initial-scale=1.0">
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
</head>
<body>

<?php


if(isset($_GET['id'])){


$id = $_GET['id'];

$sql2 = "SELECT * FROM `posts` WHERE `id` = $id";
$query2 = mysqli_query($connect, $sql2);
$row = mysqli_fetch_assoc($query2);



$id2 = $row['id'];
$name = $row['name'];
$category = $row['category'];
$content = $row['content'];
$num_words = str_word_count($content);
$tags = $row['tags'];
$metaname = $row['metatitle'];
$metadesc = $row['metadesc'];
$metatags = $row['metatags'];
$date = $row['date'];
$imgalt = $row['imagealt'];
$image = $row['image'];
$imageurl = "../static/".$image;



echo "<center><form action='edit-post.php' method='POST' enctype='multipart/form-data' >
<input type='hidden' value='$id2' name='id' > 
<label for='name'>Name:</label>
<input type='text' class='form-control' name='name' value='".$name."'/><br/><br/><label for='date'>Date:</label>
<input type='datetime-local' placeholder='".date("m/d/Y h:i A", $date)."' name='date' required><br/><br/>";

echo "<br/><label for='name'>Category:</label>
<select name='category' class='form-control' required>
<option selected>".$category."</option>
<option>---------------------------------------------------------</option>
";

$sql3 = "SELECT * FROM `category`";
$query3 = mysqli_query($connect, $sql3);

$catrow = mysqli_num_rows($query3);

for($x = 0; $x < $catrow; $x++){
	$cat = mysqli_fetch_assoc($query3);
	$catname = $cat['slug'];
	
	echo "<option>$catname</option>";
}
echo"</select><br/><br>";

echo "<label for='content'>Content:</label>
<textarea name='content' class='form-control' rows='20' id='summernote'><div id='summernote'>".$content."</div></textarea><div class='btn btn-primary'> Words: ".$num_words."</div><br/><br/>
<label for='tags'>Tags:</label><br/>

<input type='text' class='form-control' value='".$tags."' name='tags'/><br/><br/>";

echo'<br/><br/>

<h2>SEO</h2><br/>
<label for="metaname">Meta Name:</label>
<input type="text" class="form-control" value="'.$metaname.'" name="metatitle"/>
<br/><br/>
<label for="metadesc">Meta Description:</label>
<input type="text" class="form-control" value="'.$metadesc.'" name="metadesc"/>
<br/><br/>

<label for="metakeywords">Meta Keywords:</label><br/>
<input type="text" class="form-control" name="metatags" value="'.$metatags.'"><br/><br>




<h2>Featured Image</h2><br/>';
echo"
<label for='image'>Featured Image:</label><br/>
<input type='file' name='image' value='".$imageurl."'><br/>
<input type='hidden' name='fileurl' value='".$image."'/>
<img src='".$imageurl."' width='100px' height='100px'/>

<br/><br/>

<label for='imagealt'>Image Alt:</label><br/>
<input type='text' class='form-control' name='imagealt' value='".$imgalt."'><br/>
<br>


<input type='submit' class='btn btn-success' name='submit'></center>";

} else {
	
	return "ERROR OCCURED";
	
}

echo'
</div>
</div>
</div>
</div>
';

include'footer.php';

?>