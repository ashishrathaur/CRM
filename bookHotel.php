<?php
include_once("header.php");
include_once("sidebar.php");
include_once("topbar.php");

$hotel_id = $_REQUEST['hotel_id'];
?>
<div class="col-12">
                    <div class="row">
                        <div class="col-12">
                             <div class="page-title-box">
                        
                                <h4 class="page-title">Book Hotel</h4>
                             </div>
                        </div>
                    </div>
                      <div class="col-12">
                                <div class="card">
                                    <div class="card-body">                                    
            
                                        <form class="form-horizontal" action="hotelInvoice.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="custName" name="custName" placeholder="Ex: John Andrew">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Contact Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Ex: 1234567890">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Email Id</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="emailid" name="emailid" placeholder="Ex: xxxx123@gmail.com">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Check In</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="checkIn" name="checkIn" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Check Out</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="checkOut" name="checkOut" placeholder="dd/mm/yyyy">
                                                </div>
                                            </div>

                                             <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Adult</label>
                                                <div class="col-sm-10">
                                                    
                                                    <select class="form-control" name="adult" id="adult">
                                                        <option value="1">Adult 1</option>
                                                        <option value="2">Adult 2</option>
                                                        <option value="3">Adult 3</option>
                                                        <option value="4">Adult 4</option>
                                                        <option value="5">Adult 5</option>
                                                        <option value="6">Adult 6</option>
                                                        <option value="7">Adult 7</option>
                                                        <option value="8">Adult 8</option>
                                                    </select>  

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Child</label>
                                                <div class="col-sm-10">
                                                    
                                                    <select class="form-control" name="child" id="child">
                                                        <option value="1">Child 0</option>
                                                        <option value="1">Child 1</option>
                                                        <option value="2">Child 2</option>
                                                        <option value="3">Child 3</option>
                                                        <option value="4">Child 4</option>
                                                        <option value="5">Child 5</option>
                                                        <option value="6">Child 6</option>
                                                        <option value="7">Child 7</option>
                                                        <option value="8">Child 8</option>
                                                    </select>  

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Billing Address</label>
                                                <div class="col-sm-10">
                                                   <textarea type="text" class="form-control" id="editor1" name="editor1"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Net Amount</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="netAmount" name="netAmount" placeholder="00.00">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="grossAmount" name="grossAmount" placeholder="00.00">
                                                </div>
                                            </div>
                                            <label class="col-sm-2 col-form-label" for="name"></label>
                                            <button class="btn btn-success" id="bookHotel" name="bookHotel">Submit</button>
                                        </form>
                                    </div>
                                </div>
                       </div>
                </div>
<?php 
include_once("footer.php");
?>