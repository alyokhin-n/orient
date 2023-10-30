<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$id = mysqli_real_escape_string($link, $_POST['id']);

	$delete = mysqli_query($link, "DELETE FROM in_routes_comments WHERE id = '$id'");
	if($delete == TRUE){
		echo 1;
	}else{
		echo 2;
	}
?>