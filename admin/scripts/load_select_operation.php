<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");

	$response = array();
	$response["operations"] = [];
	$count = 0;

	$type = $_POST['type'];
	$type = substr($type, 1);

	$select = mysqli_query($link, "SELECT * FROM in_operations_type WHERE tag_id = (SELECT id FROM in_hashtags WHERE name = '$type')");
	while($get = mysqli_fetch_array($select)){
		$response["operations"][$count]["name"] = $get['name'];
		$count++;
	}

	echo json_encode($response);
?>