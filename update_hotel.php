<?php
include_once("header.php");
include_once("sidebar.php");
include_once("topbar.php");
error_reporting(0);
$searchCountry = $_REQUEST['country'];
$searchState = $_REQUEST['state'];
$searchCity = $_REQUEST['city'];
$searchHotel = $_REQUEST['hotel_name'];

?>
<?php
if($_SESSION['adminId']!=1){
        $datetime = "SELECT * FROM `add_update_hotels` WHERE city = '$searchCity' AND state = '$searchState' AND country = '$searchCountry' AND hotel_name = '$searchHotel'";
        $result_date = mysqli_query($conn, $datetime);
     $fetchDate = mysqli_fetch_assoc($result_date);

        $currentDate = $fetchDate['datetime'];
        $updatedDate = strtotime($fetchDate['agent_update_datetime']);
        $new_time = date("Y-m-d H:i:s",strtotime('+24 hours',$updatedDate));
       // echo $new_time;
        // echo $currentDate ." " . $updatedDate;
        if(date("Y-m-d H:i:s")>$new_time){
            $disabled="disabled";
        }
        else{
            $disabled = "";
        }
    

 }
 else{ $disabled = "";}
 ?>

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">Hotel Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="header-title">Input Types</h4>
                                        <p class="text-muted font-14">
                                            Most common form control, text-based input fields. Includes support for all HTML5 types: <code>text</code>, <code>password</code>, <code>datetime</code>, <code>datetime-local</code>, <code>date</code>, <code>month</code>, <code>time</code>, <code>week</code>, <code>number</code>, <code>email</code>, <code>url</code>, <code>search</code>, <code>tel</code>, and <code>color</code>.
                                        </p> -->
            
                                    
                                        <div class="form-group row">
                                            <!-- <div class="col-sm-1"></div> -->
                                            <!-- <label class="col-sm-2 col-form-label">Country</label> -->
                                            <div class="col-sm-4">
                                                <form action="" method="post" enctype="multipart/form-data"> 
                                                <select class="form-control" name="country" onchange="this.form.submit()">
                                                    <?php
                                                    if($searchCountry){
                                                                 ?>
                                                                  <option value="<?php echo $searchCountry;?>"> <?php echo $searchCountry;?></option>
                                                                  <?php
                                                                }else{ 
                                                                    ?>
                                                    <option selected="" value="">---Select Country---</option>
                                                    <?php 
                                                    $sql_country = "SELECT DISTINCT country FROM add_update_hotels ORDER BY country ASC";
                                                        $result_country = mysqli_query($conn, $sql_country);

                                                        if (mysqli_num_rows($result_country) > 0) {
                                                            // output data of each row
                                                            while($row_country = mysqli_fetch_assoc($result_country)) {
                                                                
                                                                ?>
                                                            <option value="<?php echo $row_country['country'];?>"<?php if(isset($_REQUEST['country']) && $_REQUEST['country']== $row_country['country']){ echo "selected"; } ?> > <?php echo $row_country['country'];?></option>

                                                                <?php
                                                            }
                                                            
                                                        }
                                                        } 
                                                        ?>                   
                                                </select>
                                            </form>
                                               
                                            </div>


                                                <!-- <label class="col-sm-2 col-form-label">State</label> -->
                                                <div class="col-sm-4">
                                                     <form action="" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="country" value="<?php echo $_POST["country"];?>">
                                                    <select class="form-control" name="state" onchange="this.form.submit()">
                                                        <?php
                                                    if($searchState){
                                                                 ?>
                                                                  <option value="<?php echo $searchState;?>"> <?php echo $searchState;?></option>
                                                                  <?php
                                                                }else{ 
                                                                    ?>
                                                        <option selected="" value="">---Select State---</option>
                                                         <?php 
                                                         $country = $_POST['country'];
                                                         if(!empty($country)){

                                                             $sql_state = "SELECT DISTINCT state FROM add_update_hotels WHERE country = '$country' ORDER BY state ASC";
                                                             $result_state = mysqli_query($conn, $sql_state);

                                                            if (mysqli_num_rows($result_state) > 0) {
                                                                // output data of each row
                                                                while($row_state = mysqli_fetch_assoc($result_state)) {
                                                                    ?>
                                                                <option value="<?php echo $row_state['state'];?>"<?php if(isset($_POST['state']) && $_POST['state']== $row_state['state']){ echo "selected"; } ?> > <?php echo $row_state['state']; ?></option>
                                                                <?php
                                                                }
                                                            }

                                                         }
                                                     }
                                                        
                                                        ?>                 
                                                    </select>  
                                                    </form>                                                 
                                                </div>

                                                <!-- <label class="col-sm-2 col-form-label">City</label> -->
                                                <div class="col-sm-4">
                                                     <form action="" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="country" value="<?php echo $_POST["country"];?>">
                                                        <input type="hidden" name="state" value="<?php echo $_POST["state"];?>">
                                                    <select class="form-control" name="city" onchange="this.form.submit()">
                                                        <?php
                                                    if($searchCity){
                                                                 ?>
                                                                  <option value="<?php echo $searchCity;?>"> <?php echo $searchCity;?></option>
                                                                  <?php
                                                                }else{ 
                                                                    ?>
                                                        <option selected="" value="">---Select City---</option>
                                                        <?php 
                                                        if((!empty($_POST["country"])) && (!empty($_POST["state"]))){
                                                        $country=$_POST["country"];
                                                        $state=$_POST["state"];
                                                        $sql = "SELECT DISTINCT city FROM add_update_hotels WHERE country='$country' AND state='$state' ORDER BY city ASC";
                                                            $result = mysqli_query($conn, $sql);

                                                            if (mysqli_num_rows($result) > 0) {
                                                                // output data of each row
                                                                while($row = mysqli_fetch_assoc($result)) {
                                                                    ?>
                                                                <option value="<?php echo $row['city'];?>"<?php if(isset($_POST['city']) && $_POST['city']== $row['city']){ echo "selected"; } ?> > <?php echo $row['city']; ?></option>
                                                                <?php
                                                                    // echo '<option value="'.$row['city'].'">'. $row['city'] .'</option>';
                                                                }
                                                            } 
                                                        }
                                                    }
                                            ?>
                                                        <!-- <option value="">abc</option>
                                                        <option value="">xyz</option>
                                                        <option value="">123</option> -->                  
                                                    </select>
                                                   </form>
                                                </div>                                  

                                                <!-- <label class="col-sm-2 col-form-label" for="address">Zip Code</label> -->
                                               <!--  <div class="col-sm-2">
                                                    <input type="text" class="form-control" placeholder="Enter Zip Code">
                                                </div>
                                            
                                           <div class="col-sm-1">
                                            <button class="btn btn-primary">Submit</button>
                                        </div> -->
                                             </div>
                                        
            
                                    </div> <!-- end card-box -->
                                </div> <!-- end card-->
                            </div><!-- end col -->

                             <div class="col-12">
                                <div class="card">
                                    <div class="card-body">                                    
            
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="country" value="<?php echo $_POST["country"];?>">
                                             <input type="hidden" name="state" value="<?php echo $_POST["state"];?>">
                                             <input type="hidden" name="city" value="<?php echo $_POST["city"];?>">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Hotel Name</label>
                                                <div class="col-sm-10">
                                                     <select class="form-control" name="hotel_name" onchange="this.form.submit()">
                                                         <?php
                                                    if($searchHotel){
                                                                 ?>
                                                                  <option value="<?php echo $searchHotel;?>"> <?php echo $searchHotel;?></option>
                                                                  <?php
                                                                }else{ 
                                                                    ?>
                                                        <option selected="" value="">---Select Hotel---</option>
                                                        <?php 
                                                        if((!empty($_POST["country"])) && (!empty($_POST["state"]))){
                                                        $country=$_POST["country"];
                                                        $state=$_POST["state"];
                                                        $city = $_POST['city'];
                                                        $sql_hotel = "SELECT DISTINCT hotel_name FROM add_update_hotels WHERE country='$country' AND state='$state' AND city = '$city' ORDER BY hotel_name ASC";
                                                            $result_hotel = mysqli_query($conn, $sql_hotel);

                                                            if (mysqli_num_rows($result_hotel) > 0) {
                                                                // output data of each row
                                                                while($row_hotel = mysqli_fetch_assoc($result_hotel)) {
                                                                    ?>
                                                                <option value="<?php echo $row_hotel['hotel_name'];?>"<?php if(isset($_POST['hotel_name']) && $_POST['hotel_name']== $row_hotel['hotel_name']){ echo "selected"; } ?> > <?php echo $row_hotel['hotel_name']; ?></option>
                                                                <?php
                                                                    // echo '<option value="'.$row['city'].'">'. $row['city'] .'</option>';
                                                                }
                                                            } 
                                                        }
                                                    }
                                                 ?>
                                                        <!-- <option value="">abc</option>
                                                        <option value="">xyz</option>
                                                        <option value="">123</option> -->                  
                                                    </select>
                                                    <!-- <input type="text" class="form-control" id="hoteName" name="hoteName" placeholder="Hotel Name"> -->
                                                </div>
                                            </div>  
                                            </form>                               
            
                                            <!-- <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="discount">Offer Discount</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="discount" name="discount" placeholder="1.00%">
                                                </div>
                                            </div> -->
<?php 
// if(isset($_POST['hotel_name'])){
//      $hotel_name = $_POST['hotel_name'];
//      $country = $_POST['country'];
//      $state = $_POST['state'];
//      $city = $_POST['city'];
//  }
 if(isset($_REQUEST['hotel_name'])){
    $country = $_REQUEST['country'];
    $state = $_REQUEST['state'];
    $city = $_REQUEST['city'];
    $hotel_name = $_REQUEST['hotel_name'];
 }


     $sql_hotel = "SELECT * FROM `add_update_hotels` WHERE `country`= '$country' AND `state` = '$state' AND `city` = '$city' AND `hotel_name` = '$hotel_name'";
     $result_hotel = mysqli_query($conn, $sql_hotel);
     $auto_result=mysqli_fetch_assoc($result_hotel);
    $amenities = json_decode($auto_result['amenities']); 
    // print_r($amenities);
// die;
     // foreach ($amenities as $key => $val){ echo $val;}
     

    ?>
   
                                        <form action="addHotelQuery.php" method="post" enctype="multipart/form-data">  
                                            <input type="hidden" name="update_id" value="<?php echo $auto_result['id']; ?>">  
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Room Amenities</label>
                                                <div class="col-sm-10">
                                                    <select multiple="" class="form-control" name="amenities[]" id="amenities" <?php echo $disabled; ?>>
                                                        <?php 
                                                        $sql_amenties = "SELECT * FROM `amnities`";
                                                         $result_amenties = mysqli_query($conn, $sql_amenties);
                                                         while($amenties_result=mysqli_fetch_assoc($result_amenties)){
                                                         $amenties_row = $amenties_result["amnities"];
                                                         echo $amenties_row;
                                                         ?>
                                                        <option value='"<?php echo $amenties_row; ?>"'<?php foreach ($amenities as $key => $val){if($val==$amenties_row){ echo "selected"; }} ?>><?php echo $amenties_row; ?></option> 
                                                    <?php } ?>
                                                    </select>                                                    
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">Address Line 1</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="address1" name="address1" placeholder="Your Address" <?php echo $disabled; ?> value="<?php echo $auto_result['address1'] ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">Address Line 2</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="address2" name="address2" placeholder="Your Address" <?php echo $disabled; ?> value="<?php echo $auto_result['address2']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">City</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="city" name="city" placeholder="City Name" <?php echo $disabled; ?> value="<?php echo $auto_result['city']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">State</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="state" name="state" placeholder="State Name" <?php echo $disabled; ?> value="<?php echo $auto_result['state']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">Country</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="country" name="country" placeholder="Country Name" <?php echo $disabled; ?> value="<?php echo $auto_result['country']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">Zip Code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip Code" <?php echo $disabled; ?> value="<?php echo $auto_result['zip']; ?>">
                                                </div>
                                            </div>
<!-- 
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Select One or more Photos</label>
                                                <div class="col-sm-10">
                                                    <input type="file" id="hotelPhoto" required="" name="hotelPhoto[]" class="form-control" multiple="">
                                                </div>
                                            </div> -->

                                             <div class="form-group row" id="editor">
                                                <label class="col-sm-2 col-form-label" for="price">Descriptiop</label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" name="hotel_name" value="<?php echo $searchHotel; ?>"> 
                                                    <textarea type="text" <?php echo $disabled; ?> class="form-control" id="editor1" name="editor1" ><?php echo $auto_result['description']; ?></textarea>
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label"></label>
                                            <button class="btn btn-primary" id="update" name="update" <?php echo $disabled; ?>>Update</button>

                                        </form>
                                       </div> <!-- end card-box -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
                             <div class="col-12">
                                <div class="card">
                                    <div class="card-body"> 
                                        <form action="addHotelQuery.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="updated_id" value="<?php echo $auto_result['id']; ?>"> 
                                         <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Add Photos</label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" name="country" value="<?php echo $searchCountry; ?>">
                                                        <input type="hidden" name="state" value="<?php echo $searchState; ?>"> 
                                                        <input type="hidden" name="city" value="<?php echo $searchCity; ?>">
                                                        <input type="hidden" name="hotel_name" value="<?php echo $searchHotel; ?>"> 
                                                    <input type="file" id="hotelPhoto" <?php echo $disabled; ?> required="" name="hotelPhoto[]" class="form-control" multiple="">
                                                </div>
                                         </div> 
                                         <label class="col-sm-2 col-form-label"></label>
                                         <button class="btn btn-success" id="submit_img" name="submit_img" <?php echo $disabled; ?>>Submit</button>
                                         </form>
                                    </div>
                                </div>
                             </div>      
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                         <div class="page-title-box">
                                    
                                            <h4 class="page-title">Hotel Photos</h4>
                                         </div>
                                    </div>
                                </div>
                                <div class="card">
                         <div class="card-body"> 
                         <?php if(isset($_POST['hotel_name']) || isset($_REQUEST['hotel_name'])){ ?>   
                            <div class="form-group row">
                                                <!-- <label class="col-sm-2 col-form-label"></label> -->
                                                <div class="col-sm-12">
                                                    <div class="row">
                                    <?php  $image_path=json_decode($auto_result['image_path'], true);
                                    if(!empty($image_path))
                                            { ?>
                                          <?php foreach ($image_path as $key => $img_val){ 
                                              $altName = explode('img/', $img_val);
                                            ?>
                                            
                                            <div class="col-lg-6 col-xl-3">
                                            <form action="addHotelQuery.php" method="post" enctype="multipart/form-data">
                                                <!-- Simple card -->
                                                <div class="card d-block">

                                                    <img class="card-img-top img-fluid" title=<?php echo $altName[1]; ?>" src="<?php echo $img_val; ?>">
                                                    <div class="card-body">
                                                        <!-- <h5 class="card-title"><?php //echo $altName[1]; ?></h5> -->
                                                        <!-- <p class="card-text">Some quick example text to build on the card title and make
                                                            up the bulk of the card's content. With supporting text below as a natural lead-in to additional content.</p> -->
                                                        <input type="hidden" name="country" value="<?php echo $searchCountry; ?>">
                                                        <input type="hidden" name="state" value="<?php echo $searchState; ?>"> 
                                                        <input type="hidden" name="city" value="<?php echo $searchCity; ?>">
                                                        <input type="hidden" name="hotel_name" value="<?php echo $searchHotel; ?>">   


                                                        <input type="hidden" name="delete_path_id" value="<?php echo $auto_result['id']; ?>">
                                                        <input type="hidden" name="delete_path[]" value="<?php echo $img_val; ?>"> 
                                                        <input type="hidden" name="delete_name[]" value="<?php echo $img_val; ?>">    
                                                        <input type="submit" name="delete_photo" value="Delete " class="btn btn-outline-danger" <?php echo $disabled; ?>>
                                                    </div>
                                                </div>
                                            </form>
                                            </div><!-- end col -->

                                          <!-- <img class="img" src='<?php echo $img_val; ?>'> -->
                                          
                                    <?php } }
                                    else{
                                        echo "There is no photo to display";
                                    }  ?>
                                                    <!-- <input type="file" id="hotelPhoto" required="" name="hotelPhoto[]" class="form-control" multiple=""> -->
                                                     </div>
                                                </div>
                            </div>
                       
                        </div>

                    </div>
                     
                </div>
            <?php } ?>
                                    
                       
                    </div> <!-- container -->

                </div> <!-- content -->

        </div>
        <!-- END wrapper -->
<?php 
include_once("footer.php");
?>