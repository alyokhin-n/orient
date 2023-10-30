<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");

	$val = $_POST['val'];
	
	foreach ($val as $v) {
		$select_cp = mysqli_query($link, "SELECT * FROM in_control_points WHERE id = '$v'");
		$get_cp = mysqli_fetch_array($select_cp);
		$check_ar = mysqli_query($link, "SELECT * FROM in_ar_points WHERE point_id = '$v'");
		if(mysqli_num_rows($check_ar) > 0){
			$get_ar = mysqli_fetch_array($check_ar);
			?>
			<div class="col-sm-1">
				<button type="button" class="btn btn-primary showAr" data-id="<?php echo $get_ar['ar_id'] ?>">Посмотреть AR по <?php echo $get_cp['name']; ?></button>
				<script>
					$(".showAr").click(function(){
						var id = $(this).attr("data-id");

						var a = document.createElement('a');
						a.target="_blank";
						a.href='/admin/threejs.php?id='+id;
						a.click();
					});
				</script>
			</div>
			<?php
		}else{
			?>
			<div class="col-sm-1">
				<button class="btn btn-danger" disabled>Нету AR по <?php echo $get_cp['name']; ?></button>
			</div>
			<?php
		}
	}
?>