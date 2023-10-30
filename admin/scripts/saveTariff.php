<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");
	$id = mysqli_real_escape_string($link, $_POST['id']);
	$hints = mysqli_real_escape_string($link, $_POST['hints']);
	$month = mysqli_real_escape_string($link, $_POST['month']);
	$half_year = mysqli_real_escape_string($link, $_POST['half_year']);
	$year = mysqli_real_escape_string($link, $_POST['year']);

	$update = mysqli_query($link, "UPDATE in_tariffs SET hints = '$hints', month = '$month', half_year = '$half_year', year = '$year' WHERE id = '$id'");


	if($update == TRUE){
		echo "1";
	}else{
		echo "2";
	}
?>