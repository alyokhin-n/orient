<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");
	$route_id = mysqli_real_escape_string($link, $_POST['route_id']);
	$markerId = mysqli_real_escape_string($link, $_POST['markerId']);
	$type = mysqli_real_escape_string($link, $_POST['type']);
	$mlat = mysqli_real_escape_string($link, $_POST['mlat']);
	$mlng = mysqli_real_escape_string($link, $_POST['mlng']);
	
	if ($type == "set")
	{
		$ins = mysqli_query($link, "INSERT INTO in_routes_points (route_id, lat, lng, marker_id) VALUES ('$route_id','$mlat','$mlng','$markerId')");
	}
	if ($type == "update")
	{
		$ins = mysqli_query($link, "UPDATE in_routes_points SET lat = '$mlat', lng = '$mlng' WHERE marker_id = '$markerId' AND route_id = '$route_id'");
	}
	if ($type == "delete")
	{
		$ins = mysqli_query($link, "DELETE FROM in_routes_points WHERE marker_id = '$markerId' AND route_id = '$route_id'");
	}
?>