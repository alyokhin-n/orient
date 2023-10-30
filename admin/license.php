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

        <!-- <link href="template/plugins/dropify/css/dropify.min.css" rel="stylesheet"> -->
        <link href="template/plugins/dropzone/dropzone.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery.js@1.4.0/dist/css/lightgallery.css">
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
		<script src="template/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>

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
                                        <h4 class="page-title">Пользовательское соглашение</h4>
									</div><!--end col-->
								</div><!--end row-->                                                              
							</div><!--end page-title-box-->
						</div><!--end col-->
					</div><!--end row-->
                    <!-- end page title end breadcrumb -->

					
					<?php
						$select_pp = mysqli_query($link, "SELECT * FROM in_license WHERE license_type = 'pp'");
						$get_pp = mysqli_fetch_array($select_pp);
						$title_pp = $get_pp['title'];
						$description_pp = $get_pp['description'];

						$select_ua = mysqli_query($link, "SELECT * FROM in_license WHERE license_type = 'ua'");
						$get_ua = mysqli_fetch_array($select_ua);
						$title_ua = $get_ua['title'];
						$description_ua = $get_ua['description'];
					?>
					
					

					<?php
						if(isset($_GET['save']))
						{
							$title_pp = mysqli_real_escape_string($link, $_POST['title_pp']);
							$title_ua = mysqli_real_escape_string($link, $_POST['title_ua']);
							$description_pp = mysqli_real_escape_string($link,htmlspecialchars($_POST['description_pp']));
							$description_ua = mysqli_real_escape_string($link,htmlspecialchars($_POST['description_ua']));

							$update1 = mysqli_query($link, "UPDATE in_license SET title = '$title_pp', description = '$description_pp' WHERE license_type = 'pp'");
							$update2 = mysqli_query($link, "UPDATE in_license SET title = '$title_ua', description = '$description_ua' WHERE license_type = 'ua'");
						}
					?>
					
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header bg-info">
								<div class="row align-items-center">
									<div class="col">                      
										<h4 class="card-title text-white">Добавить WishList</h4>  
									</div>                                                                            
								</div>                                 
							</div>
							<div class="card-body">    
								<form method="post" action="?save=1" enctype="multipart/form-data">

									<div class="form-group row">
										<div class="col-sm-6">
											<label>Заголовок PP</label>
											<input class="form-control" type="text" name="title_pp" value="<?php echo $title_pp; ?>">
										</div>
										<div class="col-sm-6">
											<label>Заголовок UA</label>
											<input class="form-control" type="text" name="title_ua" value="<?php echo $title_ua; ?>">
										</div>
									</div>

									<div class="form-group row">
										<div class="col-sm-6">
											<label>Описание PP</label>
											<textarea class="form-control" name="description_pp" rows="18"><?php echo $description_pp; ?></textarea>
										</div>
										<div class="col-sm-6">
											<label>Описание UA</label>
											<textarea class="form-control" name="description_ua" rows="18"><?php echo $description_ua; ?></textarea>
										</div>
									</div>



									<button type="submit" class="btn btn-success">Сохранить</button>


								</form>


							</div>                              
						</div>
					</div>
                    
					
				</div><!-- container -->
				
				
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js" integrity="sha512-P2Z/b+j031xZuS/nr8Re8dMwx6pNIexgJ7YqcFWKIqCdbjynk4kuX/GrqpQWEcI94PRCyfbUQrjRcWMi7btb0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- App js -->
        <script src="template/default/assets/js/app.js"></script>
        <script src="template/plugins/dropzone/dropzone.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lightgallery.js@1.4.0/dist/js/lightgallery.min.js"></script>
		
		<script>
			tinymce.init({
				selector: 'textarea',
				imagetools_cors_hosts: ['picsum.photos'],
				quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
				plugins: 'print preview paste importcss searchreplace autolink autosave directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
				menubar: 'file edit view insert format tools table help',
				toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview print | insertfile image media template link anchor codesample | ltr rtl',
				// menubar: 'file edit view insert format tools table',
				// toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample',
				// plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak table',
				toolbar_mode: 'floating',
				images_upload_url: 'uploadTiny.php',
				automatic_uploads: true,
				images_upload_handler: function (blobInfo, success, failure) {
					var xhr, formData;
					
					xhr = new XMLHttpRequest();
					xhr.withCredentials = false;
					xhr.open('POST', 'uploadTiny.php');
					
					xhr.onload = function() {
						var json;
						
						if (xhr.status != 200) {
							failure('HTTP Error: ' + xhr.status);
							return;
						}
						
						json = JSON.parse(xhr.responseText);
						
						if (!json || typeof json.location != 'string') {
							failure('Invalid JSON: ' + xhr.responseText);
							return;
						}
						
						success(json.location);
						console.log(json.location);
					};
					
					formData = new FormData();
					formData.append('file', blobInfo.blob(), blobInfo.filename());
					
					xhr.send(formData);
				}
			});
		</script>
        
	</body>
	
</html>