<?php
include 'db.php';
// echo $_SESSION['adminId'] ." " . $_SESSION['adminName'];
if(isset($_POST['submit'])){
	
	foreach($_FILES["hotelPhoto"]["tmp_name"] as $key => $tmp_name){

		$hotelPhoto_name=$_FILES['hotelPhoto']['name'][$key];
		$tmp_name=$_FILES['hotelPhoto']['tmp_name'][$key];
		$hotelPhoto_type=$_FILES['hotelPhoto']['type'][$key];

		$file_path="img/".date('Ymdhis').$hotelPhoto_name;
		$image_path[] = $file_path;
		
		move_uploaded_file($tmp_name, $file_path);
		// header("location: add_hotel.php?message=Kindly Contact Technical Team Hotel  inserted");
	}

		$hotelName = $_POST['hoteName'];	
		$editor1 = $_POST['editor1'];
		// $hotelPhoto = json_encode($_FILES['hotelPhoto']);
		$hotelPhotoPath = json_encode($image_path);
		// print_r($hotelPhotoPath);
		// die;
		$amenities = json_encode($_POST['amenities']);
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$zip = $_POST['zip'];

		$id = $_SESSION['adminId'];
		$name = $_SESSION['adminName'];	
	
	// $array = $amenities;
	// print_r($array);
// $amenities = json_encode($amenities);
// print_r($hotelPhoto);


$sql = "INSERT INTO `add_update_hotels`(`hotel_name`, `description`, `image_path`, `amenities`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `agent_update_datetime`, `agent_id`, `agent_name`) VALUES ('$hotelName','$editor1', '$hotelPhotoPath','$amenities','$address1','$address2','$city','$state','$country','$zip',CURRENT_TIMESTAMP,'$id','$name')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("location: add_hotel.php?message=Kindly Contact Technical Team Hotel inserted");
}

// else{
// 	header('location: add_hotel.php?message=Kindly Contact Technical Team Hotel Not inserted');
// }


if(isset($_POST['delete_photo'])){
	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$hotel_name = $_POST['hotel_name'];


	$delete_photo = $_POST['delete_path'];
	$delete_path_id = $_POST['delete_path_id'];
	$delete_name = $_POST['delete_name'];
	$deleteName = str_replace('img/','', $delete_name);
	// echo $delete_path_id;
	// print_r(explode(',', $deleteName));
	// print_r($delete_photo);
	$idFetch = "SELECT * FROM `add_update_hotels` WHERE id  = $delete_path_id";
	$result_image = mysqli_query($conn, $idFetch);
     $fetchImage = mysqli_fetch_assoc($result_image);
     $db_image = json_decode($fetchImage['image_path'], true);
     $db_image_name = $fetchImage['image'];
      // $db_image_name = json_decode($fetchImage['image']);
     // print_r(json_decode($db_image_name));
  //    echo "<br>";
     // print_r($db_image);
	 // echo "<br>";
     $left_image = json_encode(array_diff($db_image, $delete_photo), true);

     // print_r($left_image);

     $updateImage = "UPDATE `add_update_hotels` set image_path = '$left_image' where id = '$delete_path_id'";
    
     // die;
     $updateImageQyery = mysqli_query($conn, $updateImage);
      if($updateImageQyery){
      	// unlink($delete_photo[0]);
      	header("location: update_hotel.php?message=Update successfully&country=$country&state=$state&city=$city&hotel_name=$hotel_name");
      	 // echo $updateImage;
      	// echo "success";
      }
}
if(isset($_POST['update'])){
		$hotel_name = $_POST['hotel_name'];
		// $hotelName = $_POST['hoteName'];	
		$update_id = $_POST['update_id'];
		// $hotelPhoto = json_encode($_FILES['hotelPhoto']);
		// $hotelPhotoPath = json_encode($image_path);
		// print_r($hotelPhotoPath);
		// die;
		$amenities = json_encode($_POST['amenities']);
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$zip = $_POST['zip'];
		$editor1 = $_POST['editor1'];

		$updateHotelDetails = "UPDATE `add_update_hotels` set amenities = '$amenities', address1 = '$address1', address2 = '$address2', city = '$city', state = '$state', country = '$country', zip = '$zip', description = '$editor1' where id = '$update_id'";
		 $updateHotelDetailsQyery = mysqli_query($conn, $updateHotelDetails);
      if($updateHotelDetailsQyery){
      	// unlink($delete_photo[0]);
      	header("location: update_hotel.php?message=Update successfully&country=$country&state=$state&city=$city&hotel_name=$hotel_name");
      	 // echo $updateImage;
      	// echo "success";
      }
}

if(isset($_POST['submit_img'])){
	
	foreach($_FILES["hotelPhoto"]["tmp_name"] as $key => $tmp_name){

	$country = $_POST['country'];
	$state = $_POST['state'];
	$city = $_POST['city'];
	$hotel_name = $_POST['hotel_name'];


		$hotelPhoto_name=$_FILES['hotelPhoto']['name'][$key];
		$tmp_name=$_FILES['hotelPhoto']['tmp_name'][$key];
		$hotelPhoto_type=$_FILES['hotelPhoto']['type'][$key];

		$file_path="img/".date('Ymdhis').$hotelPhoto_name;
		$image_path[] = $file_path;
		
		move_uploaded_file($tmp_name, $file_path);
		// header("location: add_hotel.php?message=Kindly Contact Technical Team Hotel  inserted");
	}
	// $hotelPhotoPath = json_encode($image_path);
	$update_id = $_POST['updated_id'];
	// echo $update_id;
	$fetchPhotoPath = "SELECT * FROM `add_update_hotels` WHERE id  = $update_id";
	$result_photo = mysqli_query($conn, $fetchPhotoPath);
     $fetchRowPhoto = mysqli_fetch_assoc($result_photo);
     $db_image = json_decode($fetchRowPhoto['image_path'], true);
     // $db_image_name = $fetchImage['image'];
     // print_r($image_path);
     // echo "<br>";
     // print_r(array_merge($db_image,$image_path));
     $mergeArray = array_merge($db_image,$image_path);
     $jsonPhotoPath = json_encode($mergeArray);
     print_r($jsonPhotoPath);

     $addImage = "UPDATE `add_update_hotels` set image_path = '$jsonPhotoPath' where id = '$update_id'";
    
     // die;
     $addImageQyery = mysqli_query($conn, $addImage);
      if($addImageQyery){
      	// unlink($delete_photo[0]);
      	header("location: update_hotel.php?message=Add successfully&country=$country&state=$state&city=$city&hotel_name=$hotel_name");
      	 // echo $updateImage;
      	// echo "success";
      }
}

if(isset($_POST['login'])){
    $adminName = $_POST['adminName'];
    $adminPassword = $_POST['adminPassword'];

    $adminsql = "SELECT * FROM `admin` WHERE adminName = '$adminName' AND adminPassword = '$adminPassword'";
    $result = mysqli_query($conn, $adminsql);
    $fetch = mysqli_fetch_assoc($result);
	    	

	        if($fetch){
	        	$_SESSION['adminId'] = $fetch['adminId'];
		        $_SESSION['adminName'] = $fetch['adminName'];
		        $_SESSION['adminPassword'] = $fetch['adminPassword'];
	        	// echo $pass;
	        	// die;
	             header("location: dashboard.php");
	        }
	        else{
	             header("location: index.php?message=Please_enter_correct_username&password");
	        }
    
    // if($result){
    //     header('location : dashboard.php');
    // }
}

if(isset($_POST['submit_amt'])){

	if(!empty($_POST['amenitiesName'])){
	$amnitiesName = $_POST['amenitiesName'];

	$sqlFetch = "SELECT * FROM amnities";
	$fetchAmenties = mysqli_query($conn, $sqlFetch);
	while($fetchrow = mysqli_fetch_assoc($fetchAmenties)){
		$haveAmenities = $fetchrow['amnities'];
		// echo $haveAmenities;
}
	
	if($amnitiesName != $haveAmenities){


	$sql = "INSERT INTO `amnities`(`amnities`) VALUES ('$amnitiesName')";

			if (mysqli_query($conn, $sql)) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			header("location: addAmenities.php?message=Kindly Contact Technical Team amenities inserted");

}
else{
	header("location: addAmenities.php?message=$amnitiesName already exists.");
}
}


else{
		header("location: addAmenities.php?message=Please Fill Amenities");
}
}	

if(isset($_POST['addAgent'])){

	$agentName = $_POST['agentName'];
	$agentEmail = $_POST['agentEmail'];
	$agentnumber = $_POST['agentnumber'];
	$agentpassword = $_POST['agentpassword'];
	$agentpassword2 = $_POST['agentpassword2'];
	// echo $agentpassword2;
	// die;
	if($agentpassword !== $agentpassword2){
		header("location: addAgent.php?message=password_not_match");
	}
	else{
// die;
	 $agentsql = "INSERT INTO `admin`(`adminName`, `adminPassword`, `agentEmail`, `agentnumber`, `agentpassword2`) VALUES ('$agentName', '$agentpassword', '$agentEmail', '$agentnumber', '$agentpassword2')";
     		$resultAgent = mysqli_query($conn, $agentsql);
    		$fetch = mysqli_fetch_assoc($resultAgent);
             if($fetch){
	        	
	             header("location: addAgent.php?message=password_not_match.");
	        }
	        else{
	             header("location: addAgent.php?message=Agent_success_add.");
	        }
}
}

if(isset($_REQUEST['approval'])){

	$approval_id = $_REQUEST['approval_id'];

	$approval = "UPDATE `add_update_hotels` SET approval = 'Approved' WHERE id = $approval_id";
	 $approvalQuery = mysqli_query($conn, $approval);
      if($approvalQuery){
      	// unlink($delete_photo[0]);
      	header("location: request.php?message=Approved_successfully.");
      	 // echo $updateImage;
      	// echo "success";
      }
}

if(isset($_REQUEST['disapprove'])){

	$approval_id = $_REQUEST['approval_id'];

	$disapproval = "UPDATE `add_update_hotels` SET approval = 'Disapproved', datetime = CURRENT_TIMESTAMP WHERE id = $approval_id";
	 $disapprovalQuery = mysqli_query($conn, $disapproval);
      if($disapprovalQuery){
      	// unlink($delete_photo[0]);
      	header("location: request.php?message=Disapproved_successfully.");
      	 // echo $updateImage;
      	// echo "success";
      }
}

?>