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
                                        <h4 class="page-title">Медали</h4>
									</div><!--end col-->
								</div><!--end row-->                                                              
							</div><!--end page-title-box-->
						</div><!--end col-->
					</div><!--end row-->
                    <!-- end page title end breadcrumb -->
					
					<div class="col-lg-12">
						
						
						<div class="card">
							<div class="card-header bg-light">
								<h4 class="card-title">Загрузка</h4>
							</div><!--end card-header-->
							<div class="card-body">
								
								
								<form method='post' action='' enctype="multipart/form-data">
									<div class="custom-file mb-3">
										<input type="file" class="custom-file-input" id='files_images' name="files_images[]" multiple>
										<label class="custom-file-label" for="customFile">Выберите картинки медалей</label>
									</div>

									<input type="button" id="submit_files" class="btn btn-success waves-effect waves-light" value='Загрузить'>
								</form>
								<br/>
					
								<div class="preview_images"></div>
								
								
							</div><!--end card-body-->
						</div>

						
					</div><!--end /tableresponsive-->
					
					<script>
						$( ".preview_images" ).load( "scripts/loadMedals.php" );

						$('#submit_files').click(function(){

							var form_data = new FormData();


							var totalfiles = document.getElementById('files_images').files.length;
							console.log(totalfiles);
							for (var index = 0; index < totalfiles; index++) {
								form_data.append("files_images[]", document.getElementById('files_images').files[index]);

							}


							$.ajax({
								url: 'scripts/uploadMedals.php', 
								type: 'post',
								data: form_data,
								dataType: 'json',
								contentType: false,
								processData: false,
								success: function (response) {

									for(var index = 0; index < response.length; index++) {
										var src = response[index];






									}


									$( ".preview_images" ).load( "scripts/loadMedals.php" );

									Command: toastr["success"]("Медали загружены")
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


					</script>
					
					
				</div><!-- container -->
				
				<div class="modal fade" id="exampleModalWarning<?php echo $getPushTable['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalWarning1" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-warning">
								<h6 class="modal-title m-0 text-white" id="exampleModalWarning1">Подтверждение удаления</h6>
								<button type="button" class="close " data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true"><i class="la la-times text-white"></i></span>
								</button>
							</div><!--end modal-header-->
							<div class="loadedContent">
								
							</div>
						</div><!--end modal-content-->
					</div><!--end modal-dialog-->
				</div><!--end modal-->
				
				<footer class="footer text-center text-sm-left">
					&copy; <?php echo date("Y"); ?> <?php echo $sitename ?>
				</footer><!--end footer-->
			</div>
            <!-- end page content -->
		</div>
        <!-- end page-wrapper -->
		
        
		
		
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
			});

			$(document).on("mouseover", ".zoom", function(){
				$(".zoomed").show();
				var image = $(this).attr('src');
				$(".zoomed img").attr("src",image);
				
			});

			$(document).on("mouseleave", ".zoom", function(){
				$(".zoomed").hide();
			});
		</script>
        
	</body>
	
</html>