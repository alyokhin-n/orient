<?php 
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$id = mysqli_real_escape_string($link, $_POST['id']);

	$select_comments = mysqli_query($link, "SELECT * FROM in_routes_comments WHERE route_id = '$id'");
	$count_comments = mysqli_num_rows($select_comments);
?>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col">
				<p class="text-dark font-weight-semibold title-border">Количество (<?php echo $count_comments; ?>)</p>
			</div><!--end col-->
		</div><!--end row-->    
	</div><!--end card-body-->  
	<div class="card-body border-bottom-dashed"> 
		<ul class="list-unstyled mb-0">
			<?php
				if($count_comments > 0){
					$count = 0;
					while($get_comments = mysqli_fetch_array($select_comments)){
						if($count == 0){
							$class = '';
						}else{
							$class = ' class="mt-3"';
						}
						$select_client = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$get_comments[client_id]'");
						$get_client = mysqli_fetch_array($select_client);
						if($get_client['avatar'] != ''){
							$pos1 = stripos($get_client['avatar'], 'https');
							if($pos1 === false){
								$avatar = '../admin/uploads/clients/'.$get_client['avatar'];
							}else{
								$avatar = $get_client['avatar'];
							}
						}else{
							$avatar = '../admin/uploads/clients/default_img.png';
						}

			?>
			<li <?php echo $class; ?>>
				<div class="row">
					<div class="col-auto">
						<img src="<?php echo $avatar; ?>" alt="" class="thumb-md rounded-circle">
					</div>
					<div class="col">
						<div class="comment-body ml-n3 bg-light-alt p-3">
							<div class="row">
								<div class="col">
									<p class="text-dark font-weight-semibold mb-2"><?php echo $get_client['nikname']; ?></p>
								</div>
								<div class="col-auto">
									<span class="text-muted">
										<i class="far fa-clock mr-1"></i>
										<?php
											if($get_comments['create_date'] != '' && $get_comments['create_date'] != null){
												echo $get_comments['create_date'];
											}else{
												echo '';
											}
										?>
										<p class="mb-0 text-truncate text-muted">👍 <span class="text-dark font-weight-semibold"><?php echo $get_comments['rate']; ?></span></p>
									</span>
								</div>
							</div>                                                                
							<p><?php echo $get_comments['text']; ?></p>
							<a href="#" class="text-danger deleteComment<?php echo $get_comments['id']; ?>"><i class="fas fa-trash-alt mr-1"></i>Удалить</a>
							<script>
								$(document).ready(function(){
								$( ".deleteComment<?php echo $get_comments['id']; ?>" ).click(function() {
									$.post( "scripts/delete_comment.php", {id: "<?php echo $get_comments['id']; ?>" }).done(function( data ) {
										if(data == 1){
											$.post( "scripts/get_comments.php", { id: "<?php echo $id; ?>" }).done(function( data ) {
												$( ".loadedContentComments" ).html(data);
											});
											Command: toastr["success"]("Комментарий удален")
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
												"timeOut": "1000",
												"extendedTimeOut": "1000",
												"showEasing": "swing",
												"hideEasing": "linear",
												"showMethod": "fadeIn",
												"hideMethod": "fadeOut"
											}
										}else{
											Command: toastr["error"]("Неизвестная ошибка")
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
												"timeOut": "1000",
												"extendedTimeOut": "1000",
												"showEasing": "swing",
												"hideEasing": "linear",
												"showMethod": "fadeIn",
												"hideMethod": "fadeOut"
											}
										}
									});
								});
								});
							</script>
						</div>
					</div>
				</div>
			</li>
			<?php
					$count++;
					}
				}
			?>
		</ul> 
	</div>
</div>