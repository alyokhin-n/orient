<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$type = mysqli_real_escape_string($link, $_POST['type']);
	$name = mysqli_real_escape_string($link, $_POST['name']);
	$filters = $_POST['filters'];

	$check_name = mysqli_query($link, "SELECT * FROM in_filters_template WHERE name = '$name'");
	if(mysqli_num_rows($check_name) <= 0){

		$insert = mysqli_query($link, "INSERT INTO in_filters_template (type,user_id,name,filters,create_date) VALUES ('$type','$_SESSION[user]','$name','$filters',NOW())");

		if($insert == TRUE){
			echo 1;
		}else{
			echo 2;
		}
	}else{
		echo 3;
	}
?>