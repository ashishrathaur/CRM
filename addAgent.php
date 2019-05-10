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
                                    
                                    <h4 class="page-title">Add Agent</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                         <div class="col-12">
                                <div class="card">
                                    <div class="card-body">    

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Agent</label>
                                                <div class="col-sm-10">
                                                     <select class="form-control" name="agent" id="agent">
                                                        <option selected="" value="">---Select---</option>
                                                          <?php
                                                            $sql = "SELECT * FROM `admin`";
                                                            $result = mysqli_query($conn, $sql);
                                                            $count = mysqli_num_rows($result);
                                                           while($row=mysqli_fetch_assoc($result)){
                                                          ?>
                                                   
                                                        <option value="<?php echo $row['adminName'] ?>"><?php echo $row['adminName'] ?></option>
                                                    <?php } ?>
                                                        
                                                    </select>  

                                                </div>
                                            </div>
                                    </div>
                                </div>
                        </div>

                        <div class="col-12">
                                <div class="card">
                                    <div class="card-body">                                    
            
                                        <form class="form-horizontal" action="addHotelQuery.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Agent Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="agentName" name="agentName" placeholder="Hotel Name" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Email ID</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="agentEmail" name="agentEmail" placeholder="Email Id" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="agentnumber" name="agentnumber" placeholder="Phone Number" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="agentpassword" name="agentpassword" placeholder="Password" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Confirm Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="agentpassword2" name="agentpassword2" placeholder="Confirm Password" required="">
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label"></label>
                                         <button class="btn btn-success" id="addAgent" name="addAgent">Add</button>
                                            
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php include_once("footer.php"); ?>