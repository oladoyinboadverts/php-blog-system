<?php
include'header.php';



echo' <div class="row bg-title clearfix page-title">
                    <div class="col-12 col-lg-3">
                        <h4 class="page-title">File Manager</h4>
                    </div>
                    <div class="col-12 col-lg-9">
                        <!-- START breadcrumb -->
                        <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                            <li><a href="index.php">Home</a></li>
                            
                            <li class="active">File Manager</li>
                        </ol>
                        <!-- END breadcrumb -->
                    </div>
                    
                </div>
                <!-- END PAGE COVER -->
				


<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 mb-12">
                            <div class="bg-white padding-25 h-100">
							
							
							
							
							
							  <div class="col-lg-12 col-xl-12 mb-2">
                            <div class="bg-white padding-25 h-100">
                                <h4 class="mt-0 box-title">File Manager</h4>
                                <div class="data-table-wrapper">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4 col-xl-6">
                                            <div class="data-table-length">
                                                <label>
                                                    Show
                                                    <select aria-controls="example" class="form-control">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                    entries
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-lg-8 col-xl-6 text-md-right">
                                            <div class="data-table-filter mb-2 float-sm-left float-lg-none d-lg-inline-block">
                                                <label for="search2">Search:</label>
                                                <input type="search" class="form-control" id="search2" name="filesearch">
                                            </div>
                                            <div class="actions ml-md-3 mb-2 text-sm-right d-lg-inline-block">
											<form action="fileupload.php" method="POST" enctype="multipart/form-data">
											
                                                <input type="file" class="custom-file-inpu" id="inputGroupFile01" name="image">
                                                
                                            
											
                                               
												<button type="submit" class="btn btn-circle btn-primary"  for="inputGroupFile01" name="submit" ><i
                                                        class="fa fa-upload"></i></button>
														</form>
														
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-striped table-bordered data-table mb-0" role="grid">
                                                    <thead>
                                                    <tr>
                                                        <th tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" class="text-center">
                                                            Image
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Name: activate to sort column descending">
                                                            Name
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Position: activate to sort column ascending">Size
                                                        </th>
                                                        
                                                        <th tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Status: activate to sort column ascending">
                                                            Actions
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1"
                                                            aria-label="Delete">Delete
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>';

													
													
$x = scandir("../static/");

unset($x[1], $x[0]);

foreach ($x as $item){							
		$file = "../static/$item";	
		$filesize = filesize($file);
		if($filesize >= 1024){
       	 $filesize = number_format($filesize / 1024, 1).'KB';	
		}elseif($filesize >= 1048576){
 $filesize = number_format($filesize / 1048576, 2).'Mb';	
		}	
		
		
		
		
	echo'

<tr>
                                                        <td class="text-center">
                                                            <img src="../static/'.$item.'" class="" alt="Image">
                                                        </td>
                                                        <td><a href="../static/'.$item.'">'.$item.'</a></td>
                                                        <td>'.$filesize.'</td>
                                                        
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-info dropdown-toggle" type="button"
                                                                        id="dropdownMenuButton9" data-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                    Actions
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton9">
                                                                    <a class="dropdown-item" href="fileaction.php?edit='.$item.'&fileid='.uniqid().'">Edit</a>
                                                                    <a class="dropdown-item" href="../static/'.$item.'">Preview</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><a href="fileaction.php?delete='.$file.'" class="text-danger text-nowrap remove" title="Delete"><i
                                                                class="fa fa-trash-o"></i>Delete</a></td>
                                                    </tr>';
													
	
}							
													
													
													
													
													
													
													
													
													
													
													
													
				echo'									
													
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="showing-items">Showing
                                                1 to 10 of 57 entries
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="data-table-paginate">
                                                <nav>
                                                    <ul class="pagination">
                                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
						
						




echo'</div></div></div></div>';

include'footer.php';
?>