<?php

session_start();

		$corp_code 		= $_REQUEST['corp_code'];
	//	$corp_code        ='sram';
		$_SESSION["corp_code"] = $corp_code; 

include "connect.php";

date_default_timezone_set('Asia/Kolkata'); 
$activityDate= date("Y-m-d H:i:s");

 $title = $_POST['title'];
 $location = $_POST['location'];
 $type = $_POST['type'];
 $uploadedBy = $_POST['userType'];
 $location1 =  "videos/";
 
 /*$title ='jagadeesh';
 $location ='visekapatnam';
 $type ='video';  */
 
$result = array("success" => $_FILES['video']['name']);
$file_path = basename( $_FILES['video']['name']);
$ServerURL = "http://115.98.3.215:90/sRamapptest/".$location1.$file_path;
$InsertSQL = mysqli_query($con,"INSERT INTO `fieldActivity`(`title`,`location`,`path`,`type`,`uploadedBy`,`activityDate`) VALUES ('$title','$location','$ServerURL','$type','$uploadedBy','$activityDate')");

if(move_uploaded_file($_FILES['video']['tmp_name'],"videos/".$file_path)) {
    $result = array("success" => "successfully uploaded");
} else{
    $result = array("success" => "error uploading file");
}
echo json_encode($result, JSON_PRETTY_PRINT);

?>

