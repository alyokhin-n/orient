<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");
	$id = mysqli_real_escape_string($link, $_POST['id']);
	$select = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$id'");
	$get = mysqli_fetch_array($select);
	$nikname = $get['nikname'];
	$linkYes = "clients.php?ban=".$get['id'];
	$linkNo = "clients.php";
	$now = date("d.m.Y");
?>

<div class="modal-body">
	<div class="row">
		<div class="col-lg-12">
			<h5>Бан пользователя <?php echo $nikname ?>?</h5>			
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<br>
			<label>Дата конца бана</label>
			<input class="form-control" type="datetime-local" value="2021-06-15T12:45:00" id="push_datetime">
		</div>
		<div class="col-lg-12">
			<br>
			<label>Коментарий</label>
			<textarea id="comment" class="form-control" rows="4"></textarea>
		</div>
	</div> 
</div>
<div class="modal-footer">
	<button class="btn btn-secondary btn-sm" data-dismiss="modal">Нет</button>
	<button class="btn btn-warning btn-sm completeBan">Да</button>
</div>
<script>
	$(document).ready(function(){
		$(".completeBan").click(function(){
			var push_datetime = $("#push_datetime").val();
			var comment = $("#comment").val();
			alert(push_datetime);
			// if(datetime != ""){
			// 	$.post( "banUser.php", { id: "<?php echo $id ?>", datetime: datetime, comment: comment }).done(function( data ) {
			// 		alert(data);
			// 	});
			// }else{
			// 	Command: toastr["error"]("Заполните все данные")

			// 	toastr.options = {
			// 		"closeButton": false,
			// 		"debug": false,
			// 		"newestOnTop": false,
			// 		"progressBar": false,
			// 		"positionClass": "toast-top-right",
			// 		"preventDuplicates": false,
			// 		"onclick": null,
			// 		"showDuration": "300",
			// 		"hideDuration": "1000",
			// 		"timeOut": "1000",
			// 		"extendedTimeOut": "1000",
			// 		"showEasing": "swing",
			// 		"hideEasing": "linear",
			// 		"showMethod": "fadeIn",
			// 		"hideMethod": "fadeOut"
			// 	}
			// }
		});
	});
</script>