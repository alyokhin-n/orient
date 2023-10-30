<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$id = $_POST['id'];

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