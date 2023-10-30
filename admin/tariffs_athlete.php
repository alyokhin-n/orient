<?php 
	include("config/dbconnect.php"); 
	include("config/checkAdmin.php"); 
	include("config/fuctions.php");
?>

<!DOCTYPE html>
<html lang="en">
	
    <head>
        <meta charset="utf-8" />
        <title><?php echo $sitename ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		
        <!-- App favicon -->
        <link rel="shortcut icon" href="template/default/assets/images/favicon.ico">
		
        <!-- App css -->
        <link href="template/default/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="template/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/app.min.css" rel="stylesheet" type="text/css" />
		<script src="template/default/assets/js/jquery.min.js"></script>
		<link href="template/plugins/toastr.min.css" rel="stylesheet"/>
		<script src="template/plugins/toastr.min.js"></script>
		<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
		
		<style>
			.absolutesave{
				position: fixed;
    			right: 10px;
    			bottom: 14px;
			}
		</style>

	</head>
	
    <body class="dark-sidenav">
        <!-- Left Sidenav -->
		
		
		<?php include("sidebar.php"); ?>
        
		
        <div class="page-wrapper">
            <!-- Top Bar Start -->
			<?php include("header.php"); ?>
			
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Тарифы Athlete</h4>
                                        <a style="position: absolute;right: 0px;top: -8px;" href="?add=1&page=<?php echo $_GET['page'] ?>" class="btn btn-success waves-effect waves-light">
											<i class="fas fa-plus mr-2"></i>
											Добавить</a>
									</div><!--end col-->
								</div><!--end row-->                                                              
							</div><!--end page-title-box-->
						</div><!--end col-->
					</div><!--end row-->
                    <!-- end page title end breadcrumb -->

                    <?php
                    	if(isset($_GET['successSave'])){
                    		?>
                    		<script>
                    			Command: toastr["success"]("Данные обновлены")

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
                    		</script>
                    		<?php
                    	}
                    ?>
					
                    <?php 
						if (isset($_GET['deletePhoto']))
						{
							$delete = $_GET['edit'];
							$selectPhotos = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$delete'");
							$getPhotos = mysqli_fetch_array($selectPhotos);
							unlink("uploads/clients/".$getPhotos['image']);
							$update = mysqli_query($link, "UPDATE in_clients SET avatar = NULL WHERE id = '$delete'");
						?>
						<script>
							Command: toastr["success"]("Выполнено")
							
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
						</script>
						<?php
						}
					?>

					<?php
						if(isset($_GET['addNewTariff']))
						{
							$error = 0;
							$name = $_POST['name'];
							$hints = $_POST['hints'];
							$month = $_POST['month'];
							$half_year = $_POST['half_year'];
							$year = $_POST['year'];

							if(empty($name) OR empty($hints) OR empty($month) OR empty($half_year) OR empty($year)){
								$error = 1;
							?>
							<script>
								Command: toastr["error"]("Заполните все данные")
								
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
							</script>
							<?php
							}

							$name = mysqli_real_escape_string($link, $name);
							$hints = mysqli_real_escape_string($link, $hints);
							$month = mysqli_real_escape_string($link, $month);
							$half_year = mysqli_real_escape_string($link, $half_year);
							$year = mysqli_real_escape_string($link, $year);

							$check_tariff = mysqli_query($link, "SELECT * FROM in_tariffs WHERE name = '$name'");
							if(mysqli_num_rows($check_tariff) > 0){
								$error = 1;
								?>
								<script>
									Command: toastr["error"]("Тариф уже существует")

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
								</script>
								<?php
							}

							if($error == 0){
								

								$insert = mysqli_query($link, "INSERT INTO in_tariffs (name,hints,month,half_year,year,type) VALUES ('$name','$hints','$month','$half_year','$year','athlete')");

								?>
								<script>
									Command: toastr["success"]("Данные добавлены")

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
								</script>
								<?php
							}

						}
					?>
					

					<?php
						if (isset($_GET['add']))
						{
							?>
							<div class="col-lg-12">
	                            <div class="card">
	                                <div class="card-header bg-info">
	                                    <div class="row align-items-center">
	                                        <div class="col">                      
	                                            <h4 class="card-title text-white">Добавить Тариф</h4>  
											</div><!--end col-->                                                                             
										</div>  <!--end row-->                                  
									</div><!--end card-header-->
	                                <div class="card-body">    
										<form method="post" action="?addNewTariff=1&page=<?php echo $_GET['page'] ?>" enctype="multipart/form-data">
											
											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">Название *</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" name="name" id="example-email-input" required>
												</div>
											</div>

											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">Hints per month *</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" name="hints" id="example-email-input" required>
												</div>
											</div>

											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">1 month *</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" name="month" id="example-email-input" required>
												</div>
											</div>

											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">6 month *</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" name="half_year" id="example-email-input" required>
												</div>
											</div>

											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">12 month *</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" name="year" id="example-email-input" required>
												</div>
											</div>

											
											<button type="submit" class="btn btn-success">Создать</button>
											<a class="btn btn-error" href="<?php echo $uri_parts; ?>">Отмена</a>
											
											
										</form>
										
										
									</div>                              
								</div>
							</div>
							<?php
						}
					?>
					
					<div class="col-lg-12">

						<div class="row">
						
						<?php
							$select = mysqli_query($link, "SELECT * FROM in_tariffs WHERE type = 'athlete'");
							while($get = mysqli_fetch_array($select)){
								?>
								<div class="col-sm-3">
									<div class="card">
										<div class="card-header bg-light">
											<h4 class="card-title" style="display: inline;position: relative;top: 7px;"><?php echo $get['name']; ?></h4>
											<button type="button" class="btn btn-outline-danger deleteTariff" data-id="<?php echo $get['id']; ?>" style="float: right;"><i class="far fa-trash-alt"></i></button>
										</div>
										<div class="card-body">
											<div class="form-group">
												<label>hints per month</label>
												<input type="text" name="" class="form-control hints<?php echo $get['id']; ?>" value="<?php echo $get['hints']; ?>">
											</div>
											<div class="form-group">
												<label>1 month</label>
												<input type="text" name="" class="form-control month<?php echo $get['id']; ?>" value="<?php echo $get['month']; ?>">
											</div>
											<div class="form-group">
												<label>6 month</label>
												<input type="text" name="" class="form-control half_year<?php echo $get['id']; ?>" value="<?php echo $get['half_year']; ?>">
											</div>
											<div class="form-group">
												<label>12 month</label>
												<input type="text" name="" class="form-control year<?php echo $get['id']; ?>" value="<?php echo $get['year']; ?>">
											</div>
											<button type="button" class="btn btn-success waves-effect waves-light savetariff" data-id="<?php echo $get['id']; ?>">Сохранить</button>
										</div>
									</div>
								</div>
								<?php
							}
						?>

						</div>
		
						<div class="modal fade" id="deleteModalTariff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Удалить тариф ?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<input id="confirmedId" type="text" name="" hidden>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
										<button type="button" class="btn btn-primary confirmDelete">Удалить</button>
									</div>
								</div>
							</div>
						</div>
		
		
        <!-- jQuery  -->
        
        <script src="template/default/assets/js/bootstrap.bundle.min.js"></script>
        <script src="template/default/assets/js/metismenu.min.js"></script>
        <script src="template/default/assets/js/waves.js"></script>
        <script src="template/default/assets/js/feather.min.js"></script>
        <script src="template/default/assets/js/simplebar.min.js"></script>
        <script src="template/default/assets/js/moment.js"></script>
        <script src="template/plugins/daterangepicker/daterangepicker.js"></script>
		
        <!-- App js -->
        <script src="template/default/assets/js/app.js"></script>
		<script>
			$(document).ready(function(){
				$(".phonemask").inputmask({
					mask: '+7 (999) 999 99 99',
					placeholder: ' ',
					showMaskOnHover: false,
					showMaskOnFocus: false,
					onBeforePaste: function (pastedValue, opts)
					{
						var processedValue = pastedValue;
						return processedValue;
					}
				});

				$(".savetariff").click(function(){
					var id = $(this).attr("data-id");
					var hints = $(".hints"+id).val();
					var month = $(".month"+id).val();
					var half_year = $(".half_year"+id).val();
					var year = $(".year"+id).val();

					$.post( "scripts/saveTariff.php", { id: id, hints: hints, month: month, half_year: half_year, year: year })
					.done(function( data ) {
						if(data == "1"){
							location.href = "?successSave=1";
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

				$(".deleteTariff").click(function(){
					var id = $(this).attr("data-id");
					$("#confirmedId").val(id);
					$("#deleteModalTariff").modal("show");
				});

				$(".confirmDelete").click(function(){
					var id = $("#confirmedId").val();

					$.post( "scripts/deleteTariff.php", { id: id })
					.done(function( data ) {
						if(data == "1"){
							location.href = "?successSave=1";
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

			// $(document).on("mouseover", ".zoom", function(){
			// 	$(".zoomed").show();
			// 	var image = $(this).attr('src');
			// 	$(".zoomed img").attr("src",image);
				
			// });

			// $(document).on("mouseleave", ".zoom", function(){
			// 	$(".zoomed").hide();
			// });
		</script>
        
	</body>
	
</html>