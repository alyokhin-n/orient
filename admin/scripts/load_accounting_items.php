<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$type = $_POST['type'];

	if($type == 'chart'){
		$select = mysqli_query($link, "SELECT * FROM in_account_chart");
		while($get = mysqli_fetch_array($select)){
?>
<div class="row">
	<div class="col-auto">
		<h6 style="font-size: 20px;font-weight: bold;color: black;margin-top: 6px;"><?php echo $get['id']; ?></h6>
	</div>
	<div class="col">
		<p style="margin-bottom: 0px;font-size: 21px;box-shadow: rgb(0 0 0 / 35%) 0px 0px 15px;padding-left: 10px;color: black;"><?php echo $get['name']; ?></p>
	</div>
</div>
<?php }} ?>

<?php
	if($type == 'employees'){
		$select = mysqli_query($link, "SELECT * FROM in_employees");
		while($get = mysqli_fetch_array($select)){
?>
<div class="row" style="margin-bottom: 7px;">
	<div class="col-auto">
		<h6 style="font-size: 20px;font-weight: bold;color: black;margin-top: 6px;"><?php echo $get['id']; ?></h6>
	</div>
	<div class="col">
		<p style="margin-bottom: 0px;font-size: 21px;box-shadow: rgb(0 0 0 / 35%) 0px 0px 15px;padding-left: 10px;color: black;"><img src="../../admin/uploads/clients/<?php echo $get['avatar']; ?>" style="height: 40px;width: 40px;object-fit: cover;border-radius: 50%;margin-right: 20px;"><?php echo $get['name']; ?></p>
	</div>
</div>
<?php }} ?>

<?php
	if($type == 'kontragenty'){
		$select = mysqli_query($link, "SELECT * FROM in_kontragenty");
		while($get = mysqli_fetch_array($select)){
?>
<div class="row" style="margin-bottom: 7px;">
	<div class="col-auto">
		<h6 style="font-size: 20px;font-weight: bold;color: black;margin-top: 6px;"><?php echo $get['id']; ?></h6>
	</div>
	<div class="col">
		<p style="margin-bottom: 0px;font-size: 21px;box-shadow: rgb(0 0 0 / 35%) 0px 0px 15px;padding-left: 10px;color: black;"><img src="../../admin/uploads/clients/<?php echo $get['avatar']; ?>" style="height: 40px;width: 40px;object-fit: cover;border-radius: 50%;margin-right: 20px;"><?php echo $get['name']; ?></p>
	</div>
</div>
<?php }} ?>

<?php
	if($type == 'product'){
		$select = mysqli_query($link, "SELECT * FROM in_product");
		while($get = mysqli_fetch_array($select)){
?>
<div class="row" style="margin-bottom: 7px;">
	<div class="col-auto">
		<h6 style="font-size: 20px;font-weight: bold;color: black;margin-top: 6px;"><?php echo $get['id']; ?></h6>
	</div>
	<div class="col">
		<p style="margin-bottom: 0px;font-size: 21px;box-shadow: rgb(0 0 0 / 35%) 0px 0px 15px;padding-left: 10px;color: black;"><?php echo $get['name']; ?></p>
	</div>
</div>
<?php }} ?>

<?php
	if($type == 'bill'){
		$select = mysqli_query($link, "SELECT * FROM in_bill");
		while($get = mysqli_fetch_array($select)){
?>
<div class="row" style="margin-bottom: 7px;">
	<div class="col-auto">
		<h6 style="font-size: 20px;font-weight: bold;color: black;margin-top: 6px;"><?php echo $get['id']; ?></h6>
	</div>
	<div class="col">
		<p style="margin-bottom: 0px;font-size: 21px;box-shadow: rgb(0 0 0 / 35%) 0px 0px 15px;padding-left: 10px;color: black;"><img src="../../admin/uploads/clients/<?php echo $get['avatar']; ?>" style="height: 40px;width: 40px;object-fit: cover;border-radius: 50%;margin-right: 20px;"><?php echo $get['name']; ?></p>
	</div>
</div>
<?php }} ?>

<?php
	if($type == 'hashtags'){
		$select = mysqli_query($link, "SELECT * FROM in_hashtags");
		while($get = mysqli_fetch_array($select)){
?>
<div class="row" style="margin-bottom: 7px;">
	<div class="col-auto">
		<h6 style="font-size: 20px;font-weight: bold;color: black;margin-top: 6px;"><?php echo $get['id']; ?></h6>
	</div>
	<div class="col">
		<p style="margin-bottom: 0px;font-size: 21px;box-shadow: rgb(0 0 0 / 35%) 0px 0px 15px;padding-left: 10px;color: black;"><?php echo "#" . $get['name']; ?></p>
	</div>
</div>
<?php }} ?>

<?php
	if($type == 'elements'){
		$select = mysqli_query($link, "SELECT * FROM in_elements");
		while($get = mysqli_fetch_array($select)){
			$select_tag = mysqli_query($link, "SELECT * FROM in_hashtags WHERE id = '$get[tag_id]'");
			$get_tag = mysqli_fetch_array($select_tag);
?>
<div class="row" style="margin-bottom: 7px;">
	<div class="col-auto">
		<h6 style="font-size: 20px;font-weight: bold;color: black;margin-top: 6px;"><?php echo $get['id']; ?></h6>
	</div>
	<div class="col" style="box-shadow: rgb(0 0 0 / 35%) 0px 0px 15px;">
		<div class="img-elements" style="float: left;margin-top: 5px;margin-left: 10px;">
			<img src="../../admin/uploads/elements/<?php echo $get['avatar']; ?>" style="height: 40px;width: 40px;object-fit: cover;border-radius: 50%;margin-right: 20px;">
		</div>
		<div class="info-elements">
			<p style="margin-bottom: 0px;font-size: 21px;padding-left: 10px;color: black;"><?php echo $get['name']; ?></p>
			<span>#<?php echo $get_tag['name']; ?></span>
		</div>
	</div>
</div>
<?php }} ?>

<?php
	if($type == 'operations'){
		$select = mysqli_query($link, "SELECT * FROM in_operations_type ORDER by sort ASC");

		$result2 = "SELECT MAX(sort) as maxSort FROM in_operations_type ORDER by sort ASC";  
		$result2 = mysqli_query($link, $result2);
		$getMaxSort2 = mysqli_fetch_array($result2);
		while($get = mysqli_fetch_array($select)){
			$select_tag = mysqli_query($link, "SELECT * FROM in_hashtags WHERE id = '$get[tag_id]'");
			$get_tag = mysqli_fetch_array($select_tag);
			if(empty($get['avatar'])){
				$image = '../../admin/uploads/noimage.png';
			}else{
				$image = '../../admin/uploads/operations/'.$get['avatar'];
			}
?>
<div class="row" style="margin-bottom: 7px;">
	<div class="col-auto">
		<h6 style="font-size: 20px;font-weight: bold;color: black;margin-top: 6px;"><?php echo $get['id']; ?></h6>
	</div>
	<div class="col" style="box-shadow: rgb(0 0 0 / 35%) 0px 0px 15px;">
		<div class="img-elements" style="float: left;margin-top: 5px;margin-left: 10px;">
			<img src="<?php echo $image; ?>" style="height: 40px;width: 40px;object-fit: cover;border-radius: 50%;margin-right: 20px;">
		</div>
		<div class="info-elements">
			<p style="margin-bottom: 0px;font-size: 21px;padding-left: 10px;color: black;"><?php echo $get['name']; ?></p>
			<span>#<?php echo $get_tag['name']; ?></span>
			<div style="float: right;position: relative;top: -20px;">
				<?php 
				if ($get['sort'] == 1)
				{
					$displayFirst = "display:none;";
				}
				else
				{
					$displayFirst = "";
				}

				if ($get['sort'] == $getMaxSort2['maxSort'])
				{
					$displayLast = "display:none;";
				}
				else
				{
					$displayLast = "";
				}
				?>
				<button type="button" class="btn btn-soft-primary waves-effect waves-light sortup<?php echo $get['id'] ?>" style="<?php echo $displayFirst; ?>"><i class="dripicons-arrow-thin-up"></i></button>
				<button type="button" class="btn btn-soft-primary waves-effect waves-light sortdown<?php echo $get['id'] ?>" style="<?php echo $displayLast; ?>"><i class="dripicons-arrow-thin-down"></i></button>
				<script>
					$( ".sortup<?php echo $get['id'] ?>" ).click(function() {
						$.post( "scripts/operation_updatesort.php", { dir: "up", id: "<?php echo $get['id'] ?>" }).done(function( data ) {
							$(".loadOperations").load("scripts/load_accounting_items.php", { type: "operations" });
						});
					});
					$( ".sortdown<?php echo $get['id'] ?>" ).click(function() {
						$.post( "scripts/operation_updatesort.php", { dir: "down", id: "<?php echo $get['id'] ?>" }).done(function( data ) {
							$(".loadOperations").load("scripts/load_accounting_items.php", { type: "operations" });
						});
					});
				</script>
			</div>
		</div>
	</div>
</div>
<?php }} ?>