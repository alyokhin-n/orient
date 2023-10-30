<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");
	$id = mysqli_real_escape_string($link, $_POST['id']);
	$now = date("Y-m-d H:i:s");

	$update = mysqli_query($link, "UPDATE in_clients SET avatar='default_img.png', admin_set_photo = 'true', set_photo_date = '$now' WHERE id = '$id'");

	echo "1"
?>