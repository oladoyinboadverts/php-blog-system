<?php

include 'head/connection.php';
include'header.php';
include_once'functions/function.php';

echo' <div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Posts</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- START breadcrumb -->
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.php">Home</a></li>
                            
                            <li class="active">All Posts</li>
                        </ol>
                        <!-- END breadcrumb -->
                    </div>
                    
                </div>
                <!-- END PAGE COVER -->
				


<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">';
echo"


<a href='create-post.php'><button class='btn btn-primary'><h5>Create New Post</h5></button></a> <a href='index.php'><button class='btn btn-info'><h5>Back To Homepage</h5></button></a>    <br/><br/><br>
";

//posts limit per page
$page_limit = 4;

//if current page is equal to 1 or if it doesn't have ?page tag in url
if(empty($_GET["page"]) || $_GET["page"] == 1){
$sql = "SELECT * FROM `posts` ORDER BY `date` DESC LIMIT $page_limit";

$query = mysqli_query($connect, $sql);

if($query){

$check = mysqli_num_rows($query);


if($check > 0){
	
	
for($x = 0; $x < $check; $x++){
$row = mysqli_fetch_assoc($query);
$id = $row['id'];
$name = $row['name'];
$views = $row['views'];
$url = Admin\Functions\format_to_url($name);

echo "<h2><div class='btn btn-primary'><i class='fa fa-eye'></i> ".$views."</div> ".$name."  <br><a href='edit-post.php?id=".$id."'><button class='btn btn-outline-success'>EDIT</button></a>  <a href='action.php?delete-post=".$id."'><button class='btn btn-outline-danger'>DELETE</button></a>  <a href='../".$id."-".$url."/'><button class='btn btn-outline-warning'>VIEW POST</button></a> </h2><br/><hr/>";

}
}
else{
echo "No Blog Post Yet, <button class='btn btn-success'><a href='create-post.php'>Create A New Post Here >></a></button>";
}
}

}

//check if page is greater than 1 and if ?page exist, then import posts from db
elseif(!empty($_GET["page"]) && $_GET["page"] > 1){
	$page_number = $_GET["page"];
$calc = $page_number - 1;
$offset = $calc * $page_limit;
$query2 = $conn->query("SELECT * FROM `posts` ORDER BY `date` DESC LIMIT $offset, $page_limit");
$nump = $query2->num_rows;

for($x = 0; $x < $nump; $x++){
$row = $query2->fetch_assoc();
$id = $row['id'];
$name = $row['name'];
$views = $row['views'];
$url = Admin\Functions\format_to_url($name);

echo "<h2><div class='btn btn-primary'><i class='fa fa-eye'></i> ".$views."</div> ".$name."  <br><a href='edit-post.php?id=".$id."'><button class='btn btn-outline-success'>EDIT</button></a>  <a href='action.php?delete-post=".$id."'><button class='btn btn-outline-danger'>DELETE</button></a>  <a href='../".$id."-".$url."/'><button class='btn btn-outline-warning'>VIEW POST</button></a> </h2><br/><hr/>";

}
	
}

?>




<?php 
//assign page number to 1 if page is not having ?page tag and if ?page=1 

//also asign current page number to page greater than 1 and having ?page tag

if(empty($_GET["page"]) || $_GET["page"] == 1)
{ 
$page_number = 1; 
}elseif(!empty($_GET["page"]) && $_GET["page"] > 1){
	$page_number = $_GET["page"];
}

if($page_number > 1):
?>


<a href="?page=<?=$page_number-1?>"><div class="btn btn-success" style="float:left;">Previous Page</div></a>
<?php endif; ?>











<?php

//get total number of posts then divide it to get total number of posts
$query = $conn->query("SELECT * FROM `posts`");
$count = $query->num_rows;
$calc = $count/$page_limit;
$total = ceil($calc);

//check if page number is less than total page number
if($page_number < $total):
?>
<a href="?page=<?=$page_number+1?>"><div class="btn btn-success" style="float:right;">Next Page</div></a>
<?php
endif;
?>


<?php
echo"
</div>
</div>
</div>
</div>
</div>

";
include'footer.php';
?>