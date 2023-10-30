<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");
	$id = mysqli_real_escape_string($link, $_POST['id']);
	$now = date("Y-m-d H:i:s");

	$update = mysqli_query($link, "UPDATE in_wishlist SET favorites = 'true' WHERE id = '$id'");

	echo "1"
?>