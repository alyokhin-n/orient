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

	$name = $get['name'];
?>
<div class="modal-body">
	<div class="row">
		<div class="col-lg-12">
			<h5>Точно удалить <?php echo $name ?>?</h5>
		</div>
	</div>                     
</div>
<div class="modal-footer">
	<button class="btn btn-secondary btn-sm btnNo">Нет</button>
	<button class="btn btn-warning btn-sm btnYes">Да</button>
</div>

<script>
	$(".btnYes").click(function(){
		$.post( "scripts/delete_operation.php", { id: "<?php echo $id; ?>" })
        .done(function( data ) {
        	if(data == 1){
        		$("#delOperationModal").modal('hide');
        		Command: toastr["success"]("Операция успешно удалена", "Успешно")

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
        });
	});

	$(".btnNo").click(function(){
		$.post( "scripts/load_operation_data.php", { id: "<?php echo $id; ?>", action: "<?php echo $action; ?>", type: "<?php echo $type; ?>", name: "<?php echo $name; ?>" })
		.done(function( data ) {
			$("#delOperationModal").modal('hide');
			$(".loadDataOperation").html(data);
			$("#operationModal").modal("show");
		});
	});
</script>