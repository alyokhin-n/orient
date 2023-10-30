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
                                        <h4 class="page-title">AR объекты</h4>
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
						if (isset($_GET['deletePhoto']))
						{
							$delete = $_GET['edit'];
							$selectPhotos = mysqli_query($link, "SELECT * FROM ar_models WHERE id = '$delete'");
							$getPhotos = mysqli_fetch_array($selectPhotos);
							unlink("uploads/ar/".$getPhotos['image']);
							$update = mysqli_query($link, "UPDATE ar_models SET image = NULL WHERE id = '$delete'");
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
						if (isset($_GET['deleteAr']))
						{
							$delete = $_GET['edit'];
							$selectPhotos = mysqli_query($link, "SELECT * FROM ar_models WHERE id = '$delete'");
							$getPhotos = mysqli_fetch_array($selectPhotos);
							unlink("uploads/ar/".$getPhotos['model']);
							$update = mysqli_query($link, "UPDATE ar_models SET model = NULL WHERE id = '$delete'");
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
						if (isset($_GET['delete']))
						{
							$delete = $_GET['delete'];
							$selectPhotos = mysqli_query($link, "SELECT * FROM ar_models WHERE id = '$delete'");
							$getPhotos = mysqli_fetch_array($selectPhotos);
							if($getPhotos['image'] != ""){
								unlink("uploads/ar/".$getPhotos['image']);
							}
							if($getPhotos['model'] != ""){
								unlink("uploads/ar/".$getPhotos['model']);
							}
							$update = mysqli_query($link, "DELETE FROM ar_models WHERE id = '$delete'");
						?>
						<script>
							Command: toastr["success"]("AR объект удален")
							
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
						if (isset($_GET['saveEditAr']))	
						{
							$error = 0;
							$id = mysqli_real_escape_string($link, $_POST['id']);
							$image = $_FILES['image']['tmp_name'];
							$ar = $_FILES['ar']['tmp_name'];
							
							if ($error == 0)
							{
								//$update = "UPDATE in_clients SET email = '$email', type_client = '$type' WHERE id = '$id'";

								$tmpFilePath1 = $_FILES['image']['tmp_name'];
								if ($tmpFilePath1 != "")
								{
									$selectPhotos = mysqli_query($link, "SELECT * FROM ar_models WHERE id = '$id'");
									$getPhotos = mysqli_fetch_array($selectPhotos);
									if(!empty($getPhotos['image'])){
										unlink("uploads/ar/".$getPhotos['image']);
									}
									
									$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
									$addon = rand(1, 10000)."_".rand(1, 10000);
									$imgname = $addon."_".time().".".$ext;
									$newFilePath = "uploads/ar/" . $imgname;
									if(move_uploaded_file($tmpFilePath1, $newFilePath)) {
										$insertGallery = mysqli_query($link, "UPDATE ar_models SET image = '$imgname' WHERE id = '$id'");
									}
								}

								$tmpFilePath2 = $_FILES['ar']['tmp_name'];
								if ($tmpFilePath2 != "")
								{
									$selectPhotos = mysqli_query($link, "SELECT * FROM ar_models WHERE id = '$id'");
									$getPhotos = mysqli_fetch_array($selectPhotos);
									if(!empty($getPhotos['ar'])){
										unlink("uploads/ar/".$getPhotos['model']);
									}
									
									$ext = pathinfo($_FILES['ar']['name'], PATHINFO_EXTENSION);
									$addon = rand(1, 10000)."_".rand(1, 10000);
									$imgname = $addon."_".time().".".$ext;
									$newFilePath = "uploads/ar/" . $imgname;
									if(move_uploaded_file($tmpFilePath2, $newFilePath)) {
										$insertGallery = mysqli_query($link, "UPDATE ar_models SET model = '$imgname' WHERE id = '$id'");
									}
								}

								//echo $update;
								//$update = mysqli_query($link, $update);
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
							
							
						}
					?>

					<?php
						if(isset($_GET['addNewAr']))
						{
							$error = 0;
							$image = $_FILES['image']['tmp_name'];
							$ar = $_FILES['ar']['tmp_name'];

							if(empty($ar) OR empty($image)){
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

							if($error == 0){
								$now = date("Y-m-d H:i:s");

								$insert = mysqli_query($link, "INSERT INTO ar_models (create_date) VALUES ('$now')");

								$last_id = mysqli_insert_id($link);

								$name = "model" . $last_id;

								$update_name = mysqli_query($link, "UPDATE ar_models SET name = '$name' WHERE id = '$last_id'");

								$tmpFilePath1 = $_FILES['image']['tmp_name'];
								if ($tmpFilePath1 != "")
								{
									$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
									$addon = rand(1, 10000)."_".rand(1, 10000);
									$imgname = $addon."_".time().".".$ext;
									$newFilePath = "uploads/ar/" . $imgname;
									if(move_uploaded_file($tmpFilePath1, $newFilePath)) {
										$insertGallery = mysqli_query($link, "UPDATE ar_models SET image = '$imgname' WHERE id = '$last_id'");
									}
								}

								$tmpFilePath2 = $_FILES['ar']['tmp_name'];
								if ($tmpFilePath2 != "")
								{
									$ext = pathinfo($_FILES['ar']['name'], PATHINFO_EXTENSION);
									$addon = rand(1, 10000)."_".rand(1, 10000);
									$imgname = $addon."_".time().".".$ext;
									$newFilePath = "uploads/ar/" . $imgname;
									if(move_uploaded_file($tmpFilePath2, $newFilePath)) {
										$insertGallery = mysqli_query($link, "UPDATE ar_models SET model = '$imgname' WHERE id = '$last_id'");
									}
								}
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
						if (isset($_GET['edit']))
						{
							$id = $_GET['edit'];
							$select = mysqli_query($link, "SELECT * FROM ar_models WHERE id = '$id'");
							$get = mysqli_fetch_array($select);
						?>
						
						<div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title text-white">Редактировать AR объект #<?php echo $get['id'] ?></h4>  
										</div><!--end col-->                                                                             
									</div>  <!--end row-->                                  
								</div><!--end card-header-->
                                <div class="card-body">    
									<form method="post" action="?saveEditAr=1&page=<?php echo $_GET['page'] ?>" enctype="multipart/form-data">
										
										<input class="form-control" type="hidden" name="id" value="<?php echo $get['id'] ?>">
										
										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">Фото</label>
											<div class="col-sm-10">
												<input class="form-control" type="file" name="image">
												<?php if(!empty($get['image'])){ ?>
												<br/>
													<div class="col-lg-3">                            
														<div class="card">
															<div class="card-header">
																<a href="?edit=<?php echo $get['id'] ?>&deletePhoto=1" class="btn btn-secondary btn-xs float-right">Удалить картинку</a>
															</div>
															<div class="card-body"> 
																<div class="media">
																	<img style="width:100px;" src="/admin/uploads/ar/<?php echo $get['image'] ?>" />
																</div>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>

										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">AR model</label>
											<div class="col-sm-10">
												<input class="form-control" type="file" name="ar">
												<?php if(!empty($get['model'])){ ?>
												<br/>
													<div class="col-lg-3">                            
														<div class="card">
															<div class="card-header">
																<a href="?edit=<?php echo $get['id'] ?>&deleteAr=1" class="btn btn-secondary btn-xs float-right">Удалить AR model</a>
															</div>
															<div class="card-body"> 
																<div class="media">
																	<?php echo $get['model']; ?>
																</div>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
										
										
										
										
										<button type="submit" class="btn btn-success">Сохранить</button>
										<a class="btn btn-error" href="<?php echo $uri_parts; ?>">Отмена</a>
										
										
									</form>
									
									
								</div><!--end card-body-->                                
							</div>
						</div>
						<?php
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
	                                            <h4 class="card-title text-white">Добавить AR объект</h4>  
											</div><!--end col-->                                                                             
										</div>  <!--end row-->                                  
									</div><!--end card-header-->
	                                <div class="card-body">    
										<form method="post" action="?addNewAr=1&page=<?php echo $_GET['page'] ?>" enctype="multipart/form-data">

											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">Фото</label>
												<div class="col-sm-10">
													<input class="form-control" type="file" name="image">
												</div>
											</div>

											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">AR model</label>
												<div class="col-sm-10">
													<input class="form-control" type="file" name="ar">
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
						
						
						<div class="card">
							<div class="card-header bg-light">
								<h4 class="card-title">Фильтр</h4>
							</div><!--end card-header-->
							<div class="card-body">
								
								
								<form method="post" action="?search=1">
									<div class="row">
										
										<div class="col-lg-2">
											<div class="form-group">
												<label>ID</label>
												<input type="text" class="form-control" name="search_title">
											</div>
										</div>
										
										<div class="col-lg-2">
											<div class="form-group">
												<label></label>
												<br/>
												<button type="submit" class="btn btn-primary">Поиск</button>
												<a class="btn btn-secondary" href="<?php echo $uri_parts; ?>">Сбросить</a>
											</div>
										</div>
										
										
										
										
									</form>
									
									
								</div>
								
								
								
							</div><!--end card-body-->
						</div>

						<div class="zoomed" style="width: 200px;position: absolute;
						right: 8px;
						top: 0px;
						z-index: 99;
						padding: 10px;
						background: white;
						border: 1px solid red;display:none;"><img src='' style='width:100%;' /></div>
						
						
						<div class="table-responsive">
							<table class="table table-bordered mb-0 table-centered">
								<thead>
									<tr>
										<th>id</th>
										<th>Название</th>
										<th>Фото</th>
										<th>AR</th>
										<th>Дата создания</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										
										if ($_POST['search_title'] != '')
										{
											$searchString .=" AND id LIKE '%$_POST[search_nickname]%'";
										}
										
										$num = 20;
										$page = $_GET['page'];  
										$result = "SELECT * FROM ar_models WHERE id != '' $searchString ORDER by id DESC";  
										$result = mysqli_query($link, $result);
										$posts = mysqli_num_rows($result);  
										$total = intval(($posts - 1) / $num) + 1;  
										$page = intval($page);  
										if(empty($page) or $page < 0) $page = 1;  
										if($page > $total) $page = $total;  
										$start = $page * $num - $num;  
										$result = "SELECT * FROM ar_models WHERE id != '' $searchString ORDER by id DESC LIMIT $start, $num";  
										$result = mysqli_query($link, $result);
										while($getPushTable = mysqli_fetch_array($result))										
										{
										?>
										<tr>
											<td><?php echo $getPushTable['id'] ?></td>
											<td><?php echo $getPushTable['name'] ?></td>
											<td>
												<img class="zoom" src="uploads/ar/<?php echo $getPushTable['image'] ?>" style="height: 70px;width: 70px;object-fit: cover;border-radius: 50%;">
											</td>
											<td>
												<?php
													if($getPushTable['model'] != ''){
														?>
														<button class="btn btn-primary showAr" data-id="<?php echo $getPushTable['id'] ?>">Посмотреть AR в 3D</button>
														<script>
															$(".showAr").click(function(){
																var id = $(this).attr("data-id");

																var a = document.createElement('a');
																a.target="_blank";
																a.href='/admin/threejs.php?id='+id;
																a.click();
															});
														</script>
														<?php
													}
												?>
											</td>
											<td><?php echo date("d.m.Y H:i:s", strtotime($getPushTable['create_date'])); ?></td>
											<td class="text-right">
												<div class="dropdown d-inline-block">
													<a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
														<i class="las la-ellipsis-v font-20 text-muted"></i>
													</a>
														<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
														<a class="dropdown-item" href="?edit=<?php echo $getPushTable['id'] ?>">Редактировать</a>
														
														<a class="dropdown-item deleteuser<?php echo $getPushTable['id'] ?>" data-toggle="modal"  data-target="#exampleModalWarning">Удалить</a>
														<script>
															$( ".deleteuser<?php echo $getPushTable['id'] ?>" ).click(function() {
																$.post( "scripts/confirmation.php", { type: "ar", id: "<?php echo $getPushTable['id'] ?>" }).done(function( data ) {
																	$( ".loadedContent" ).html(data);
																});
															});
														</script>
													</div>
												</div>
											</td>
										</tr>
									<?php } ?>
									
								</tbody>
								
							</table><!--end /table-->
							<br/>
							<nav aria-label="Page navigation example"> 
								<ul class="pagination">
									<?php
										// Проверяем нужны ли стрелки назад  
										if ($page != 1) $pervpage = '
										<li class="page-item"><a class="page-link" href="?page=1" aria-label="Previous">Первая</a></li>  
										<li class="page-item"><a class="page-link" href="?page='. ($page - 1) .'">Предыдущая</a></li> ';  
										if ($page != $total) $nextpage = ' 
										<li class="page-item"><a class="page-link" href="?page='. ($page + 1) .'">Следующая</a></li>  
										<li class="page-item"><a class="page-link" href="?page=' .$total. '">Последняя</a></li>';  
										// Находим две ближайшие станицы с обоих краев, если они есть  
										if($page - 2 > 0) $page2left = '
										<li class="page-item"><a class="page-link" href="?page='. ($page - 2) .'">'. ($page - 2) .'</a></li>';  
										if($page - 1 > 0) $page1left = '
										<li class="page-item"><a class="page-link" href="?page='. ($page - 1) .'">'. ($page - 1) .'</a></li>';  
										if($page + 2 <= $total) $page2right = '
										<li class="page-item"><a class="page-link" href="?page='. ($page + 2) .'">'. ($page + 2) .'</a></li>';  
										if($page + 1 <= $total) $page1right = '
										<li class="page-item"><a class="page-link" href="?page='. ($page + 1) .'">'. ($page + 1) .'</a></li>'; 
										// Вывод меню  
										echo $pervpage.$page2left.$page1left.'<li class="page-item active"><a class="page-link">'.$page.'</a></li>'.$page1right.$page2right.$nextpage;  
									?>
								</ul><!--end pagination-->
							</nav><!--end nav-->
						</div><!--end /tableresponsive-->
					</div><!--end /tableresponsive-->
					
                    
					
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