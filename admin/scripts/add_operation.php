<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");


	$date = mysqli_real_escape_string($link, $_POST['date']);
	$type = mysqli_real_escape_string($link, $_POST['type']);
	$name = mysqli_real_escape_string($link, $_POST['name']);
	$sum = mysqli_real_escape_string($link, $_POST['sum']);
	$comment = mysqli_real_escape_string($link, $_POST['comment']);

	$clients = $_POST['clients'];
	$routes = $_POST['routes'];
	$elements = $_POST['elements'];

	// foreach ($elements as $key => $value) {
	// 	$result .= $value;
	// }

	$insert = mysqli_query($link, "INSERT INTO in_operations (date,type,name,money,comment) VALUES ('$date','$type','$name','$sum','$comment')");

	$last_id = mysqli_insert_id($link);

	if($clients != '' && $clients != '0'){
		$insert_elements = mysqli_query($link, "INSERT INTO in_operations_elements (operation_id,client_id) VALUES ('$last_id','$clients')");
	}
	if($routes != '' && $routes != '0'){
		$insert_elements = mysqli_query($link, "INSERT INTO in_operations_elements (operation_id,route_id) VALUES ('$last_id','$routes')");
	}
	if($elements != ''){
		foreach ($elements as $key => $value) {
			$insert_elements = mysqli_query($link, "INSERT INTO in_operations_elements (operation_id,element_id) VALUES ('$last_id','$value')");		
		}
	}

	if($insert == TRUE){

		if($_FILES['files']['name'] != ''){
			$countfiles = count($_FILES['files']['name']);

			$upload_location = "../../admin/uploads/operations/";

			$files_arr = array();

			for($index = 0;$index < $countfiles;$index++){
				if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
					$filename = $_FILES['files']['name'][$index];

					$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

					$rand = mt_rand(10000000, 1000000000);
					$imageName = time().$rand.".".$ext;

					$path = $upload_location.$imageName;

					if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
						$files_arr[] = $path;
						$update = mysqli_query($link, "INSERT INTO in_operations_files (operation_id, file) VALUES ('$last_id','$imageName')");
					}
				}
			}
		}
        
		echo 1;
	}else{
		echo 2;
	}
?>