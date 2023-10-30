<?php 
	include("../config/dbconnect.php"); 
	$id = $_POST['id'];
	$selectPartners = mysqli_query($link, "SELECT * FROM in_images WHERE id = '$id'");
	$getPartner = mysqli_fetch_array($selectPartners);
	unlink("../../admin/uploads/medals/".$getPartner['image']);
	$del = mysqli_query($link, "DELETE FROM in_images WHERE id = '$id'");
?>