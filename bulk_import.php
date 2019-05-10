<?php
include_once("db.php");

 // $sqlFetch = "SELECT * FROM add_update_hotels";
 //                        $result = mysqli_query($conn, $sqlFetch);
 //                        // $tabledata = array();
 //                        if(mysqli_num_rows($result) > 0){
 //                        while($fetchrow = mysqli_fetch_array($result)){
 //                          print_r($fetchrow);
 //                          // $haveAmenitie = array();
 //                          // $tabledata[]  = $fetchrow;
 //                        }
 //                      }
 //                      die;
    // $haveAmenitie[] = $fetchrow['location'];
    // $haveAmenitie[] = $fetchrow['category'];
      // $hotelVal      = array_column($haveValue, 0);
      // $locationVal   = array_column($haveValue, 'location');
      // $categoryVal   = array_column($haveValue, 'category');
      // $ratingVal     = array_column($haveValue, 'rating');
      // $roomTypeyVal  = array_column($haveValue, 'roomType');
      // $boardVal      = array_column($haveValue, 'board');
      // $priceVal      = array_column($haveValue, 'price');
   // print_r($hotelVal);
// die;

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



// check file name is not empty
if(!empty($_FILES['file']['name'])) {
	  // Get File extension eg. 'xlsx' to check file is excel sheet
	$pathinfo = pathinfo($_FILES["file"]["name"]);
	$excelname=$_FILES["file"]["name"];

	$path= "excelfile/".$_FILES["file"]["name"];
      
    
    // print_r($_FILES);
   // print_r($pathinfo);
   // die;
   // echo $_FILES["file"]["name"];
    // $pathinfo ="ak.xls";
     
    // check file has extension xlsx, xls and also check 
    // file is not empty
   if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls') 
           && $_FILES['file']['size'] > 0 ) {
         
        // Temporary file name
        $inputFileName = $_FILES['file']['tmp_name'];

    	move_uploaded_file($inputFileName, $path);





$inputFileName = $path;

/** Create a new Xls Reader  **/
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
//    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
//    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xml();
//    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
//    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Slk();
//    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Gnumeric();
//    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
/** Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);
$worksheet = $spreadsheet->getActiveSheet();
$highestColumn = $worksheet->getHighestColumn();
$highestRow = $worksheet->getHighestRow();
// echo $highestColumn.$highestRow;
// echo "<table>";

  
    
    // array_push($haveAmenities,array("0"=>$fetchrow['hotel_name']));
     // print_r($haveValue);
    // echo $haveAmenities;

  $tempInsertValues = array();
for ($i='5';$i<=$highestRow;$i++) {
  // echo "<tr>";
                      // $insertValues = '';
                      // $insertValues .= '(';
                      // $tempVals = array();
                    	for ($j='A';$j<=$highestColumn;$j++) {
                    		$cellValue = $spreadsheet->getActiveSheet()->getCell($j.$i)->getValue();
                        // $insertValues .= "'".$cellValue."'"
                        switch($j){
                          case "A":
                          $columnName = 'hotel_name';
                          break;

                          case "B":
                          $columnName = 'location';
                          break;

                          case "C":
                          $columnName = 'category';
                          break;

                          case "D":
                          $columnName = 'rating';
                          break;

                          case "E":
                          $columnName = 'roomType';
                          break;

                          case "F":
                          $columnName = 'board';
                          break;

                          case "G":
                          $columnName = 'price';

                          break;

                          default:
                          $columnName = 'xxx';
                          break;
                        }
                        $tempVals[$i][$columnName] = $cellValue;
                        // $tempVals[] = mysqli_real_escape_string($conn,$cellValue);
                    		// echo "<td>".$cellValue."</td>";
              
                   // $data[$j.$i]=$cellValue;
                     }
                   }

                      $sqlFetch = "SELECT * FROM add_update_hotels";
                        $result = mysqli_query($conn, $sqlFetch);
                        $tabledata = array();
                        if(mysqli_num_rows($result) > 0){
                        while($fetchrow = mysqli_fetch_assoc($result)){
                          // print_r($fetchrow);
                          // $haveAmenitie = array();
                          $tabledata[]  = $fetchrow;
                          // print_r($tabledata);
                        }
                        $emptyData = false;
                      }

                        else{
                          $emptyData = true;
                        }
                    
                         
                          
                            $hotelVal = array_column($tabledata, 'hotel_name');
                            $locationVal = array_column($tabledata, 'location');
                            $categoryVal = array_column($tabledata, 'category');
                            $ratingVal = array_column($tabledata, 'rating');
                            $roomTypeVal = array_column($tabledata, 'roomType');
                            $boardVal = array_column($tabledata, 'board');
                            $priceVal = array_column($tabledata, 'price');
                          // $haveValue = array('0'=>$hotel_name, '1'=>$location, '2'=>$category, '3'=>$rating, '4'=>$roomType, '5'=>$board, '6'=>$price);
                           foreach($tempVals as $index=>$value){
                            // print_r($value);
                            if((in_array($value['hotel_name'], $hotelVal) && in_array($value['location'], $locationVal) && in_array($value['category'], $categoryVal) && in_array($value['rating'], $ratingVal) && in_array($value['roomType'], $roomTypeVal) && in_array($value['board'], $boardVal)) && $emptyData == false){
                              // echo "success matched"."<br>";
                             }else{
                                $insertValuesX = "('".mysqli_real_escape_string($conn, $value['hotel_name'])."', '".mysqli_real_escape_string($conn, $value['location'])."', '".mysqli_real_escape_string($conn, $value['category'])."', '".mysqli_real_escape_string($conn, $value['rating'])."', '".mysqli_real_escape_string($conn, $value['roomType'])."', '".mysqli_real_escape_string($conn, $value['board'])."', '".mysqli_real_escape_string($conn, $value['price'])."')";
                              if (mysqli_query($conn, "INSERT INTO `add_update_hotels` (`hotel_name`, `location`, `category`, `rating`, `roomType`, `board`, `price`) VALUES $insertValuesX")) {
                                // echo 'INserted';
                                
                            
                              }else {

                                echo "error";
                                header("location: addHotelFiles.php?message=There is some problem in excel file you may contact tech team"."Error: " . $sqlFetch . "<br>" . mysqli_error($conn));
                              } 
                              // echo "not matched"."<br>";
                             }
                             header("location: addHotelFiles.php?message=Hotel Recorded");
                            // print_r($value);

                          }

                          
                           
                         
                                        //                    if(in_array($tempVals, haystack))
                                        //                   $insertValues .= "'".implode("', '", $tempVals)."'";
                                        //                   $insertValues .= ')';
                                        // $sql = mysqli_query($conn, "INSERT INTO `add_update_hotels` (`hotel_name`, `location`, `category`, `rating`, `roomType`, `board`, `price`) VALUES $insertValues");
                                        // if ($sql) {
                                        //   // header("Loaction: add_hotel_in_bulk.php?message=Hotel send for approval");
                                        // } else {
                                        //   $tempInsertValues[] = $insertValues;
                                        // }
                                                          // $tempInsertValues[] = $insertValues;
	// echo "</tr>";  
   // $sql=mysqli_query($con,"INSERT INTO `hotels` (`hotel_name`, `location`, `category`, `rating`, `room_type`, `board`, `price`) VALUES ('".$cellValue[0]."', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');");

                                      
                                      
                                        // foreach($tempVals2 as $tempVals3){
                                         
                                        // foreach($haveValue as $val2){
                                          // print_r($tempVals2)."<br>";
// $val3 = $val2;
     // print_r($haveValue)."<br>";qqd

     // print_r($arraydiff);
                                    
                                        // if(empty($tempInsertValues)){
                                          // echo '<head><meta http-equiv="refresh" content="0; url=addHotelFiles.php?message=Hotel send for approval" /></head>';
                                          // header("Loaction: add_hotel_in_bulk.php?message=Hotel send for approval");

                                        // }else{

                                          // echo '<head><meta http-equiv="refresh" content="0; url=addHotelFiles.php?message=Contact Tech Team" /></head>';
                                          // header("Loaction: add_hotel_in_bulk.php?message=Contact Tech Team");

                                        // }
            // echo "INSERT INTO `hotels` (`hotel_name`, `location`, `category`, `rating`, `room_type`, `board`, `price`) VALUES ".implode(', ', $tempInsertValues);
                                        // $sql = mysqli_query($conn, "INSERT INTO `hotels` (`hotel_name`, `location`, `category`, `rating`, `room_type`, `board`, `price`) VALUES ".implode(', ', $tempInsertValues));
                                        // // echo "</table>";
                                        // if($sql){
                                        //   header("Loaction: add_hotel_in_bulk.php?message=Hotel send for approval");

                                        // }else{
                                        //   header("Loaction: add_hotel_in_bulk.php?message=Contact Tech Team");

                                        

 
}
else {
 
        echo "Please Select Valid Excel File";
    }
 
} else {
 
    echo "Please Select Excel File";
     
}

?>