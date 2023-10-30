<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");

	$value = $_POST['value'];

	$update = mysqli_query($link, "UPDATE in_constants SET value = '$value' WHERE name = 'coach_percent'");

	if($update == TRUE){
		$insert = mysqli_query($link, "INSERT INTO in_percent_coach_log (user_id,value,create_date) VALUES ('$_SESSION[user]','$value',NOW())");
		echo 1;
	}else{
		echo 2;
	}
?>