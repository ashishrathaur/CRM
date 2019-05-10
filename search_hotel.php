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
            
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="name">Hotel Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" onkeyup="showHint(this.value)" name="hotelName" placeholder="Hotel Name">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           <!--  <?php //if(!empty($_REQUEST['hotelName'])){ ?> -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body"> 
                                    <!-- <div class='row'>      -->
                            		 <div class="row" id="txtHint"></div>
                                    <!-- </div> -->
                            		</div>
                            	</div>
                            </div>
                        
                    </div>


<?php 
include_once("footer.php");
?>
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "searchHotelQuery.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>