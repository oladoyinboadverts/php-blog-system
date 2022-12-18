<?php

include 'header.php';
include'head/connection.php';

//table selections
$psql = "SELECT * FROM `posts`";
$csql = "SELECT * FROM `category`";
$comm = "SELECT * FROM `comments`";
$userql = "SELECT * FROM `users`";

//posts query
$pq = $conn->query($psql);
$pnum = $pq->num_rows;


//print out the addition of all posts views - all time
for($x = 0; $x < $pnum; $x++){
	$f = $pq->fetch_assoc();
	$v = $f["views"];
	$date = strtotime("M d", $f["date"]);
	//put all views value in one array
	$arr[] = $v;
	
}

//getting to total number of views
$totalviews = array_sum($arr);


 
//category query
$cq = $conn->query($csql);
$cnum = $cq->num_rows;

//comments query
$comq = $conn->query($comm);
$com_num = $comq->num_rows;

//users query
$userq = $conn->query($userql);
$users = $userq->num_rows;



//output values
echo'	<div class="main-content small-gutter" role="main">
			<div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">Welcome!</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.html">Foster</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
				
				
		               
						
						
						
                <div class="row tile-count">
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 tile-stats-count">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                <h5 class="text-muted text-uppercase">Total Posts</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <h3 class="counter text-right m-t-15 text-info">'.$pnum.'</h3>
                            </div>
                            <div class="col-12">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 tile-stats-count">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6"><i class="fa fa-files-o" aria-hidden="true"></i>
                                <h5 class="text-muted text-uppercase">Categories</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <h3 class="counter text-right m-t-15 text-primary">'.$cnum.'</h3>
                            </div>
                            <div class="col-12">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary w-25" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 tile-stats-count">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6"> <i class="fa fa-comments-o" aria-hidden="true"></i>
                                <h5 class="text-muted text-uppercase">Comments</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <h3 class="counter text-right m-t-15 text-danger">'.$com_num.'</h3>
                            </div>
                            <div class="col-12">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 tile-stats-count">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6"><i class="fa fa-user-o" aria-hidden="true"></i>
                                <h5 class="text-muted text-uppercase">All Users</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <h3 class="counter text-right m-t-15 text-success">'.$users.'</h3>
                            </div>
                            <div class="col-12">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /top tiles -->		
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				';


echo'	
		               
						
				<br><h1>Stats</h1><br/>		
						
                <div class="row tile-count">
                
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 tile-stats-count">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6"><i class="fa fa-eye" aria-hidden="true"></i>
                                <h5 class="text-muted text-uppercase">All Time Views</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <h3 class="counter text-right m-t-15 text-primary">'.$totalviews.'</h3>
                            </div>
                            <div class="col-12">
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary w-100" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="1000"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                        </div>
                    </div></div></div></div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				';

include'footer.php';

?>