<?php 
	include("config/dbconnect.php"); 
	$id = mysqli_real_escape_string($link, $_POST['id']);
	
	$selectObject = mysqli_query($link, "SELECT * FROM in_objects WHERE id = '$id'");
	$get = mysqli_fetch_array($selectObject);
?>

<img class="object-img" src="/admin/uploads/objects/<?php echo $get['image'] ?>">
<p class="object-name"><?php echo $get['name'] ?></p>
<p class="object-description"><?php echo $get['address'] ?></p>
<p class="object-price"><?php echo number_format($get['cost'], 0, ',', ' ') ?> ₽</p>