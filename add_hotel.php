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
                                    
                                    <h4 class="page-title">Add Hotel</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="col-12">
                                <div class="card">
                                    <div class="card-body">                                    
            
                                        <form class="form-horizontal" action="addHotelQuery.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Hotel Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="hoteName" name="hoteName" placeholder="Hotel Name">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row" id="editor">
                                                <label class="col-sm-2 col-form-label" for="price">Descriptiop</label>
                                                <div class="col-sm-10">
                                                    <textarea type="text" class="form-control" id="editor1" name="editor1"></textarea>
                                                </div>
                                            </div>
            
                                            <!-- <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="discount">Offer Discount</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="discount" name="discount" placeholder="1.00%">
                                                </div>
                                            </div> -->

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Select One or more Photos</label>
                                                <div class="col-sm-10">
                                                    <input type="file" id="hotelPhoto" required="" name="hotelPhoto[]" class="form-control" multiple="">
                                                </div>
                                            </div>
            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Room Amenities</label>
                                                <div class="col-sm-10">
                                                    
                                                    <select multiple="" class="form-control" name="amenities[]" id="amenities">
                                                        <?php
                                                    $sql_amenties = "SELECT * FROM `amnities`";
                                                     $result_amenties = mysqli_query($conn, $sql_amenties);
                                                     while($amenties_result=mysqli_fetch_assoc($result_amenties)){
                                                     $amenties_row = $amenties_result["amnities"];
                                                     // echo $amenties_row;
                                                
                                                     ?>
                                                        <option value="<?php echo $amenties_row; ?>"><?php echo $amenties_row; ?></option><?php  }  ?>
                                                      
                                                    </select>  

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">Address Line 1</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="address1" name="address1" placeholder="Your Address">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">Address Line 2</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="address2" name="address2" placeholder="Your Address">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">City</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="city" name="city" placeholder="City Name">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">State</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="state" name="state" placeholder="State Name">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">Country</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="country" name="country" placeholder="Country Name">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">Zip Code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip Code">
                                                </div>
                                            </div>

                                            <button class="btn btn-success" id="submit" name="submit">Submit</button>

                                        </form>
            
                                    </div> <!-- end card-box -->
                                </div> <!-- end card-->
                            </div><!-- end col -->

                       
                    </div> <!-- container -->

                </div> <!-- content -->

               
        </div>
        <!-- END wrapper -->
<?php 
include_once("footer.php");
?>