<?php 
	include("../config/dbconnect.php"); 
	// Count total files
	$countfiles = count($_FILES['files_images']['name']);
	
	// Upload directory
	$upload_location = "../uploads/partners/";
	
	// To store uploaded files path
	$files_arr = array();
	
	// Loop all files
	for($index = 0;$index < $countfiles;$index++){
		
		if(isset($_FILES['files_images']['name'][$index]) && $_FILES['files_images']['name'][$index] != ''){
			// File name
			$filename = $_FILES['files_images']['name'][$index];
			
			
			// Get extension
			$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
			
			$rand = mt_rand(10000000, 1000000000);
			$imageName = time().$rand.".".$ext;
			
			// Valid image extension
			$valid_ext = array("png","jpeg","jpg");
			
			// Check extension
			if(in_array($ext, $valid_ext)){
				
				// File path
				$path = $upload_location.$imageName;
				
				// Upload file
				if(move_uploaded_file($_FILES['files_images']['tmp_name'][$index],$path)){
					$files_arr[] = $path;
					$update = mysqli_query($link, "INSERT INTO in_images (type, image) VALUES ('partner','$imageName')");
				}
			}
		}
	}
	
	echo json_encode($files_arr);
?>