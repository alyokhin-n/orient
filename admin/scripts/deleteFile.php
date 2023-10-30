<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$type = $_POST['type'];

	if($type == 'operation'){
		$id = $_POST['id'];

		$select_files = mysqli_query($link, "SELECT * FROM in_operations_files WHERE id = '$id'");
		$get_files = mysqli_fetch_array($select_files);
		unlink("../../admin/uploads/operations/".$get_files['file']);
		$del = mysqli_query($link, "DELETE FROM in_operations_files WHERE id = '$id'");

		if($del == TRUE){
			echo 1;
		}else{
			echo 2;
		}
	}
?>