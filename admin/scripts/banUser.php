<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");
	$id = mysqli_real_escape_string($link, $_POST['id']);
	$datetime = mysqli_real_escape_string($link, $_POST['datetime']);
	$comment = mysqli_real_escape_string($link, $_POST['comment']);

	$update = mysqli_query($link, "UPDATE in_clients SET banned = '1', ban_date_end = '$datetime' WHERE id = '$id'");

	if($update == TRUE){
		echo 1;
	}else{
		echo 2;
	}
?>