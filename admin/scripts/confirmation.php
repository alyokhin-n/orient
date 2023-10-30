<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php"); 
	$type = mysqli_real_escape_string($link, $_POST['type']);
	$id = mysqli_real_escape_string($link, $_POST['id']);
	
	if ($type == "user")
	{
		$select = mysqli_query($link, "SELECT * FROM in_users WHERE id = '$id'");
		$get = mysqli_fetch_array($select);
		$name = $get['name'];
		$linkYes = "users.php?delete=".$get['id'];
		$linkNo = "users.php";
	}
	if ($type == "client")
	{
		$select = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$id'");
		$get = mysqli_fetch_array($select);
		$name = $get['name'];
		$linkYes = "clients.php?delete=".$get['id'];
		$linkNo = "clients.php";
	}
	
	if ($type == "clientban")
	{
		$select = mysqli_query($link, "UPDATE in_clients SET banned = NULL, login_attempts = NULL, ban_date_end = NULL WHERE id = '$id'");
		
	}
	if ($type == "object")
	{
		$select = mysqli_query($link, "SELECT * FROM in_objects WHERE id = '$id'");
		$get = mysqli_fetch_array($select);
		$name = $get['name'];
		$linkYes = "objects.php?delete=".$get['id'];
		$linkNo = "objects.php";
	}
	if($type == "push")
	{
		$select = mysqli_query($link, "SELECT * FROM in_push WHERE id = '$id'");
		$get = mysqli_fetch_array($select);
		$name = $get['title'];
		$linkYes = "pushlist.php?delete=".$get['id'];
		$linkNo = "pushlist.php";
	}
	
	if($type == "route")
	{
		$select = mysqli_query($link, "SELECT * FROM in_routes WHERE id = '$id'");
		$get = mysqli_fetch_array($select);
		$name = $get['name'];
		$linkYes = "routes.php?delete=".$get['id'];
		$linkNo = "routes.php";
	}

	if($type == "control_point")
	{
		$select = mysqli_query($link, "SELECT * FROM in_control_points WHERE id = '$id'");
		$get = mysqli_fetch_array($select);
		$name = $get['name'];
		$linkYes = "control_points.php?delete=".$get['id'];
		$linkNo = "control_points.php";
	}
	if($type == "ar")
	{
		$select = mysqli_query($link, "SELECT * FROM ar_models WHERE id = '$id'");
		$get = mysqli_fetch_array($select);
		$name = $get['name'];
		$linkYes = "armodels.php?delete=".$get['id'];
		$linkNo = "armodels.php";
	}
?>

<div class="modal-body">
	<div class="row">
		<div class="col-lg-12">
			<h5>Точно удалить <?php echo $name ?>?</h5>
			
		</div><!--end col-->
	</div><!--end row-->                                                    
</div><!--end modal-body-->
<div class="modal-footer">
	<a href="<?php echo $linkNo; ?>" class="btn btn-secondary btn-sm" data-dismiss="modal">Нет</a>
	<a href="<?php echo $linkYes; ?>" class="btn btn-warning btn-sm">Да</a>
</div><!--end modal-footer-->