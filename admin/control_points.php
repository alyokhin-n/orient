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
                                        <h4 class="page-title">Контрольные точки</h4>
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
						if (isset($_GET['delete']))
						{
							$delete = $_GET['delete'];
							// $select = mysqli_query($link, "SELECT * FROM in_control_points WHERE id = '$delete'");
							// $get = mysqli_fetch_array($select);
							// $log = mysqli_query($link, "INSERT INTO in_delete_cp_log (name,log_date) VALUES ('$get[name]',NOW())");
							$update = mysqli_query($link, "DELETE FROM in_control_points WHERE id = '$delete'");
							$update = mysqli_query($link, "DELETE FROM in_ar_points WHERE point_id = '$delete'");
						?>
						<script>
							Command: toastr["success"]("Контрольная точка удалена")
							
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
						if (isset($_GET['saveEditPush']))	
						{
							$error = 0;
							$id = mysqli_real_escape_string($link, $_POST['id']);
							$title = $_POST['title'];
							$description = $_POST['description'];
							$image = $_FILES['image']['tmp_name'];
							
							if (empty($title) OR empty($description) OR empty($image))
							{ 
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
							<?php }
							
							if ($error == 0)
							{
								$update = "UPDATE in_clients SET email = '$email', type_client = '$type' WHERE id = '$id'";

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

					<?php
						if(isset($_GET['addNewCP']))
						{
							$error = 0;
							$name = $_POST['name_point'];
							$client_id = $_POST['client_id'];
							$ar = $_POST['ar'];
							$lat = $_POST['lat'];
							$lng = $_POST['lng'];

							echo $name . "-" . $client_id;

							if(empty($name) OR empty($client_id) OR empty($ar) OR empty($lat) OR empty($lng)){
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
								
								$client_id = mysqli_real_escape_string($link, $client_id);
								$ar = mysqli_real_escape_string($link, $ar);
								$lat = mysqli_real_escape_string($link, $lat);
								$lng = mysqli_real_escape_string($link, $lng);
								$now = date("Y-m-d H:i:s");

								$name = createNamePoint();
								$name = mysqli_real_escape_string($link, $name);

								$insert = mysqli_query($link, "INSERT INTO in_control_points (client_id,name,lat,lng) VALUES ('$client_id','$name','$lat','$lng')");

								$last_id = mysqli_insert_id($link);

								$insert = mysqli_query($link, "INSERT INTO in_ar_points (point_id,ar_id) VALUES ('$last_id','$ar')");

								$check_log = mysqli_query($link, "SELECT * FROM in_delete_cp_log WHERE name = '$name'");
								if(mysqli_num_rows($check_log) > 0){
									while($get_log = mysqli_fetch_array($check_log)){
										$delete_log = mysqli_query($link, "DELETE FROM in_delete_cp_log WHERE id = '$get_log[id]'");
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
							$select = mysqli_query($link, "SELECT * FROM in_push WHERE id = '$id'");
							$get = mysqli_fetch_array($select);
						?>
						
						<div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title text-white">Редактировать PUSH-уведомление #<?php echo $get['id'] ?></h4>  
										</div><!--end col-->                                                                             
									</div>  <!--end row-->                                  
								</div><!--end card-header-->
                                <div class="card-body">    
									<form method="post" action="?saveEditPush=1&page=<?php echo $_GET['page'] ?>" enctype="multipart/form-data">
										
										<input class="form-control" type="hidden" name="id" value="<?php echo $get['id'] ?>">
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Название *</label>
											<div class="col-sm-10">
												<input class="form-control" type="text" value="<?php echo $get['title'] ?>" name="title" id="example-text-input" required>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">Описание *</label>
											<div class="col-sm-10">
												<textarea class="form-control" name="description"><?php echo $get['description'] ?></textarea>
											</div>
										</div>

										<div class="form-group row">
											<label for="example-email-input" class="col-sm-2 col-form-label text-right">Фото</label>
											<div class="col-sm-10">
												<input class="form-control" type="file" name="image">
												<?php if(!empty($get['photo'])){ ?>
												<br/>
													<div class="col-lg-3">                            
														<div class="card">
															<div class="card-header">
																<a href="?edit=<?php echo $get['id'] ?>&deletePhoto=1" class="btn btn-secondary btn-xs float-right">Удалить картинку</a>
															</div><!--end card-header-->
															<div class="card-body"> 
																<div class="media">
																	<img style="width:100%;" src="/admin/uploads/push/<?php echo $get['photo'] ?>" />
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

					<?php
						if (isset($_GET['add']))
						{
							?>
							<div class="col-lg-12">
	                            <div class="card">
	                                <div class="card-header bg-info">
	                                    <div class="row align-items-center">
	                                        <div class="col">                      
	                                            <h4 class="card-title text-white">Добавить Контрольную точку</h4>  
											</div><!--end col-->                                                                             
										</div>  <!--end row-->                                  
									</div><!--end card-header-->
	                                <div class="card-body">    
										<form method="post" action="?addNewCP=1&page=<?php echo $_GET['page'] ?>" enctype="multipart/form-data">
											
											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">Название *</label>
												<div class="col-sm-10">
													<input class="form-control" type="text" name="name_point" value="<?php echo createNamePoint(); ?>" id="example-email-input" required readonly>
												</div>
												<input type="text" id="latFld" name="lat" hidden>
    											<input type="text" id="lngFld" name="lng" hidden>
											</div>

											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">Пользователь *</label>
												<div class="col-sm-10">
													<select name="client_id" class="form-control select2">
														<option value="0" selected disabled>Выберите</option>
														<?php
															$select_user = mysqli_query($link, "SELECT * FROM in_clients");
															while($get_user = mysqli_fetch_array($select_user))
															{
																?>
																<option value="<?php echo $get_user['id'] ?>"><?php echo $get_user['nikname']; ?></option>
																<?php
															}
														?>
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label for="example-email-input" class="col-sm-2 col-form-label text-right">AR model *</label>
												<div class="col-sm-10">
													<select name="ar" class="form-control select2">
														<option value="0" selected disabled>Выберите</option>
														<?php
															$select_ar = mysqli_query($link, "SELECT * FROM ar_models WHERE model <> ''");
															while($get_ar = mysqli_fetch_array($select_ar))
															{
																?>
																<option value="<?php echo $get_ar['id'] ?>"><?php echo $get_ar['name']; ?></option>
																<?php
															}
														?>
													</select>
												</div>
											</div>

											<div id="map" style="height: 400px;margin-bottom: 20px;"></div>
											
											<script>
												let map;
												var markersArray = [];

												function initMap() {
													map = new google.maps.Map(document.getElementById("map"), {
														center: { lat: -34.397, lng: 150.644 },
														zoom: 8,
													});
													
													// infoWindow = new google.maps.InfoWindow();
													// const locationButton = document.createElement("button");
													// locationButton.textContent = "Определить мое местоположение";
													// locationButton.classList.add("custom-map-control-button");
													// map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
													// locationButton.addEventListener("click", () => {

													// 	if (navigator.geolocation) {
													// 		navigator.geolocation.getCurrentPosition(
													// 			(position) => {
													// 				const pos = {
													// 					lat: position.coords.latitude,
													// 					lng: position.coords.longitude,
													// 				};
													// 				infoWindow.setPosition(pos);
													// 				infoWindow.setContent("Location found.");
													// 				infoWindow.open(map);
													// 				map.setCenter(pos);
													// 			},
													// 			() => {
													// 				handleLocationError(true, infoWindow, map.getCenter());
													// 			}
													// 			);
													// 	} else {

													// 		handleLocationError(false, infoWindow, map.getCenter());
													// 	}
													// });

													google.maps.event.addListener(map, "click", function(event)
													{

														placeMarker(event.latLng);


														document.getElementById("latFld").value = event.latLng.lat();
														document.getElementById("lngFld").value = event.latLng.lng();
													});
												}
												function placeMarker(location) {

													deleteOverlays();

													var marker = new google.maps.Marker({
														position: location, 
														map: map
													});


													markersArray.push(marker);


												}


												function deleteOverlays() {
													if (markersArray) {
														for (i in markersArray) {
															markersArray[i].setMap(null);
														}
														markersArray.length = 0;
													}
												}

											</script>
											
											
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
												<label>Название</label>
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
										<th>Пользователь</th>
										<th>Название</th>
										<th>Широта</th>
										<th>Долгота</th>
										<th>AR model</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										
										if ($_POST['search_title'] != '')
										{
											$searchString .=" AND name LIKE '%$_POST[search_nickname]%'";
										}
										
										$num = 20;
										$page = $_GET['page'];  
										$result = "SELECT * FROM in_control_points WHERE id != '' $searchString ORDER by id DESC";
										$result = mysqli_query($link, $result);
										$posts = mysqli_num_rows($result);
										$total = intval(($posts - 1) / $num) + 1;
										$page = intval($page);
										if(empty($page) or $page < 0) $page = 1;
										if($page > $total) $page = $total;
										$start = $page * $num - $num;
										$result = "SELECT * FROM in_control_points WHERE id != '' $searchString ORDER by id DESC LIMIT $start, $num";
										$result = mysqli_query($link, $result);
										while($getCPTable = mysqli_fetch_array($result))
										{
										?>
										<tr>
											<td><?php echo $getCPTable['id']; ?></td>
											<td>
												<?php
													$select_user = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$getCPTable[client_id]'");
													$get_user = mysqli_fetch_array($select_user);
													echo $get_user['nikname'];
												?>
											</td>
											<td><?php echo $getCPTable['name']; ?></td>
											<td><?php echo $getCPTable['lat']; ?></td>
											<td><?php echo $getCPTable['lng']; ?></td>
											<td>
												<?php
													$check_ar = mysqli_query($link, "SELECT * FROM in_ar_points WHERE point_id = '$getCPTable[id]'");
													if(mysqli_num_rows($check_ar) > 0){
														$get_ar = mysqli_fetch_array($check_ar);
														?>
														<button class="btn btn-primary showAr" data-id="<?php echo $get_ar['ar_id'] ?>">Посмотреть AR в 3D</button>
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
													}else{
														echo "<span class='badge badge-pill badge-soft-danger'>Нету AR model</span>";
													}
												?>
											</td>
											<td class="text-right">
												<div class="dropdown d-inline-block">
													<a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
														<i class="las la-ellipsis-v font-20 text-muted"></i>
													</a>
														<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
														
														
														<a class="dropdown-item deleteuser<?php echo $getCPTable['id'] ?>" data-toggle="modal"  data-target="#exampleModalWarning">Удалить</a>
														<script>
															$( ".deleteuser<?php echo $getCPTable['id'] ?>" ).click(function() {
																$.post( "scripts/confirmation.php", { type: "control_point", id: "<?php echo $getCPTable['id'] ?>" }).done(function( data ) {
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
        <script src="template/plugins/select2/select2.min.js"></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAApIdDi7CvnuqeGZIjf7oyBRY8T3SpePI&callback=initMap" async></script>
		
        <!-- App js -->
        <script src="template/default/assets/js/app.js"></script>

        <script>
        	$('.select2').select2({
        		placeholder: 'Выберите'
        	});
        </script>
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