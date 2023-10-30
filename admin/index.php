<?php include("config/dbconnect.php"); ?>
<!DOCTYPE html>
<html lang="uk">
	
    <head>
        <meta charset="utf-8" />
        <title><?php echo $sitename; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		
        <!-- App favicon -->
        <link rel="shortcut icon" href="template/default/assets/images/favicon.ico">
		
        <!-- App css -->
        <link href="template/default/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="template/default/assets/css/app.min.css" rel="stylesheet" type="text/css" />
		
		<script src="template/default/assets/js/jquery.min.js"></script>
		<link href="template/plugins/toastr.min.css" rel="stylesheet"/>
		<script src="template/plugins/toastr.min.js"></script>
		
	</head>
	
    <body class="account-body accountbg">
		
        <!-- Log In page -->
        <div class="container">
            <div class="row vh-100 d-flex justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="card">
								<?php 
									if ($_GET['login'] == 1)
									{
										$email = mysqli_real_escape_string($link, $_POST['email']);
										$password = mysqli_real_escape_string($link, $_POST['password']);
										
										$error = 0;
										if (empty($email) OR empty($password))
										{
											$error = 1;
										?>
										<script>
										Command: toastr["error"]("Введите Email и пароль", "Ошибка")

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
										</script>
										<?php
										}
										
										
										$password = md5($password);
										$selectUser = mysqli_query($link, "SELECT * FROM in_users WHERE email = '$email' AND password = '$password'");
										$num = mysqli_num_rows($selectUser);
										
										if ($num == 0)
										{
											$error = 1;
											?>
										<script>
										Command: toastr["error"]("Данные авторизации неверные, проверьте Email и пароль", "Ошибка")

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
										</script>
										<?php
										}
										else
										{
											$getU = mysqli_fetch_array($selectUser);
											$_SESSION['user'] = $getU['id'];
											$_SESSION['email'] = $getU['email'];												
											header('Location: main.php');
											exit;
										}
									}
								?>
								
								
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
										
                                        <a href="/admin/" class="logo logo-admin">
                                            <img src="template/default/assets/images/logo-sm-dark.png" height="50" alt="logo" class="auth-logo">
										</a>
                                        <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18"><?php echo $sitename ?></h4>   
                                        <p class="text-muted  mb-0">Авторизуйтесь для продолжения работы</p>  
									</div>
								</div>
                                <div class="card-body p-0">
                                    <ul class="nav-border nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active font-weight-semibold" data-toggle="tab" href="#LogIn_Tab" role="tab">Вход</a>
										</li>
									</ul>
									<!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">                                        
                                            <form class="form-horizontal auth-form" action="?login=1" method="POST">
												
                                                <div class="form-group mb-2">
                                                    <label for="username">Email</label>
                                                    <div class="input-group">                                                                                         
                                                        <input type="email" class="form-control" name="email" placeholder="Введите Email">
													</div>                                    
													</div><!--end form-group--> 
													
													<div class="form-group mb-2">
														<label for="userpassword">Пароль</label>                                            
														<div class="input-group">                                  
															<input type="password" class="form-control password" name="password" placeholder="Введите пароль">
															<input type="checkbox" id="show-password" style="position: absolute;right: 10px;margin-top: 13px;z-index:999">
															<script>
															$(document).ready(function() {
															$("#show-password").change(function(){
																$(this).prop("checked") ?  $(".password").prop("type", "text") : $(".password").prop("type", "password");    
															});
														});
															</script>
														</div>                               
													</div><!--end form-group--> 
													
													
													
													<div class="form-group mb-0 row">
														<div class="col-12">
															<button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Войти <i class="fas fa-sign-in-alt ml-1"></i></button>
														</div><!--end col--> 
													</div> <!--end form-group-->                           
											</form><!--end form-->
										</div>
										
										
									</div>
								</div><!--end card-body-->
                                <div class="card-body bg-light-alt text-center">
                                    <span class="text-muted d-none d-sm-inline-block">© <?php echo date("Y"); ?></span>                                            
								</div>
							</div><!--end card-->
						</div><!--end col-->
					</div><!--end row-->
				</div><!--end col-->
			</div><!--end row-->
		</div><!--end container-->
        <!-- End Log In page -->
		
        
		
		
        <!-- jQuery  -->
        
        <script src="template/default/assets/js/bootstrap.bundle.min.js"></script>
        <script src="template/default/assets/js/waves.js"></script>
        <script src="template/default/assets/js/feather.min.js"></script>
        <script src="template/default/assets/js/simplebar.min.js"></script>
		
        
	</body>
	
</html>