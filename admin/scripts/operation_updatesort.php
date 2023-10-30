<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php"); 
	
	$dir = $_POST['dir'];
	$id = $_POST['id'];
	
	$selectFirst = mysqli_query($link, "SELECT * FROM in_operations_type WHERE id = '$id'");
	$getFirst = mysqli_fetch_array($selectFirst);
	
	
	if ($dir == "up")
	{
		$selectSecond = mysqli_query($link, "SELECT * FROM in_operations_type WHERE sort < $getFirst[sort] ORDER by sort DESC LIMIT 1");
		$getSecond = mysqli_fetch_array($selectSecond);
		
		$update = mysqli_query($link, "UPDATE in_operations_type SET sort = '$getSecond[sort]' WHERE id = '$id'");
		$update = mysqli_query($link, "UPDATE in_operations_type SET sort = '$getFirst[sort]' WHERE id = '$getSecond[id]'");
	}
	
	if ($dir == "down")
	{
		$selectSecond = mysqli_query($link, "SELECT * FROM in_operations_type WHERE sort > $getFirst[sort] ORDER by sort ASC LIMIT 1");
		$getSecond = mysqli_fetch_array($selectSecond);
		
		$update = mysqli_query($link, "UPDATE in_operations_type SET sort = '$getSecond[sort]' WHERE id = '$id'");
		$update = mysqli_query($link, "UPDATE in_operations_type SET sort = '$getFirst[sort]' WHERE id = '$getSecond[id]'");
	}
?>
