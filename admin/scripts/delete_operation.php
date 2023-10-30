<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$id = $_POST['id'];

	$delete = mysqli_query($link, "DELETE FROM in_operations WHERE id = '$id'");

	if($delete == TRUE){
		$delete_elements = mysqli_query($link, "DELETE FROM in_operations_elements WHERE operation_id = '$id'");

		$select_files = mysqli_query($link, "SELECT * FROM in_operations_files WHERE id = '$id'");
		while($get_files = mysqli_fetch_array($select_files)){
			unlink("../../admin/uploads/operations/".$get_files['file']);
			$del = mysqli_query($link, "DELETE FROM in_operations_files WHERE id = '$get_files[id]'");
		}
		
		echo 1;
	}else{
		echo 2;
	}
?>