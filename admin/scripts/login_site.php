<?php
	include("../config/dbconnect_site.php");

	$client = $_POST['client'];

	$_SESSION['client'] = $client;
	$_SESSION['message'] = 1;
?>