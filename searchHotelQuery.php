<?php
// session_start();
include 'db.php';

// $q = intval($_GET['q']);
$q = $_REQUEST["q"];
$id1 = $_SESSION['adminId'];
// $array = array();
if($_SESSION['adminId'] == 1){
  $sql = "SELECT * FROM add_update_hotels WHERE CONCAT(`hotel_name`,`address1`,`city`,`state`,`country`,`zip`) LIKE '%$q%'";}
else{
  $sql = "SELECT * FROM add_update_hotels WHERE agent_id = $id1 AND CONCAT(`hotel_name`,`address1`,`city`,`state`,`country`,`zip`) LIKE '%$q%'";
}
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
      while($rowSearch = mysqli_fetch_assoc($result)) {
            $name =  $rowSearch['hotel_name'];
            $arrayPhoto = $rowSearch['image_path'];
            // $arrayPath = array();     
              // echo $row['hotel_name'];
            $arrayPath = json_decode($arrayPhoto, true);
              
      // }

      // print_r($arrayPhoto);
            // $name= $array;

    // foreach($arrayData as $name) {
            // $sqlsearch = "SELECT * FROM add_update_hotels WHERE hotel_name = '$name'";
            // $resultsearch = mysqli_query($conn,$sqlsearch);
      // while($rowSearch = mysqli_fetch_array($resultsearch)) {
  
            $country = $rowSearch['country'];
            $state = $rowSearch['state'];
            $city = $rowSearch['city'];

// }
            
            // print_r($arrayPath);

            echo $name === "" ? "no suggestion" : "<div class='col-lg-4'><div class='card'><div class='card-body ribbon-box'><a href = 'update_hotel.php?country=$country&state=$state&city=$city&hotel_name=$name'><div class='ribbon ribbon-dark'>Hotel Name : &nbsp;<span style = 'color:red;'>". $name. "</span></div><div class='mb-0'><img class='card-img-top img-fluid' src='" . $arrayPath[0] .  "'></div></a></div></div></div>";
          }
        }
        else{
          echo "No Record Found";
        }

    // }
// }

// Output "no suggestion" if no hint was found or output correct values 

?>