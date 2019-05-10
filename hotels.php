<?php
include_once("header.php");
include_once("sidebar.php");
include_once("topbar.php");
?>
 
 					<div class="col-12">
                    <div class="row">
                        <div class="col-12">
                             <div class="page-title-box">
                        
                                <h4 class="page-title">Request For Approval</h4>
                             </div>
                        </div>
                    </div>
               <table id="basic-datatable" class="table dt-responsive nowrap">
                <div class="row">
                  <div class="col-12">
                    <thead>
                        <tr>
                          <div class="col-lg-4 col-xl-4">
                            <th>Hotel Images</th>
                          </div>
                          <div class="col-lg-8 col-xl-8">
                            <th>Hotel Details</th>
                          </div>
                        
                        </tr>
                    </thead>
                  </div>
               </div>
                    
               <form action="addHotelQuery.php" method="get" enctype="multipart/form-data">

               	<div class="row"> 
                  <div class="col-12">

               		<tbody>
               			 <?php

				                   				$sql_approve = "SELECT * FROM `add_update_hotels` WHERE `approval` = 'Approved'";
				                                     $result_approve = mysqli_query($conn, $sql_approve);
				                                     $count = mysqli_num_rows($result_approve);
                                             $i=0;
				                               while($auto_result=mysqli_fetch_assoc($result_approve)){
                                             $hotel_id = $auto_result['id'];
				                                     $image_path=json_decode($auto_result['image_path'], true);
				                                     $country = $auto_result['country'];
				                                     $city = $auto_result['city'];
				                                     $state = $auto_result['state'];
				                                     $hotel_name = $auto_result['hotel_name'];
				                                     $approval_id = $auto_result['id'];
                                             $amenities = json_decode($auto_result['amenities']);
                                            $des = $auto_result['description'];
                                            // echo $des;
				                                             
                                            ?>
                              <div class="modal fade" id="centermodal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myCenterModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myCenterModalLabel">Description</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <h5></h5>
                                            <p><?php echo $des;?></p>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                             </div><!-- /.modal -->

                              <div class="modal fade" id="bs-example-modal-sm<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="mySmallModalLabel">Amenities</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                      <ul>
                                         <?php foreach($amenities as $amenitie){ ?>
                                        <li>
                                       <?php echo $amenitie . "<br>"; }?>
                                         
                                       </li>
                                     </ul>
                                    </div>
                                </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                      <tr>
                        <div class="col-lg-4 col-xl-4">
                          <td style="width: 30%"> 
                           <div class="card d-block">
                              <a class="example-image-link" href="<?php echo $image_path[0];?>" data-lightbox="example-set" data-title="<?php echo $auto_result['hotel_name'];?>"><img style="height:230px;" class="card-img-top img-fluid example-image" src="<?php echo $image_path[0]; ?>" /></a>
                           </div> 
                       
                         </td> 
                       </div> 
                       <div class="col-lg-8 col-xl-8"><!-- end col -->
                        <td>
                          <!-- <div class="card"> -->
                          	<!-- <center><h4 style="color: black;">Hotel Detail</h4></center> -->
                          	<div class="card card-body ribbon-box">
                          	 <div class='ribbon ribbon-primary'><span style="font-weight: bold;"><?php echo ucfirst($auto_result['hotel_name']) . " , " . ucfirst($auto_result['address1']). " , " . ucfirst($auto_result['location']);?></span><br>
                              <span>
                               <?php
                            $rating = explode('.', $auto_result['rating']);
                            $fullStar = $rating[0];
                            $halfStar = $rating[1];

                            for ($j=0; $j < $fullStar; $j++) { 

                              ?>
                              <i class="mdi mdi-star"></i>
                              <?php
                              
                            }

                            if($halfStar!=0){?>
                              <i class="mdi mdi-star-half"></i>
                              <?php
                            }


                                ?>
                             </span><br>
                             <span>Rating : <?php echo $auto_result['rating']."/5"; ?></span><span style="float: right;"><?php 
                            echo $auto_result['roomType']; ?></span><br>
                             <span style="float: right; font-size: 18px; font-weight: bolder;"><?php
                             $price = explode(' ', $auto_result['price']);
                             $price = $price[0];

                              echo " £ " . $price; ?></span>
                           </div>

                             <p><button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#bs-example-modal-sm<?php echo $i;?>">Amenities</button></p>

                               <p><button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#centermodal<?php echo $i; $i++;?>">Description</button></p>



                           

                         </div>
                      <!-- </div>   -->
                     <a href="bookFlight.php"> <input type="submit" name="callNow" value="Select Flight" class="btn btn-warning" style="float: right; margin-right: 10px;"></a>
                      <a href="bookHotel.php?hotel_id=<?php echo $hotel_id; ?>"> <input type="submit" name="callNow" value="Skip Flight & Generate Invoice" class="btn btn-warning" style="float: right; margin-right: 10px;"></a>
                    </td>
                  </div>                                         
                </tr>
                 <?php } ?>
              </tbody>
            </div>
                      
          </div>
         </form>
       
      </table>
    </div>
                                   
                                     
                                  <!-- </div>
                             
                                </div>
                            </div>
                        </div> -->

                        
                    
						
<?php 
include_once("footer.php");
?>