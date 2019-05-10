<?php
include_once("header.php");
include_once("sidebar.php");
include_once("topbar.php");
?>

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">Add Amenities</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="col-12">
                                <div class="card">
                                    <div class="card-body">                                    
            
                                        <form class="form-horizontal" action="addHotelQuery.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Amenities Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="amenitiesName" name="amenitiesName" placeholder="Amenities Name" required="">
                                                </div>
                                            </div> 
                                            <label class="col-sm-2 col-form-label" for="name"></label>                                      
                                           <button class="btn btn-success" id="submit_amt" name="submit_amt">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php include_once("footer.php"); ?>