<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$id = $_POST['id'];
	$action = $_POST['action'];
	$type = $_POST['type'];
	$name = $_POST['name'];
	$date_from = $_POST['date_from'];
	$date_to = $_POST['date_to'];
	$hashtag = $_POST['hashtag'];
	$client = $_POST['client'];

	$select = mysqli_query($link, "SELECT * FROM in_operations WHERE id = '$id'");
	$get = mysqli_fetch_array($select);

	if(empty($get['image'])){
		$image = '../../admin/uploads/noimage.png';
	}else{
		$image = '../../admin/uploads/'.$get['image'];
	}
?>
<div class="modal-body">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><?php echo $get['name']; ?></h1>
			</div>
			<div class="col-lg-6">
				<img src="../../uploads/<?php echo $image; ?>" style="width: 50%;height: 200px;object-fit: cover;">
			</div>
			<div class="col-lg-6">
				<p><b>Дата операции: </b><?php echo date("d.m.Y H:i:s", strtotime($get['date'])); ?></p>
				<p><b>Тип операции: </b><?php echo $get['type']; ?></p>
				<?php
					$select_detail = mysqli_query($link, "SELECT * FROM in_operations_elements WHERE operation_id = '$id'");
					while($get_detail = mysqli_fetch_array($select_detail)){
						if($get_detail['client_id'] != null){
							$select_user = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$get_detail[client_id]'");
							$get_user = mysqli_fetch_array($select_user);
							?>
							<p><b>Пользователь: </b><?php echo $get_user['nikname']; ?></p>
							<?php
						}
						if($get_detail['route_id'] != null){
							$select_route = mysqli_query($link, "SELECT * FROM in_routes WHERE id = '$get_detail[route_id]'");
							$get_route = mysqli_fetch_array($select_route);
							?>
							<p><b>Маршрут: </b><?php echo $get_route['name']; ?></p>
							<?php
						}
						if($get_detail['element_id'] != null){
							$select_element = mysqli_query($link, "SELECT * FROM in_elements WHERE id = '$get_detail[element_id]'");
							$get_element = mysqli_fetch_array($select_element);

							$select_hashtag = mysqli_query($link, "SELECT * FROM in_hashtags WHERE id = '$get_element[tag_id]'");
							$get_hashtag = mysqli_fetch_array($select_hashtag);
							?>
							<p><b><?php echo $get_element['name']; ?></b>(<?php echo $get_hashtag['name']; ?>)</p>
							<?php
						}
					}
				?>
				<p><b>Комментарий операции: </b><?php echo $get['comment']; ?></p>
				<?php if($get['money'] != '' && $get['money'] != null){ ?>
					<div class="operations-money">
						<div class="minus" style="display: flex;">
							<h5 class="my-0">Расход, у.е:</h5>
							<span>
								<?php
								if($get['type'] == '#операции-расход'){
									echo $get['money'];
								}else{
									echo "0";
								}
								?>
							</span>
						</div>
						<div class="plus" style="display: flex;">
							<h5 class="my-0">Приход, у.е:</h5>
							<span>
								<?php
								if($get['type'] == '#операции-приход'){
									echo $get['money'];
								}else{
									echo "0";
								}
								?>
							</span>
						</div>
						<div class="sum" style="display: flex;">
							<h5 class="my-0">Итог, у.е:</h5>
							<?php
							if($get['type'] == '#операции-расход'){
								echo '<span style="color: #EB5757;">' . $get['money'] . '</span>';
							}
							if($get['type'] == '#операции-приход'){
								echo '<span style="color: #219653;">' . $get['money'] . '</span>';
							}
							?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-primary btn-sm waves-effect waves-light editBtn">Редактировать</button>
	<button class="btn btn-danger btn-sm waves-effect waves-light deleteBtn">Удалить</button>
	<!-- <button class="btn btn-secondary btn-sm" data-dismiss="modal">Закрыть</button> -->
</div>

<script>
	$(".editBtn").click(function(){
		$.post( "scripts/load_edit_operation.php", {id: "<?php echo $id; ?>", action: "<?php echo $action; ?>", type: "<?php echo $type; ?>", name: "<?php echo $name; ?>", date_from: "<?php echo $date_from; ?>", date_to: "<?php echo $date_to; ?>", hashtag: "<?php echo $hashtag; ?>", client: "<?php echo $client; ?>"})
        .done(function( data ) {
        	$(".loadDataOperation").html(data);
            // $("#operationModal").modal("show");
        });
	});

	$(".deleteBtn").click(function(){
		$.post( "scripts/confirmation_operation.php", {id: "<?php echo $id; ?>", action: "<?php echo $action; ?>", type: "<?php echo $type; ?>", name: "<?php echo $name; ?>", date_from: "<?php echo $date_from; ?>", date_to: "<?php echo $date_to; ?>", hashtag: "<?php echo $hashtag; ?>", client: "<?php echo $client; ?>"})
        .done(function( data ) {
        	$("#operationModal").modal('hide');
        	$(".loadedContentDel").html(data);
        	$("#delOperationModal").modal('show');
        });
	});
</script>