<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");

	$name = mysqli_real_escape_string($link, $_POST['name']);
	$description = mysqli_real_escape_string($link, $_POST['description']);
	$users = $_POST['users'];


	$insert = mysqli_query($link, "INSERT INTO in_push (title,description,create_date) VALUES ('$name','$description',NOW())");
	$last_id = mysqli_insert_id($link);

	foreach ($users as $key => $value) {
		if($value != ''){
			$value = mysqli_real_escape_string($link, $value);

			$select_client = mysqli_query($link, "SELECT * FROM in_clients WHERE nikname = '$value'");
			$get_client = mysqli_fetch_array($select_client);

			$insert_users = mysqli_query($link, "INSERT INTO in_push_clients (push_id, client_id) VALUES ('$last_id','$get_client[id]')");
		}
	}

	if($insert == TRUE){
		echo 1;
	}else{
		echo 2;
	}
?>