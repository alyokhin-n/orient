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
                                        <h4 class="page-title">Администраторы</h4>
									</div><!--end col-->
									<a href="?add=1" class="btn btn-primary btn-sm waves-effect waves-light">Добавить</a>
								</div><!--end row-->                                                              
							</div><!--end page-title-box-->
						</div><!--end col-->
					</div><!--end row-->
                    <!-- end page title end breadcrumb -->
					
					<?php 
						if (isset($_GET['delete']))
						{
							$delete = $_GET['delete'];
							$update = mysqli_query($link, "DELETE FROM in_users WHERE id = '$delete'");
						?>
						<script>
							Command: toastr["success"]("Администратор удален")
							
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
						if (isset($_GET['saveAddUser']))	
						{
							$error = 0;
							$name = mysqli_real_escape_string($link, $_POST['name']);
							$email = mysqli_real_escape_string($link, $_POST['email']);
							$password = mysqli_real_escape_string($link, $_POST['password']);
							$password2 = mysqli_real_escape_string($link, $_POST['password2']);
							
							
							
							if (empty($name) OR empty($email))
							{ 
								$error = 1;
							?>
							<script>
								Command: toastr["danger"]("Не введено ФИО и / или Email")
								
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
							
							$selectExist = mysqli_query($link, "SELECT * FROM in_users WHERE email = '$email'");
							$numExist = mysqli_num_rows($selectExist);
							if ($numExist != 0)
							{ 
								$error = 1;
								?>
							<script>
									Command: toastr["error"]("Администратор с таким Email уже зарегистрирован")
									
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
							
							if ($password != $password2)
							{ 
								$error = 1;
							?>
							<script>
								Command: toastr["error"]("Пароли не совпадают")
								
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
							
							
							
							
							
							
							
							
							
							
							
							
							
							if ($error == 0)
							{
								$password = md5($password);
								
								$update = "INSERT INTO in_users (email, password, name) VALUES ('$email','$password','$name')";
								$update = mysqli_query($link, $update);
								
							?>
							<script>
								Command: toastr["success"]("Добавлен новый администратор")
								
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
						if (isset($_GET['saveEditUser']))	
						{
							$error = 0;
							$id = mysqli_real_escape_string($link, $_POST['id']);
							$name = mysqli_real_escape_string($link, $_POST['name']);
							$email = mysqli_real_escape_string($link, $_POST['email']);
							$password = mysqli_real_escape_string($link, $_POST['password']);
							$password2 = mysqli_real_escape_string($link, $_POST['password2']);

							
							if (empty($name) OR empty($email))
							{ 
								$error = 1;
							?>
							<script>
								Command: toastr["danger"]("Не введено ФИО и / или Email")
								
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
								$update = mysqli_query($link, "UPDATE in_users SET name = '$name', email = '$email' WHERE id = '$id'");
							?>
							<script>
								Command: toastr["success"]("Данные администратора обновлены")
								
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
							
							if ($password != "")
							{
								
								if ($password != $password2)
								{ 
									$error = 1;
								?>
								<script>
									Command: toastr["error"]("Пароли не совпадают")
									
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
								else
								{
									$password = md5($password);
									$update = mysqli_query($link, "UPDATE in_users SET password = '$password' WHERE id = '$id'");
								?>
								<script>
									Command: toastr["success"]("Пароль администратора обновлен")
									
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
                                            <h4 class="card-title text-white">Добавить нового администратора</h4>  
										</div><!--end col-->                                                                             
									</div>  <!--end row-->                                  
								</div><!--end card-header-->
                                <div class="card-body">    
									<form method="post" action="?saveAddUser=1">
										
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Ф.И.О. *</label>
											<div class="col-sm-10">
												<input class="form-control" type="text" name="name" id="example-text-input" required>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">Email *</label>
											<div class="col-sm-10">
												<input class="form-control" type="email" name="email" id="example-email-input" required>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">Пароль</label>
											<div class="col-sm-10">
												<input class="form-control" type="password" id="example-email-input" name="password" autocomplete="off">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">Пароль еще раз</label>
											<div class="col-sm-10">
												<input class="form-control" type="password" id="example-email-input" name="password2" autocomplete="off">
											</div>
										</div>
										
										<button type="submit" class="btn btn-success">Сохранить</button>
										<a class="btn btn-danger" href="<?php echo $uri_parts; ?>">Отмена</a>
										
										
									</form>
									
									
								</div><!--end card-body-->                                
							</div><!--end card-->
						</div>
						<?php
						}
					?>
					
					<?php 
						if (isset($_GET['edit']))
						{
							$id = $_GET['edit'];
							$select = mysqli_query($link, "SELECT * FROM in_users WHERE id = '$id'");
							$get = mysqli_fetch_array($select);
						?>
						
						<div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title text-white">Редактировать администратора #<?php echo $get['id'] ?></h4>  
										</div><!--end col-->                                                                             
									</div>  <!--end row-->                                  
								</div><!--end card-header-->
                                <div class="card-body">    
									<form method="post" action="?saveEditUser=1">
										
										<input class="form-control" type="hidden" name="id" value="<?php echo $get['id'] ?>">
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Ф.И.О. *</label>
											<div class="col-sm-10">
												<input class="form-control" type="text" value="<?php echo $get['name'] ?>" name="name" id="example-text-input" required>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">Email *</label>
											<div class="col-sm-10">
												<input class="form-control" type="email" value="<?php echo $get['email'] ?>" name="email" id="example-email-input" required>
											</div>
										</div>
										
										
										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right"> </label>
											<div class="mt-1">
												<p class="text-muted mb-1 font-13">
													Для изменения пароля - заполните поля. Если вы не хотите менять пароль - просто оставьте их пустыми.
												</p>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">Пароль</label>
											<div class="col-sm-10">
												<input class="form-control" type="password" id="example-email-input" name="password" autocomplete="off">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">Пароль еще раз</label>
											<div class="col-sm-10">
												<input class="form-control" type="password" id="example-email-input" name="password2" autocomplete="off">
											</div>
										</div>
										
										<button type="submit" class="btn btn-success">Сохранить</button>
										<a class="btn btn-danger" href="<?php echo $uri_parts; ?>">Отмена</a>
										
										
									</form>
									
									
								</div><!--end card-body-->                                
							</div><!--end card-->
						</div>
						<?php
						}
					?>
					
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-bordered mb-0 table-centered">
								<thead>
									<tr>
										<th>id</th>
										<th>Ф.И.О.</th>
										<th>Email</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$selectrUsersTable = mysqli_query($link, "SELECT * FROM in_users ORDER by name");
										while ($getUsersTable = mysqli_fetch_array($selectrUsersTable))
										{
										?>
										<tr>
											<td><?php echo $getUsersTable['id'] ?></td>
											<td><?php echo $getUsersTable['name'] ?></td>
											<td><?php echo $getUsersTable['email'] ?></td>
											
											<td class="text-right">
												<div class="dropdown d-inline-block">
													<a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
														<i class="las la-ellipsis-v font-20 text-muted"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11"><a class="dropdown-item" href="?edit=<?php echo $getUsersTable['id'] ?>">Редактировать</a>
														<?php 
															if ($getUsersTable['role'] != 1)
															{
															?>
															
															<a class="dropdown-item deleteuser<?php echo $getUsersTable['id'] ?>" data-toggle="modal"  data-target="#exampleModalWarning">Удалить</a>
															<script>
																$( ".deleteuser<?php echo $getUsersTable['id'] ?>" ).click(function() {
																	$.post( "scripts/confirmation.php", { type: "user", id: "<?php echo $getUsersTable['id'] ?>" }).done(function( data ) {
																		$( ".loadedContent" ).html(data);
																	});
																});
															</script>
															
														<?php } ?>
													</div>
												</div>
											</td>
										</tr>
									<?php } ?>
									
								</tbody>
							</table><!--end /table-->
						</div><!--end /tableresponsive-->
					</div><!--end /tableresponsive-->
					
                    
					
				</div><!-- container -->
				
				<div class="modal fade" id="exampleModalWarning<?php echo $getUsersTable['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalWarning1" aria-hidden="true">
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
        
	</body>
	
</html>