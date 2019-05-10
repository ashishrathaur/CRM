<?php
include_once("header.php");
include_once("sidebar.php");
include_once("topbar.php");
?>

 				<div class="col-12">
                    <div class="row">
                        <div class="col-12">
                             <div class="page-title-box">
                        
                                <h4 class="page-title">Select Flight</h4>
                             </div>
                        </div>
                    </div>
                      <div class="col-12">
                                <div class="card">
                                    <div class="card-body">                                    
            
                                        <form class="form-horizontal" action="addHotelQuery.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Flight Code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="flightCode" name="flightCode" placeholder="Enter Flight Code">
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label" for="name"></label>
                                            <button class="btn btn-success" id="bookFlight" name="bookFlight">Submit</button>
                                        </form>
                                    </div>
                                </div>
                       </div>
                </div>
<?php 
include_once("footer.php");
?>