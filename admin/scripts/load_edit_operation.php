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
?>
<div class="modal-body">
	<div class="form-group">
		<label>Дата</label>
		<input id="editDate" type="datetime-local" name="" class="form-control" placeholder="Дата" value="<?php echo date('Y-m-d\TH:i:s', strtotime($get['date'])); ?>">
	</div>
	<div class="form-group">
		<label>Тип операции</label>
		<select id="editType" class="form-control">
			<!-- <option value="0" selected disabled>Выберите тип</option> -->
			<?php if($get['type'] == '#операции-приход'){ ?>
			<option value="#операции-приход" selected>#операции-приход</option>
			<option value="#операции-расход">#операции-расход</option>
			<?php }else{ ?>
			<option value="#операции-приход">#операции-приход</option>
			<option value="#операции-расход" selected>#операции-расход</option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Выберите операцию</label>
		<select id="editOperationName" class="form-control">
			<option value="0" selected disabled>Выберите операцию</option>
		</select>
	</div>
	<div class="form-group">
		<label>Сумма (у.е.)</label>
		<input id="editSum" type="number" name="" class="form-control" placeholder="Сумма (у.е.)" value="<?php echo $get['money']; ?>">
	</div>
	<div class="form-group">
		<label style="font-size: 15px;font-weight: 600;">Элементы связанные с операцией</label>
		<hr>
		<div class="form-group">
			<label>Пользователи</label>
			<select id="editClients" class="form-control select2">
				<option value="0" selected>Выберите пользователя</option>
				<?php
				$select_clients = mysqli_query($link, "SELECT * FROM in_clients");
				while($get_clients = mysqli_fetch_array($select_clients)){
					$check_clients = mysqli_query($link, "SELECT * FROM in_operations_elements WHERE operation_id = '$id' AND client_id = '$get_clients[id]'");
					if(mysqli_num_rows($check_clients) > 0){
					?>
					<option value="<?php echo $get_clients['id']; ?>" selected><?php echo $get_clients['nikname']; ?></option>
					<?php
					}else{
					?>
					<option value="<?php echo $get_clients['id']; ?>"><?php echo $get_clients['nikname']; ?></option>
					<?php
					}
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Маршруты</label>
			<select id="editRoutes" class="form-control select2">
				<option value="0" selected>Выберите маршрут</option>
				<?php
				$select_routes = mysqli_query($link, "SELECT * FROM in_routes");
				while($get_routes = mysqli_fetch_array($select_routes)){
					$check_routes = mysqli_query($link, "SELECT * FROM in_operations_elements WHERE operation_id = '$id' AND route_id = '$get_routes[id]'");
					if(mysqli_num_rows($check_routes) > 0){
					?>
					<option value="<?php echo $get_routes['id']; ?>" selected><?php echo $get_routes['name']; ?></option>
					<?php
					}else{
					?>
					<option value="<?php echo $get_routes['id']; ?>"><?php echo $get_routes['name']; ?></option>
					<?php
					}
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Элементы</label>
			<select id="editElements" class="form-control select2" multiple="multiple">
				<?php
				$select_elements = mysqli_query($link, "SELECT * FROM in_elements");
				while($get_elements = mysqli_fetch_array($select_elements)){
					$check_elements = mysqli_query($link, "SELECT * FROM in_operations_elements WHERE operation_id = '$id' AND element_id = '$get_elements[id]'");
					if(mysqli_num_rows($check_elements) > 0){
					?>
					<option value="<?php echo $get_elements['id']; ?>" selected><?php echo $get_elements['name']; ?></option>
					<?php
					}else{
					?>
					<option value="<?php echo $get_elements['id']; ?>"><?php echo $get_elements['name']; ?></option>
					<?php
					}
				}
				?>
			</select>
		</div>
		<hr>
	</div>
	<div class="form-group">
		<label>Документы</label>
		<input id="editFiles" type="file" class="form-control" placeholder="Выберите документы" name="files[]" multiple>
	</div>
	<div class="form-group">
		<div class="container">
			<div class="row loadFiles">
				<?php
					$select_files = mysqli_query($link, "SELECT * FROM in_operations_files WHERE operation_id = '$id'");
					while($get_files = mysqli_fetch_array($select_files)){
						?>
						<div class="col-lg-4">
							<div class="card">
								<div class="card-header">
									<a href="../../admin/uploads/operations/<?php echo $get_files['file']; ?>" class="float-left mb-2"><?php echo $get_files['file']; ?></a>
									<button type="button" class="btn btn-secondary btn-xs float-left delete<?php echo $get_files['id'] ?>">Удалить файл</button>
									<script>
										$('.delete<?php echo $get_files['id'] ?>').click(function(){
											$.post( "scripts/deleteFile.php", { id: "<?php echo $get_files['id'] ?>", type: "operation" }).done(function( data ) {
												if(data == 1){
													$.post( "scripts/load_files_operation.php", { id: "<?php echo $id; ?>" }).done(function( data ) {
														$(".loadFiles").html(data);
													});
													Command: toastr["success"]("Файл успешно удален", "Ошибка")

													toastr.options = {
														"closeButton": false,
														"debug": false,
														"newestOnTop": false,
														"progressBar": false,
														"positionClass": "toast-top-right",
														"preventDuplicates": false,
														"onclick": null,
														"showDuration": "300",
														"hideDuration": "1000",
														"timeOut": "2000",
														"extendedTimeOut": "1000",
														"showEasing": "swing",
														"hideEasing": "linear",
														"showMethod": "fadeIn",
														"hideMethod": "fadeOut"
													}
												}else{
													Command: toastr["error"]("Неизвестная ошибка", "Ошибка")

													toastr.options = {
														"closeButton": false,
														"debug": false,
														"newestOnTop": false,
														"progressBar": false,
														"positionClass": "toast-top-right",
														"preventDuplicates": false,
														"onclick": null,
														"showDuration": "300",
														"hideDuration": "1000",
														"timeOut": "2000",
														"extendedTimeOut": "1000",
														"showEasing": "swing",
														"hideEasing": "linear",
														"showMethod": "fadeIn",
														"hideMethod": "fadeOut"
													}
												}
											});
										});
									</script>
								</div>
							</div>
						</div>
						<?php
					}
				?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label>Комментарий</label>
		<textarea id="editComment" class="form-control" placeholder="Комментарий" rows="7"><?php echo $get['comment']; ?></textarea>
	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-primary btn-sm waves-effect waves-light saveBtn">Сохранить</button>
	<!-- <button class="btn btn-danger btn-sm waves-effect waves-light deleteBtn">Удалить</button> -->
</div>

<script>
	$('.select2').select2();

	$.ajax({
		url: 'scripts/load_select_operation.php',
		dataType: 'json',
		type: 'POST',
		data: {type: "<?php echo $get['type']; ?>"},
		success: function(response) {
			var array = response.operations;
			if (array != '')
			{
				for (i in array) {
					if(array[i].name == "<?php echo $get['name']; ?>"){
						$("#editOperationName").append("<option selected>"+array[i].name+"</option>");
					}else{
						$("#editOperationName").append("<option>"+array[i].name+"</option>");
					}
				}
			}
		},
		error: function(x, e) {
		}
	});

	$("#editType").change(function(){
		var val = $(this).val();

		$('#editOperationName').empty().append('<option value="0" selected disabled>Выберите операцию</option>');        
		$.ajax({
			url: 'scripts/load_select_operation.php',
			dataType: 'json',
			type: 'POST',
			data: {type: val},
			success: function(response) {
				var array = response.operations;
				if (array != '')
				{
					for (i in array) {                        
						$("#editOperationName").append("<option>"+array[i].name+"</option>");
					}
				}
			},
			error: function(x, e) {
			}
		});
	});

	$(".saveBtn").click(function(){
		var date = $("#editDate").val();
		var type = $("#editType").val();
		var name = $("#editOperationName").val();
		var sum = $("#editSum").val();
		var clients = $("#editClients").val();
		var routes = $("#editRoutes").val();
		var elements = $("#editElements").val();
		var comment = $("#editComment").val();

		if(date != ''){
			if(type != '' && type != '0'){
				if(name != ''){
					if(sum != ''){
						if(clients != '' || routes != '' || elements != ''){
							var form_data = new FormData();
							form_data.append('id', '<?php echo $id; ?>');
							form_data.append('date', date);
							form_data.append('type', type);
							form_data.append('name', name);
							form_data.append('sum', sum);
							form_data.append('clients', clients);
							form_data.append('routes', routes);
							form_data.append('elements[]', elements);
							form_data.append('comment', comment);

							var totalfiles = document.getElementById('editFiles').files.length;
							console.log(totalfiles);
							for (var index = 0; index < totalfiles; index++) {
								form_data.append("files[]", document.getElementById('editFiles').files[index]);
							}

							$.ajax({
								url         : 'scripts/edit_operation.php', 
								dataType    : 'text',
								cache       : false,
								contentType : false,
								processData : false,
								data        : form_data,                         
								type        : 'post',
								success     : function(output){
									if(output == 1){
										$("#operationModal").modal('hide');
										Command: toastr["success"]("Операция успешно сохранена", "Успешно")

										toastr.options = {
											"closeButton": false,
											"debug": false,
											"newestOnTop": false,
											"progressBar": false,
											"positionClass": "toast-top-right",
											"preventDuplicates": false,
											"onclick": null,
											"showDuration": "300",
											"hideDuration": "1000",
											"timeOut": "2000",
											"extendedTimeOut": "1000",
											"showEasing": "swing",
											"hideEasing": "linear",
											"showMethod": "fadeIn",
											"hideMethod": "fadeOut"
										}
										$(".loader").css("display", "block");
										$.post("scripts/load_operation.php", { action: "<?php echo $action; ?>", type: "<?php echo $type; ?>", name: "<?php echo $name; ?>", date_from: "<?php echo $date_from; ?>", date_to: "<?php echo $date_to; ?>", hashtag: "<?php echo $hashtag; ?>", client: "<?php echo $client; ?>" })
										.done(function( data ) {
											let timerId = setTimeout(function tick() {
												$(".loader").css("display", "none");
												$(".loadOperation").html(data);
											}, 1000);
										});
									}else{
										Command: toastr["error"]("Неизвестная ошибка", "Ошибка")

										toastr.options = {
											"closeButton": false,
											"debug": false,
											"newestOnTop": false,
											"progressBar": false,
											"positionClass": "toast-top-right",
											"preventDuplicates": false,
											"onclick": null,
											"showDuration": "300",
											"hideDuration": "1000",
											"timeOut": "2000",
											"extendedTimeOut": "1000",
											"showEasing": "swing",
											"hideEasing": "linear",
											"showMethod": "fadeIn",
											"hideMethod": "fadeOut"
										}
									}
								}
							});
						}else{
							Command: toastr["error"]("Выберите хотя бы один элемент", "Ошибка")

							toastr.options = {
								"closeButton": false,
								"debug": false,
								"newestOnTop": false,
								"progressBar": false,
								"positionClass": "toast-top-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "2000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							}
						}
					}else{
						Command: toastr["error"]("Заполните сумму", "Ошибка")

						toastr.options = {
							"closeButton": false,
							"debug": false,
							"newestOnTop": false,
							"progressBar": false,
							"positionClass": "toast-top-right",
							"preventDuplicates": false,
							"onclick": null,
							"showDuration": "300",
							"hideDuration": "1000",
							"timeOut": "2000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
						}
					}
				}else{
					Command: toastr["error"]("Заполните название операции", "Ошибка")

					toastr.options = {
						"closeButton": false,
						"debug": false,
						"newestOnTop": false,
						"progressBar": false,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "2000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				}
			}else{
				Command: toastr["error"]("Заполните тип", "Ошибка")

				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "2000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
			}
		}else{
			Command: toastr["error"]("Заполните дату", "Ошибка")

			toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": false,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "2000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}
		}
	});
</script>