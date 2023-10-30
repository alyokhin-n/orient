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
        <link href="template/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="template/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/app.min.css" rel="stylesheet" type="text/css" />
		<script src="template/default/assets/js/jquery.min.js"></script>
		<link href="template/plugins/toastr.min.css" rel="stylesheet"/>
		<script src="template/plugins/toastr.min.js"></script>
		<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

        <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"> -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
		
        <style type="text/css">
        	body {
        		display: block;
        	}

        	table.table-bordered.dataTable th, table.table-bordered.dataTable td{
        		font-size: 11px;
        	}

        	table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before{
        		font-family: none;
        	}

        	.select2-container{
        		width: 100%;
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
                                        <h4 class="page-title">Спортсмены
                                        	<button class="btn btn-primary waves-effect waves-light changeTemplateBtn" style="float: right;margin-right: 10px;">Выбрать шаблон фильтров</button>
                                       	</h4>
									</div><!--end col-->
								</div><!--end row-->                                                              
							</div><!--end page-title-box-->
						</div><!--end col-->
					</div><!--end row-->
                    <!-- end page title end breadcrumb -->
					
                    <!-- Удаление фотографии пользователя -->

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

					<!-- Удаление пользователя -->


					<?php 
						if (isset($_GET['delete']))
						{
							$delete = $_GET['delete'];
							$update = mysqli_query($link, "DELETE FROM in_clients WHERE id = '$delete'");
						?>
						<script>
							Command: toastr["success"]("Пользователь удален")
							
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
					
					<!-- Изменение пользователя -->
					
					<?php 
						if (isset($_GET['saveEditUser']))	
						{
							$error = 0;
							$id = mysqli_real_escape_string($link, $_POST['id']);
							$email = mysqli_real_escape_string($link, $_POST['email']);
							// $paysera_address = mysqli_real_escape_string($link, $_POST['paysera_address']);
							//$type = mysqli_real_escape_string($link, $_POST['type']);
							
							if (empty($email))
							{ 
								$error = 1;
							?>
							<script>
								Command: toastr["error"]("Введите Email")
								
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
							<?php }
							
							if ($error == 0)
							{
								$update = "UPDATE in_clients SET email = '$email' WHERE id = '$id'";

								$tmpFilePath1 = $_FILES['image']['tmp_name'];
								if ($tmpFilePath1 != "")
								{
									$selectPhotos = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$id'");
									$getPhotos = mysqli_fetch_array($selectPhotos);
									if(!empty($getPhotos['avatar'])){
										unlink("uploads/clients/".$getPhotos['avatar']);
									}
									
									$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
									$addon = rand(1, 10000)."_".rand(1, 10000);
									$imgname = $addon."_".time().".".$ext;
									$newFilePath = "uploads/clients/" . $imgname;
									if(move_uploaded_file($tmpFilePath1, $newFilePath)) {
										$insertGallery = mysqli_query($link, "UPDATE in_clients SET avatar = '$imgname' WHERE id = '$id'");
									}
								}

								//echo $update;
								$update = mysqli_query($link, $update);
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

					<!-- Добавление пользователя -->

					<?php
						if(isset($_GET['addNewUser']))
						{
							$error = 0;
							$email = $_POST['email'];
							$password = $_POST['password'];
							//$type = $_POST['type'];

							if(empty($email) OR empty($password)){
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
								$nick = explode("@",$email);
								$nickname = $nick[0];

								$nickname = createNickName($nickname);

								$nickname = mysqli_real_escape_string($link, $nickname);
								$email = mysqli_real_escape_string($link, $_POST['email']);
								$password = md5($_POST['password']);
								//$type = mysqli_real_escape_string($link, $_POST['type']);
								$now = date("Y-m-d H:i:s");

								$insert = mysqli_query($link, "INSERT INTO in_clients (nikname,email,password,reg_date) VALUES ('$nickname','$email','$password','$now')");

								$last_id = mysqli_insert_id($link);

								$tmpFilePath1 = $_FILES['image']['tmp_name'];
								if ($tmpFilePath1 != "")
								{
									$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
									$addon = rand(1, 10000)."_".rand(1, 10000);
									$imgname = $addon."_".time().".".$ext;
									$newFilePath = "uploads/clients/" . $imgname;
									if(move_uploaded_file($tmpFilePath1, $newFilePath)) {
										$insertGallery = mysqli_query($link, "UPDATE in_clients SET avatar = '$imgname' WHERE id = '$last_id'");
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
					
					<!-- Окно редактирование пользователя -->
					
					<?php 
						if (isset($_GET['edit']))
						{
							$id = $_GET['edit'];
							$select = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$id'");
							$get = mysqli_fetch_array($select);
						?>
						
						<div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title text-white">Редактировать пользователя #<?php echo $get['id'] ?></h4>  
										</div><!--end col-->                                                                             
									</div>  <!--end row-->                                  
								</div><!--end card-header-->
                                <div class="card-body">    
									<form method="post" action="?saveEditUser=1&page=<?php echo $_GET['page'] ?>" enctype="multipart/form-data">
										
										<input class="form-control" type="hidden" name="id" value="<?php echo $get['id'] ?>">
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Никнейм *</label>
											<div class="col-sm-10">
												<input class="form-control" type="text" value="<?php echo $get['nikname'] ?>" name="nickname" id="example-text-input" required disabled>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">Email *</label>
											<div class="col-sm-10">
												<input class="form-control" type="email" value="<?php echo $get['email'] ?>" name="email" id="example-email-input" required>
											</div>
										</div>

										<!-- <div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">IDPay</label>
											<div class="col-sm-10">
												<input class="form-control" type="text" value="<?php echo $get['paysera_address'] ?>" name="paysera_address" id="example-text-input">
											</div>
										</div> -->

										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">Фото</label>
											<div class="col-sm-10">
												<input class="form-control" type="file" name="image">
												<?php if(!empty($get['avatar'])){ ?>
												<br/>
													<div class="col-lg-3">                            
														<div class="card">
															<div class="card-header">
																<a href="?edit=<?php echo $get['id'] ?>&deletePhoto=1" class="btn btn-secondary btn-xs float-right">Удалить картинку</a>
															</div><!--end card-header-->
															<div class="card-body"> 
																<div class="media">
																	<img style="width:100%;" src="/admin/uploads/clients/<?php echo $get['avatar'] ?>" />
																</div>
															</div><!--end card-body-->
														</div><!--end card-->
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

					<!-- Окно добавления пользователя -->

					<?php
						if (isset($_GET['add']))
						{
							?>
							<div class="col-lg-12">
	                            <div class="card">
	                                <div class="card-header bg-info">
	                                    <div class="row align-items-center">
	                                        <div class="col">                      
	                                            <h4 class="card-title text-white">Добавить пользователя</h4>  
											</div><!--end col-->                                                                             
										</div>  <!--end row-->                                  
									</div><!--end card-header-->
	                                <div class="card-body">    
										<form method="post" action="?addNewUser=1&page=<?php echo $_GET['page'] ?>" enctype="multipart/form-data">
											
											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">Email *</label>
												<div class="col-sm-10">
													<input class="form-control" type="email" name="email" id="example-email-input" required>
												</div>
											</div>

											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">Пароль *</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" name="password" id="example-text-input" required>
												</div>
											</div>

											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">Фото</label>
												<div class="col-sm-10">
													<input class="form-control" type="file" name="image">
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
						
						<!-- Окно фильтров пользователя -->
						
						<div class="card">
							<div class="card-header bg-light">
								<h4 class="card-title">Фильтр</h4>
							</div><!--end card-header-->
							<div class="card-body">
								
								
								<form id="searchForm" method="get" action="/admin/scripts/athlete_datatable2.php">
									<div class="row">
										
										<div class="col-lg-2">
											<div class="form-group">
												<label>Ник</label>
												<input type="text" class="form-control search-class" name="search_nickname">
											</div>
										</div>
										
										<div class="col-lg-2">
											<div class="form-group">
												<label>Страна</label>
												<select name="search_country" class="form-control select2 search-class">
													<option value="all">Все</option>
													<?php
													$select_country = mysqli_query($link, "SELECT * FROM in_countries");
													while($get_country = mysqli_fetch_array($select_country))
													{
														if($_GET['search_country'] == $get_country['short_name']){
															?>
															<option value="<?php echo $get_country['short_name'] ?>" selected><?php echo $get_country['short_name']; ?></option>
															<?php
														}else{
															?>
															<option value="<?php echo $get_country['short_name'] ?>"><?php echo $get_country['short_name']; ?></option>
															<?php
														}
													}
													?>
												</select>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label>Регион</label>
												<select name="search_region" class="form-control search-class select2">
													<option value="all">Все</option>
													<?php
													$select_regions = mysqli_query($link, "SELECT * FROM in_regions");
													while($get_regions = mysqli_fetch_array($select_regions))
													{
														if($_GET['search_region'] == $get_regions['name']){
															?>
															<option value="<?php echo $get_regions['name'] ?>" selected><?php echo $get_regions['name']; ?></option>
															<?php
														}else{
															?>
															<option value="<?php echo $get_regions['name'] ?>"><?php echo $get_regions['name']; ?></option>
															<?php
														}
													}
													?>
												</select>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label>Дата</label>
												<div class="input-group">                                            
													<input type="text" class="form-control search-class" name="search_date">
													<div class="input-group-append">
														<span class="input-group-text"><i class="dripicons-calendar"></i></span>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Сумма - прибыль">∑ƧɌ</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_profit_sum_with" name="search_profit_sum_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_profit_sum_to" name="search_profit_sum_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Сумма на счете пользователя">∑</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_balance_with" name="search_balance_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_balance_to" name="search_balance_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Потраченная сумма - маршруты + чаевые + подсказки">∑S</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_all_wasted_sum_with" name="search_all_wasted_sum_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_all_wasted_sum_to" name="search_all_wasted_sum_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Потраченная сумма - маршруты">∑М</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_all_wasted_route_with" name="search_all_wasted_route_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_all_wasted_route_to" name="search_all_wasted_route_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Потраченная сумма - чаевые">∑Т</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_all_wasted_tips_with" name="search_all_wasted_tips_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_all_wasted_tips_to" name="search_all_wasted_tips_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Процент чаевых от суммы за платные маршруты">%T</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_procent_tips_with" name="search_procent_tips_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_procent_tips_to" name="search_procent_tips_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Потраченная сумма - подсказки">∑Н</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_all_wasted_hints_with" name="search_all_wasted_hints_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_all_wasted_hints_to" name="search_all_wasted_hints_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Маршруты - пройденные все (кол-во)">Ɍ</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_count_route_end_with" name="search_count_route_end_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_count_route_end_to" name="search_count_route_end_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Маршруты - пройденные платные (кол-во)">ɌP</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_count_route_paid_with" name="search_count_route_paid_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_count_route_paid_to" name="search_count_route_paid_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Маршруты - пройденные бесплатные (кол-во)">ɌF</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_count_route_free_with" name="search_count_route_free_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_count_route_free_to" name="search_count_route_free_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Маршруты - платные неоплаченные (кол-во)">ɌN</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_count_route_no_paid_with" name="search_count_route_no_paid_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_count_route_no_paid_to" name="search_count_route_no_paid_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Маршруты - признаны BAD (кол-во)">ɌB</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_route_bad_with" name="search_route_bad_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_route_bad_to" name="search_route_bad_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Маршруты - средний выставленный рейтинг без учета BAD">ɌR</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_avg_rate_with" name="search_avg_rate_with" class="form-control search-class" step="0.01">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_avg_rate_to" name="search_avg_rate_to" class="form-control search-class" step="0.01">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Дата первого прохождения по не своему маршруту">1Ɍ</label>
												<div class="input-group">                                            
													<input type="text" class="form-control search-class" name="search_first_date_route">
													<div class="input-group-append">
														<span class="input-group-text"><i class="dripicons-calendar"></i></span>
													</div>
												</div>
											</div>
										</div>
										
										<div class="col-lg-2">
											<div class="form-group">
												<label></label>
												<br/>
												<button type="submit" class="btn btn-primary" style="margin-top: 8px;">Поиск</button>
												<a class="btn btn-secondary" href="<?php echo $uri_parts; ?>" style="margin-top: 8px;">Сбросить</a>
												<button type="button" class="btn btn-dark saveTemplate" data-toggle="tooltip" data-placement="top" title="Сохранить шаблон фильтров" style="margin-top: 8px;"><i class="far fa-save"></i></button>
												<button type="button" class="btn btn-success waves-effect waves-light exportexcel" data-toggle="tooltip" data-placement="top" title="Выгрузить в Excel" style="margin-top: 8px;"><i class="far fa-file-excel"></i></button>
												<button type="button" class="btn btn-info addPushBtn" style="margin-top: 8px;"><i class="far fa-comment-dots"></i> Создать PUSH</button>
											</div>
										</div>
										
									</div>
								</form>
								

								<script>
									$( ".exportexcel" ).click(function() {

										var $form = $("#searchForm");

										var url = "scripts/export_atheletes.php?" + $form.serialize();
										window.open(url, '_blank');
									});
								</script>
									
							</div>
								
								
								
						</div>
					</div>
						
						<!-- Таблица пользователей -->

						<table id="athleteTable" class="table table-striped table-bordered dt-responsive" style="width:100%">
							<thead>
								<tr>
									<th data-name="nikname">Ник</th>
									<th data-name="country">Страна</th>
									<th data-name="region">Регион</th>
									<th data-name="profit_sum" data-toggle="tooltip" data-placement="top" title="Сумма - прибыль">∑Ɍ</th>
									<th data-name="balance" data-toggle="tooltip" data-placement="top" title="Сумма на счете пользователя">∑</th>
									<th data-name="all_wasted_sum" data-toggle="tooltip" data-placement="top" title="Потраченная сумма - маршруты + чаевые + подсказки">∑S</th>
									<th data-name="all_wasted_route" data-toggle="tooltip" data-placement="top" title="Потраченная сумма - маршруты">∑М</th>
									<th data-name="all_wasted_tips" data-toggle="tooltip" data-placement="top" title="Потраченная сумма - чаевые">∑Т</th>
									<th data-name="procent_tips" data-toggle="tooltip" data-placement="top" title="Процент чаевых от суммы за платные маршруты">%T</th>
									<th data-name="all_wasted_hints" data-toggle="tooltip" data-placement="top" title="Потраченная сумма">∑Н</th>
									<th data-name="count_route_end" data-toggle="tooltip" data-placement="top" title="Маршруты - пройденные все (кол-во)">Ɍ</th>
									<th data-name="count_route_paid" data-toggle="tooltip" data-placement="top" title="Маршруты - пройденные платные (кол-во)">ɌP</th>
									<th data-name="count_route_free" data-toggle="tooltip" data-placement="top" title="Маршруты - пройденные бесплатные (кол-во)">ɌF</th>
									<th data-name="count_route_no_paid" data-toggle="tooltip" data-placement="top" title="Маршруты - платные неоплаченные (кол-во)">ɌN</th>
									<th data-name="route_bad" data-toggle="tooltip" data-placement="top" title="Маршруты - признаны BAD (кол-во)">ɌB</th>
									<th data-name="avg_rate" data-toggle="tooltip" data-placement="top" title="Маршруты - средний выставленный рейтинг без учета BAD">ɌR</th>
									<th data-name="first_date_route" data-toggle="tooltip" data-placement="top" title="Дата первого прохождения по не своему маршруту">1Ɍ</th>
									<th data-priority="1">Бан</th>
									<th data-priority="1">Действия</th>
								</tr>
							</thead>
						</table>
				</div><!-- container -->
				
				<!-- Модалка подтверждения удаления -->

				<div class="modal fade" id="exampleModalWarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalWarning1" aria-hidden="true">
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

				<!-- Модалка бана пользователя -->

				<div class="modal fade" id="exampleModalBan" tabindex="-1" role="dialog" aria-labelledby="exampleModalBan" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-warning">
								<h6 class="modal-title m-0 text-white" id="exampleModalBan">Подтверждение бана</h6>
								<button type="button" class="close " data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true"><i class="la la-times text-white"></i></span>
								</button>
							</div><!--end modal-header-->
							<div class="loadedContent">
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-12">
											<input id="bannedUserId" type="text" hidden>
											<label>Дата конца бана</label>
											<input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" id="datetime-ban">
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
							</div>
						</div><!--end modal-content-->
					</div><!--end modal-dialog-->
				</div><!--end modal-->

				<div class="modal fade" id="exampleModalTemplate" tabindex="-1" role="dialog" aria-labelledby="exampleModalTemplate" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-warning">
								<h6 class="modal-title m-0 text-white" id="exampleModalTemplate">Сохранить шаблон фильтров</h6>
								<button type="button" class="close " data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true"><i class="la la-times text-white"></i></span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-lg-12">
										<label>Название шаблона</label>
										<input class="form-control" type="text" id="name_template" placeholder="Введите название шаблона">
									</div>
								</div> 
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary btn-sm" data-dismiss="modal">Закрыть</button>
								<button class="btn btn-warning btn-sm completeSaveTemplate">Сохранить</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="exampleModalTemplateChange" tabindex="-1" role="dialog" aria-labelledby="exampleModalTemplateChange" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-warning">
								<h6 class="modal-title m-0 text-white" id="exampleModalTemplateChange">Шаблоны фильтров</h6>
								<button type="button" class="close " data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true"><i class="la la-times text-white"></i></span>
								</button>
							</div>
							<div class="modal-body loadTemplateChange">
								
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary btn-sm deleteTemplate">Удалить</button>
								<button class="btn btn-warning btn-sm applyTemplate">Применить</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="exampleModalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalPush" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-warning">
								<h6 class="modal-title m-0 text-white" id="exampleModalPush">Добавить PUSH-уведомление</h6>
								<button type="button" class="close " data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true"><i class="la la-times text-white"></i></span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group row">
									<div class="col-lg-12">
										<label>Название</label>
										<input id="name_push" class="form-control" type="text" placeholder="Введите название">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-12">
										<label>Описание</label>
										<textarea id="description_push" class="form-control"  placeholder="Введите описание" rows="7"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-12">
										<label>Фото</label>
	                                    <form id="photo_form_push" method='post' action='' enctype="multipart/form-data">
	                                        <input type="file" class="form-control" id='photoPush' name="photoPush" >
	                                    </form>
									</div>
								</div> 
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary btn-sm" data-dismiss="modal">Закрыть</button>
								<button class="btn btn-warning btn-sm createPush">Создать</button>
							</div>
						</div>
					</div>
				</div>
				
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
        <script src="template/plugins/select2/select2.min.js"></script>

		
        <!-- App js -->
        <script src="template/default/assets/js/app.js"></script>

        <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script> -->

        <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

		<script>
			$(document).ready(function() {
				$('input[name="search_first_date_route"]').daterangepicker({
					alwaysShowCalendars: !0,
					locale: {
						"format": 'YYYY-MM-DD',
						"applyLabel": "Ок",
						"cancelLabel": "Очистить",
						"fromLabel": "От",
						"toLabel": "До",
						"customRangeLabel": "Произвольный",
						"daysOfWeek": [
						"Вс",
						"Пн",
						"Вт",
						"Ср",
						"Чт",
						"Пт",
						"Сб"
						],
						"monthNames": [
						"Январь",
						"Февраль",
						"Март",
						"Апрель",
						"Май",
						"Июнь",
						"Июль",
						"Август",
						"Сентябрь",
						"Октябрь",
						"Ноябрь",
						"Декабрь"
						],
					}
				});

				$('input[name="search_date"]').daterangepicker({
					alwaysShowCalendars: !0,
					locale: {
						"format": 'YYYY-MM-DD',
						"applyLabel": "Ок",
						"cancelLabel": "Очистить",
						"fromLabel": "От",
						"toLabel": "До",
						"customRangeLabel": "Произвольный",
						"daysOfWeek": [
						"Вс",
						"Пн",
						"Вт",
						"Ср",
						"Чт",
						"Пт",
						"Сб"
						],
						"monthNames": [
						"Январь",
						"Февраль",
						"Март",
						"Апрель",
						"Май",
						"Июнь",
						"Июль",
						"Август",
						"Сентябрь",
						"Октябрь",
						"Ноябрь",
						"Декабрь"
						],
					}
				});

				$('input[name="search_first_date_route"]').on('cancel.daterangepicker', function(ev, picker) {
					$('input[name="search_first_date_route"]').val('');
				});

				$('input[name="search_date"]').on('cancel.daterangepicker', function(ev, picker) {
					$('input[name="search_date"]').val('');
				});

				$('input[name="search_first_date_route"]').val('');
				$('input[name="search_date"]').val('');

				$('.select2').select2({
					placeholder: 'Выберите',
					tags: true
				});
				$('#athleteTable').DataTable({
					"responsive": true,
					"processing": true,
					"serverSide": true,
					"serverMethod": 'post',
					"ajax": {
						"url": "/admin/scripts/athlete_datatable2.php",
						"type": "POST",
						"dataSrc":"data"
					},
					"columnDefs": [
						{ className: "user_datatable", "targets": [ 0 ] }
					],
					"drawCallback": function( settings ) {
						feather.replace();
						$( ".deleteuser" ).click(function() {
							var id = $(this).attr("data-id");
							$.post( "scripts/confirmation.php", { type: "client", id: id }).done(function( data ) {
								$( ".loadedContent" ).html(data);
							});
						});
						$( ".banuser" ).click(function() {
							var id = $(this).attr("data-id");
							$("#bannedUserId").val(id);
							$("#exampleModalBan").modal("show");
						});
						$( ".changePhoto" ).click(function() {
							var id = $(this).attr("data-id");
							$.post( "scripts/setStandartPhoto.php", { id: id }).done(function( data ) {
								if(data == "1"){
									Command: toastr["success"]("Фотография успешно изменена")

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
						$( ".delban" ).click(function() {
							var id = $(this).attr("data-id");
							$.post( "scripts/confirmation.php", { type: "clientban", id: id }).done(function( data ) {
								$('#athleteTable').DataTable().ajax.reload();
								Command: toastr["success"]("Бан снят")
								
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
					},
					"fnServerParams": function(data) {
						data['order'].forEach(function(items, index) {
							data['order'][index]['column_name'] = data['columns'][items.column]['name'];
						});
					},
					"language": {
						"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
					}
				});
			} );
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
				$(".completeBan").click(function(){
					var id = $("#bannedUserId").val();
					var datetime_ban = $("#datetime-ban").val();
					var comment = $("#comment").val();

					$.post( "scripts/banUser.php", { id: id, datetime: datetime_ban, comment: comment })
					.done(function( data ) {
						if(data == 1){
							$('#athleteTable').DataTable().ajax.reload();
							$("#exampleModalBan").modal('hide');
							Command: toastr["success"]("Пользователь забанен!")
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
							Command: toastr["error"]("Неизвестная ошибка!")
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

				$("#searchForm").on("submit", function(event){
					event.preventDefault();

					var $form = $("#searchForm"), url = $form.attr('action');
					console.log(url + "?" + $form.serialize());

					$('#athleteTable').DataTable().ajax.url(url + "?" + $form.serialize()).load();
				});

				$(".changeTemplateBtn").click(function(){
					$.post( "scripts/load_filters_template.php", { type: "athlete" })
					.done(function( data ) {
						$(".loadTemplateChange").html(data);
						$("#exampleModalTemplateChange").modal('show');
					});
				});

				$(".deleteTemplate").click(function(){
					var template = $("#template_filters").val();

					$.post( "scripts/delete_filters_template.php", { id: template })
					.done(function( data ) {
						if(data == 1){
							$("#exampleModalTemplateChange").modal('hide');
							Command: toastr["success"]("Шаблон успешно удален")

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

				$(".applyTemplate").click(function(){
					var template = $("#template_filters").val();

					$.post( "scripts/apply_filters_template.php", { id: template })
					.done(function( data ) {
						console.log(data);
						let arr = data.split(';');
						for (let i = 0; i < arr.length; i++) {
							let arr_value = arr[i].split(':');

							if(arr_value[0] == 'search_country'){
								$('select[name="'+arr_value[0]+'"]').val(arr_value[1]).trigger('change');
							}else{
								$('input[name="'+arr_value[0]+'"]').val(arr_value[1]);
							}
						}

						$("#exampleModalTemplateChange").modal('hide');
					});
				});

				$(".saveTemplate").click(function(){
					$("#name_template").val('');
					$("#exampleModalTemplate").modal('show');
				});

				$(".completeSaveTemplate").click(function(){
					var name_template = $("#name_template").val();

					if(name_template != ''){

						var arraySearch = document.getElementsByClassName('search-class');

						var error = 0;
						var filters = "";

						for (var i=0; i < arraySearch.length; i++) {
							var name = arraySearch[i].getAttribute("name");
							if(name == 'search_country'){
								var value = $('select[name="'+name+'"]').val();
							}else{
								var value = $('input[name="'+name+'"]').val();
							}

							if(value != '' && value != 'all'){
								error = 1;
							}

							filters += name + ":" + value + ";"; 
						}

						if(error == 1){
							$.post( "scripts/add_filters_template.php", { type: "athlete", name: name_template, filters: filters })
							.done(function( data ) {
								if(data == 1){
									$("#exampleModalTemplate").modal('hide');
									Command: toastr["success"]("Шаблон успешно создан")

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
								}else if(data == 3){
									Command: toastr["error"]("Такое название уже существует")

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
						}else{
							Command: toastr["error"]("Выберите хотя бы один фильтр")

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
						
						//let elementName = $('.search-class').attr('name');
					}else{
						Command: toastr["error"]("Введите название шаблона")

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

				$(".addPushBtn").click(function(){
					$("#name_push").val('');
					$("#description_push").val('');
					$("#photoPush").val('');
					$("#exampleModalPush").modal('show');
				});

				$(".createPush").click(function(){
					var name = $("#name_push").val();
					var description = $("#description_push").val();
					var photo = $("#photoPush").val();

					const users_arr = [];

					var users = document.getElementsByClassName('user_datatable');

					if(name != '' && description != '' && photo != ''){
						if(users.length > 0){
							for(let i=1;i<users.length;i++){
								users_arr.push(users[i].innerText);
							}

							$.post( "scripts/add_push.php", { name: name, description: description, users: users_arr })
	                    	.done(function( data ) {
		                        if(data == 1){
		                            var file_data = $('#photoPush').prop('files')[0];

		                            if(file_data != ''){
		                                var form_data = new FormData();
		                                form_data.append('type', 'push');
		                                form_data.append('file', file_data);

		                                $.ajax({
		                                    url         : 'scripts/uploadImageItems.php', 
		                                    dataType    : 'text',
		                                    cache       : false,
		                                    contentType : false,
		                                    processData : false,
		                                    data        : form_data,                         
		                                    type        : 'post',
		                                    success     : function(output){
		                                        //alert(output);
		                                    }
		                                });
		                            }

		                            Command: toastr["success"]("Успешно добавлено")

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

		                            $("#exampleModalPush").modal('hide');
		                        }else if(data == 3){
		                            Command: toastr["error"]("Такое PUSH уведомления уже существует")

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
		                              "timeOut": "2000",
		                              "extendedTimeOut": "1000",
		                              "showEasing": "swing",
		                              "hideEasing": "linear",
		                              "showMethod": "fadeIn",
		                              "hideMethod": "fadeOut"
		                            }
		                        }
	                    	});
						}else{
							Command: toastr["error"]("Выберите пользователей")

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
					}else{
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
					}
				});
			});
		</script>
        
	</body>
	
</html>