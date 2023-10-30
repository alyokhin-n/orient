<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$type = $_POST['type'];
	
	// if($type == 'chart'){
	// 	$name = mysqli_real_escape_string($link, $_POST['name']);

	// 	$check = mysqli_query($link, "SELECT * FROM in_account_chart WHERE name = '$name'");
	// 	if(mysqli_num_rows($check) <= 0){
	// 		$insert = mysqli_query($link, "INSERT INTO in_account_chart (name) VALUES ('$name')");

	// 		if($insert == TRUE){
	// 			echo 1;
	// 		}else{
	// 			echo 2;
	// 		}
	// 	}else{
	// 		echo 3;
	// 	}
	// }

	// if($type == 'employees'){
	// 	$name = mysqli_real_escape_string($link, $_POST['name']);

	// 	$check = mysqli_query($link, "SELECT * FROM in_employees WHERE name = '$name'");
	// 	if(mysqli_num_rows($check) <= 0){
	// 		$insert = mysqli_query($link, "INSERT INTO in_employees (name) VALUES ('$name')");

	// 		if($insert == TRUE){
	// 			echo 1;
	// 		}else{
	// 			echo 2;
	// 		}
	// 	}else{
	// 		echo 3;
	// 	}
	// }

	// if($type == 'kontragenty'){
	// 	$name = mysqli_real_escape_string($link, $_POST['name']);

	// 	$check = mysqli_query($link, "SELECT * FROM in_kontragenty WHERE name = '$name'");
	// 	if(mysqli_num_rows($check) <= 0){
	// 		$insert = mysqli_query($link, "INSERT INTO in_kontragenty (name) VALUES ('$name')");

	// 		if($insert == TRUE){
	// 			echo 1;
	// 		}else{
	// 			echo 2;
	// 		}
	// 	}else{
	// 		echo 3;
	// 	}
	// }

	// if($type == 'product'){
	// 	$name = mysqli_real_escape_string($link, $_POST['name']);

	// 	$check = mysqli_query($link, "SELECT * FROM in_product WHERE name = '$name'");
	// 	if(mysqli_num_rows($check) <= 0){
	// 		$insert = mysqli_query($link, "INSERT INTO in_product (name) VALUES ('$name')");

	// 		if($insert == TRUE){
	// 			echo 1;
	// 		}else{
	// 			echo 2;
	// 		}
	// 	}else{
	// 		echo 3;
	// 	}
	// }

	// if($type == 'bill'){
	// 	$name = mysqli_real_escape_string($link, $_POST['name']);

	// 	$check = mysqli_query($link, "SELECT * FROM in_bill WHERE name = '$name'");
	// 	if(mysqli_num_rows($check) <= 0){
	// 		$insert = mysqli_query($link, "INSERT INTO in_bill (name) VALUES ('$name')");

	// 		if($insert == TRUE){
	// 			echo 1;
	// 		}else{
	// 			echo 2;
	// 		}
	// 	}else{
	// 		echo 3;
	// 	}
	// }

	if($type == 'hashtags'){
		$name = mysqli_real_escape_string($link, $_POST['name']);

		$check = mysqli_query($link, "SELECT * FROM in_hashtags WHERE name = '$name'");
		if(mysqli_num_rows($check) <= 0){
			$insert = mysqli_query($link, "INSERT INTO in_hashtags (name) VALUES ('$name')");

			if($insert == TRUE){
				echo 1;
			}else{
				echo 2;
			}
		}else{
			echo 3;
		}
	}

	if($type == 'elements'){
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$tag = mysqli_real_escape_string($link, $_POST['tag']);

		$check = mysqli_query($link, "SELECT * FROM in_elements WHERE name = '$name'");
		if(mysqli_num_rows($check) <= 0){
			$insert = mysqli_query($link, "INSERT INTO in_elements (name, tag_id, create_date) VALUES ('$name', '$tag', NOW())");

			if($insert == TRUE){
				echo 1;
			}else{
				echo 2;
			}
		}else{
			echo 3;
		}
	}

	if($type == 'operations'){
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$tag = mysqli_real_escape_string($link, $_POST['tag']);

		$check = mysqli_query($link, "SELECT * FROM in_operations_type WHERE name = '$name'");
		if(mysqli_num_rows($check) <= 0){
			$insert = mysqli_query($link, "INSERT INTO in_operations_type (name, tag_id, create_date) VALUES ('$name', '$tag', NOW())");

			if($insert == TRUE){
				echo 1;
			}else{
				echo 2;
			}
		}else{
			echo 3;
		}
	}
?>