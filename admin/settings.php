<?php 
	include("config/dbconnect.php"); 
	include("config/checkAdmin.php"); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $sitename; ?></title>
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
		<style>
			.absolutesave
			{
			position:fixed;
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
                                        <h4 class="page-title">Настройки</h4>
									</div><!--end col-->
								</div><!--end row-->                                                              
							</div><!--end page-title-box-->
						</div><!--end col-->
					</div><!--end row-->
                    <!-- end page title end breadcrumb -->
					<?php 
						$selectValues = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_type = 'settings'");
						while ($getValues = mysqli_fetch_array($selectValues))
						{
							if ($getValues['setting_name'] == "email")
							{
								$email = $getValues['setting_value'];
							}
							
							
							
						}
					?>
					<div class="row">
                        <div class="col-sm-12">
							
							<div class="card">
								
								
								<div class="card-body">
									<p class="card-text">
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Email для отправки уведомлений</label>
											<div class="col-sm-10">
												<input class="form-control email" value="<?php echo $email; ?>" type="text" id="example-text-input">
											</div>
										</div>
									</p>
								</div><!--end card-body-->
							</div>
						</div>
						
						
						
						
						
						
						
					
						
						
				
				
						
						
						
						
						
						
						
						
					</div>
				</div><!-- container -->
				<footer class="footer text-center text-sm-left">
				&copy; <?php echo date("Y"); ?> <?php echo $sitename ?></span>
			</footer><!--end footer-->
		</div>
		<!-- end page content -->
	</div>
	<!-- end page-wrapper -->
	<div class="button-items absolutesave">
		<button type="button" class="btn btn-success waves-effect waves-light savepage">Сохранить</button>
		<script>
			$( ".savepage" ).click(function() {
				var email = $( ".email" ).val();
				
				
				$.post( "scripts/savePage.php", { 
					type: "settings", 
					email: email
					
					}).done(function( data ) {
					Command: toastr["success"]("Сохранено")
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
				});
			});
		</script>
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
</body>
</html>