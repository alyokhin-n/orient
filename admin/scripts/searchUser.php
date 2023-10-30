<?php
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");
	$keyword = strval($_POST['query']);
	
	
	
	$sql = mysqli_query($link, "SELECT * FROM in_clients WHERE nikname LIKE '%$keyword%' ORDER by id DESC"); 
	while($row = mysqli_fetch_assoc($sql))
	{
		$userResult[] = $row["nikname"];
	}
	echo json_encode($userResult);

?>	