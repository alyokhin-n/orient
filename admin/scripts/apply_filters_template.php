<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$id = mysqli_real_escape_string($link, $_POST['id']);

	$select = mysqli_query($link, "SELECT * FROM in_filters_template WHERE id = '$id'");
	if(mysqli_num_rows($select) > 0){
		$get = mysqli_fetch_array($select);

		echo $get['filters'];
	}else{
		echo 2;
	}
?>