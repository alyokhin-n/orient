<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$action = $_POST['action'];

	if(empty($action)){

		$select_operation_type = mysqli_query($link, "SELECT ot.id,ot.name,ot.avatar,ot.tag_id,ot.create_date,ot.sort,h.name as tag_name FROM in_operations_type as ot LEFT JOIN in_hashtags as h ON ot.tag_id = h.id ORDER by ot.sort ASC");
		while($get_operation_type = mysqli_fetch_array($select_operation_type)){
			if($get_operation_type['tag_name'] == 'маршруты'){
				$select = mysqli_query($link, "SELECT id, CONCAT(type, '', if(type != '#операции-расход' AND type != '#операции-приход', '', name)) AS full_name, date, type, name, money, `comment`, image, COUNT(*) as count, SUM(money) as money_sum FROM in_operations WHERE type = '#маршруты' GROUP BY full_name ORDER BY date DESC");
				$get = mysqli_fetch_array($select);
			}else{
				$select = mysqli_query($link, "SELECT id, CONCAT(type, '', if(type != '#операции-расход' AND type != '#операции-приход', '', name)) AS full_name, date, type, name, money, `comment`, image, COUNT(*) as count, SUM(money) as money_sum FROM in_operations WHERE type = '#$get_operation_type[tag_name]' AND name = '$get_operation_type[name]' GROUP BY full_name ORDER BY date DESC");
				$get = mysqli_fetch_array($select);
			}
		
			if(empty($get_operation_type['avatar'])){
				$image = '../../admin/uploads/noimage.png';
			}else{
				$image = '../../admin/uploads/operations/'.$get_operation_type['avatar'];
			}

			$name = $get_operation_type['name'];

			if(empty($get['date'])){
				$date = 'Нет данных';
			}else{
				$date = date("d.m.Y H:i:s", strtotime($get['date']));
			}

			if(empty($get['count'])){
				$count = 0;
			}else{
				$count = $get['count'];
			}
			?>
			<div class="card shadow-none border mb-1 openGroup" data-type="<?php echo $get['type']; ?>" data-name="<?php echo $name; ?>" style="height: 100px;cursor: pointer;">
				<div class="card-header" id="headingOne" style="background-color: #f1f5fa;position: relative;height: 100px;">
					<div class="operations-info">
						<div>
							<img src="<?php echo $image; ?>">
						</div>
						<div>
							<p style="margin-bottom: 0px;"><i class="far fa-clock" style="margin-right: 5px;"></i><?php echo $date; ?></p>
							<h5 class="my-0"><?php echo $name . " (" . $count . ")"; ?></h5>
							<span><?php echo '#'.$get_operation_type['tag_name']; ?></span>
						</div>
					</div>
					<?php if($get['money_sum'] != '' && $get['money_sum'] != null){ ?>
						<div class="operations-money" style="float: right;">
							<div class="minus" style="display: flex;">
								<h5 class="my-0">Расход, у.е:</h5>
								<span>
									<?php
									if($get['type'] == '#операции-расход'){
										echo $get['money_sum'];
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
										echo $get['money_sum'];
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
									echo '<span style="color: #EB5757;">' . $get['money_sum'] . '</span>';
								}
								if($get['type'] == '#операции-приход'){
									echo '<span style="color: #219653;">' . $get['money_sum'] . '</span>';
								}
								?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		<?php } ?>

		<script>
			$(".openGroup").click(function(){
				var type = $(this).attr("data-type");
				var name = $(this).attr("data-name");

				$(".loadOperation").hide();
				$(".loader").css("display", "block");
				$.post( "scripts/load_operation.php", {action: 'group', type: type, name: name, action_with: ''})
				.done(function( data ) {
					let timerId = setTimeout(function tick() {
						$(".loader").css("display", "none");
						$(".loadOperation").html(data);
						$(".loadOperation").show();
					}, 1000);
				});
			});
		</script>

<?php } ?>

<?php
	if($action == 'group'){
		$type = $_POST['type'];
		$name = $_POST['name'];
		$name_sql = mysqli_real_escape_string($link, $name);
		$type_sql = mysqli_real_escape_string($link, $type);

		if($type != '#маршруты'){
			$sql = "SELECT * FROM in_operations WHERE type = '$type_sql' AND name = '$name_sql' ORDER BY date DESC";
		}else{
			$sql = "SELECT * FROM in_operations WHERE type = '$type_sql' AND money IS NULL ORDER BY date DESC";
		}

		?>
		<div class="group-info" style="display: flex;margin-bottom: 20px;">
			<button type="button" class="btn btn-info waves-effect waves-light backButton"><i class="fas fa-arrow-left" style="margin-right: 5px;"></i>Назад</button>
			<h4 style="margin-left: 30px;"><?php echo $name; ?></h4>
			<p style="margin-bottom: 0px;margin-top: 12px;margin-left: 20px;"><?php echo $type; ?></p>
		</div>
		<?php

		$select = mysqli_query($link, $sql);
		while($get = mysqli_fetch_array($select)){
			if(empty($get['image'])){
				$image = '../../admin/uploads/noimage.png';
			}else{
				$image = '../../admin/uploads/'.$get['image'];
			}
			?>
			<div class="card shadow-none border mb-1 openOperation" data-id="<?php echo $get['id']; ?>" style="height: 100px;cursor: pointer;">
				<div class="card-header" id="headingOne" style="background-color: #f1f5fa;position: relative;height: 100px;">
					<div class="operations-info">
						<div>
							<img src="<?php echo $image; ?>">
						</div>
						<div>
							<p style="margin-bottom: 0px;"><i class="far fa-clock" style="margin-right: 5px;"></i><?php echo date("d.m.Y H:i:s", strtotime($get['date'])); ?></p>
							<h5 class="my-0"><?php echo $get['name']; ?></h5>
							<span><?php echo $get['type']; ?></span>
						</div>
					</div>
					<?php if($get['money'] != '' && $get['money'] != null){ ?>
						<div class="operations-money" style="float: right;">
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
	<?php } ?>
	<script>
		$(".openOperation").click(function(){
			var id = $(this).attr("data-id");

			$.post( "scripts/load_operation_data.php", { id: id, action: "<?php echo $action; ?>", type: "<?php echo $type; ?>", name: "<?php echo $name; ?>" })
            .done(function( data ) {
                $(".loadDataOperation").html(data);
                $("#operationModal").modal("show");
            });
		});

		$(".backButton").click(function(){
			$(".loadOperation").hide();
			$(".loader").css("display", "block");
            $.post( "scripts/load_operation.php")
            .done(function( data ) {
                let timerId = setTimeout(function tick() {
                    $(".loader").css("display", "none");
                    $(".loadOperation").html(data);
                    $(".loadOperation").show();
                }, 1000);
            });
		});
	</script>
<?php } ?>

<?php
	if($action == 'search'){
		$date_from = $_POST['date_from'];
		$date_to = $_POST['date_to'];
		$hashtag = $_POST['hashtag'];
		$client = $_POST['client'];

		if($date_from != ''){
			$q .= " AND date >= '$date_from 00:00:00'";
		}
		if($date_to != ''){
			$q .= " AND date <= '$date_to 23:59:59'";
		}
		if($hashtag != '' && $hashtag != 'all'){
			$hashtag_sql = mysqli_real_escape_string($link, $hashtag);
			$q .= " AND type = '#$hashtag_sql'";
		}
		if($client != '' && $client != 'all'){
			$q .= " AND id IN (SELECT operation_id FROM in_operations_elements WHERE client_id = '$client')";
		}

		$select = mysqli_query($link, "SELECT * FROM in_operations WHERE id != '' $q ORDER BY date DESC");
		while($get = mysqli_fetch_array($select)){
			if(empty($get['image'])){
				$image = '../../admin/uploads/noimage.png';
			}else{
				$image = '../../admin/uploads/'.$get['image'];
			}

			if($get['type'] == '#маршруты'){
				$name = 'Создание маршрута';
			}else{
				$name = $get['name'];
			}
			?>
			<div class="card shadow-none border mb-1 openOperation" data-id="<?php echo $get['id']; ?>" style="height: 100px;cursor: pointer;">
				<div class="card-header" id="headingOne" style="background-color: #f1f5fa;position: relative;height: 100px;">
					<div class="operations-info">
						<div>
							<img src="<?php echo $image; ?>">
						</div>
						<div>
							<p style="margin-bottom: 0px;"><i class="far fa-clock" style="margin-right: 5px;"></i><?php echo date("d.m.Y H:i:s", strtotime($get['date'])); ?></p>
							<h5 class="my-0"><?php echo $get['name']; ?></h5>
							<span><?php echo $get['type']; ?></span>
						</div>
					</div>
					<?php if($get['money'] != '' && $get['money'] != null){ ?>
						<div class="operations-money" style="float: right;">
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
		<?php } ?>

		<script>
			$(".openOperation").click(function(){
				var id = $(this).attr("data-id");

				$.post( "scripts/load_operation_data.php", { id: id, action: "<?php echo $action; ?>", date_from: "<?php echo $date_from; ?>", date_to: "<?php echo $date_to; ?>", hashtag: "<?php echo $hashtag; ?>", client: "<?php echo $client; ?>" })
				.done(function( data ) {
					$(".loadDataOperation").html(data);
					$("#operationModal").modal("show");
				});
			});
		</script>
<?php } ?>

<?php
	if($action == 'report'){
		$date_from = $_POST['date_from'];
		$date_to = $_POST['date_to'];
		$operation = $_POST['operation'];
		$client = $_POST['client'];

		if($date_from != ''){
			$q .= " AND date >= '$date_from 00:00:00'";
		}
		if($date_to != ''){
			$q .= " AND date <= '$date_to 23:59:59'";
		}
		if($operation != ''){
			$o = 0;
			$q_oper = "";
			foreach ($operation as $key => $value) {
				$select_operation_type = mysqli_query($link, "SELECT ot.id,ot.name,ot.avatar,ot.tag_id,ot.create_date,ot.sort,h.name as tag_name FROM in_operations_type as ot LEFT JOIN in_hashtags as h ON ot.tag_id = h.id WHERE ot.id = '$value'");
				$get_operation_type = mysqli_fetch_array($select_operation_type);

				if($get_operation_type['tag_name'] == 'маршруты'){
					if($o == 0){
						$q_oper .= " type = '#$get_operation_type[tag_name]'";
					}else{
						$q_oper .= " OR type = '#$get_operation_type[tag_name]'";
					}
					$o++;
				}else{
					if($o == 0){
						$q_oper .= " name = '$get_operation_type[name]'";
					}else{
						$q_oper .= " OR name = '$get_operation_type[name]'";
					}
					$o++;
				}
			}

			$q .= " AND ($q_oper)";
		}
		if($client != '' && $client != 'all'){
			$q .= " AND id IN (SELECT operation_id FROM in_operations_elements WHERE client_id = '$client')";
		}

		$select_plus = mysqli_query($link, "SELECT SUM(money) as sum FROM in_operations WHERE id != '' $q AND type = '#операции-приход'");
		$get_plus = mysqli_fetch_array($select_plus);
		$plus = $get_plus['sum'];
		if($plus < 0 OR $plus == NULL OR $plus == ''){
			$plus = 0;
		}

		$select_minus = mysqli_query($link, "SELECT SUM(money) as sum FROM in_operations WHERE id != '' $q AND type = '#операции-расход'");
		$get_minus = mysqli_fetch_array($select_minus);
		$minus = $get_minus['sum'];
		if($minus < 0 OR $minus == NULL OR $minus == ''){
			$minus = 0;
		}
		?>
		<div class="group-info" style="display: flex;margin-bottom: 20px;">
			<h4 style="margin-left: 30px;color: #219653;font-weight: 700;">Приход, у.е: <?php echo $plus; ?></h4>
			<h4 style="margin-left: 30px;color: #EB5757;font-weight: 700;">Расход, у.е: <?php echo $minus; ?></h4>
		</div>
		<?php


		$select = mysqli_query($link, "SELECT * FROM in_operations WHERE id != '' $q ORDER BY date DESC");
		while($get = mysqli_fetch_array($select)){
			if(empty($get['image'])){
				$image = '../../admin/uploads/noimage.png';
			}else{
				$image = '../../admin/uploads/'.$get['image'];
			}

			if($get['type'] == '#маршруты'){
				$name = 'Создание маршрута';
			}else{
				$name = $get['name'];
			}
			?>
			<div class="card shadow-none border mb-1 openOperation" data-id="<?php echo $get['id']; ?>" style="height: 100px;cursor: pointer;">
				<div class="card-header" id="headingOne" style="background-color: #f1f5fa;position: relative;height: 100px;">
					<div class="operations-info">
						<div>
							<img src="<?php echo $image; ?>">
						</div>
						<div>
							<p style="margin-bottom: 0px;"><i class="far fa-clock" style="margin-right: 5px;"></i><?php echo date("d.m.Y H:i:s", strtotime($get['date'])); ?></p>
							<h5 class="my-0"><?php echo $get['name']; ?></h5>
							<span><?php echo $get['type']; ?></span>
						</div>
					</div>
					<?php if($get['money'] != '' && $get['money'] != null){ ?>
						<div class="operations-money" style="float: right;">
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
		<?php } ?>

		<script>
			$(".openOperation").click(function(){
				var id = $(this).attr("data-id");

				$.post( "scripts/load_operation_data.php", { id: id, action: "<?php echo $action; ?>", date_from: "<?php echo $date_from; ?>", date_to: "<?php echo $date_to; ?>", hashtag: "<?php echo $hashtag; ?>", client: "<?php echo $client; ?>" })
				.done(function( data ) {
					$(".loadDataOperation").html(data);
					$("#operationModal").modal("show");
				});
			});
		</script>
<?php } ?>