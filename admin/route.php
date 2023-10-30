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
        	#map {
				height: 500px;
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
                                        <h4 class="page-title">Маршруты</h4>
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
						if (isset($_GET['editRoute']))
						{
							$id = $_GET['editRoute'];
							$select = mysqli_query($link, "SELECT * FROM in_routes WHERE id = '$id'");
							$get = mysqli_fetch_array($select);
						?>
						<div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title text-white">Редактировать маршрут для #<?php echo $get['name'] ?></h4>  
										</div><!--end col-->                                                                             
									</div>  <!--end row-->                                  
								</div><!--end card-header-->
                                <div class="card-body">    
									<input class="form-control" type="hidden" name="id" value="<?php echo $get['id'] ?>">
									<div id="map"></div>
									<?php 
										$selectMarkers = mysqli_query($link, "SELECT * FROM in_routes_points WHERE route_id = '$get[id]' ORDER by marker_id");
										$getMarkers = mysqli_fetch_array($selectMarkers);
										$firstMarkerLat = $getMarkers['lat'];
										$firstMarkerLng = $getMarkers['lng'];
									?>
									<script>
										let map, infoWindow;
										function initMap() {
										map = new google.maps.Map(document.getElementById("map"), {
										<?php 
											if ($firstMarkerLat != '')
											{
												$lat = $firstMarkerLat;
												$lng = $firstMarkerLng;
											}
											else
											{
												$lat = "-34.397";
												$lng = "150.644";
											}
										?>
										center: { lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?> },
										zoom: 18,
										});
										infoWindow = new google.maps.InfoWindow();
										const locationButton = document.createElement("button");
										const locationButton2 = document.createElement("button");
										locationButton.textContent = "Определить мое местоположение";
										locationButton2.textContent = "Нарисовать линию между маркерами";
										locationButton.classList.add("custom-map-control-button");
										locationButton2.classList.add("custom-map-control-button");
										map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
										map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton2);
										locationButton.addEventListener("click", () => {
											// Try HTML5 geolocation.
											if (navigator.geolocation) {
												navigator.geolocation.getCurrentPosition(
												(position) => {
													const pos = {
														lat: position.coords.latitude,
														lng: position.coords.longitude,
													};
													infoWindow.setPosition(pos);
													infoWindow.setContent("Location found.");
													infoWindow.open(map);
													map.setCenter(pos);
												},
												() => {
													handleLocationError(true, infoWindow, map.getCenter());
												}
												);
												} else {
												// Browser doesn't support Geolocation
												handleLocationError(false, infoWindow, map.getCenter());
											}
										});
										locationButton2.addEventListener("click", () => {
											document.location.reload();
										});
										google.maps.event.addListener(map, 'click', function(event) {
											placeMarker(event.latLng);
										});
										var incrementId = 0;
										
										
										
										function placeMarker(location) {
											incrementId++;
											var marker = new google.maps.Marker({
												position: location, 
												map: map,
												draggable: true,
												icon: 'images/markers/number_'+incrementId+'.png'
											});
											marker.set("id", incrementId);
											var mlat = marker.getPosition().lat();
											var mlng = marker.getPosition().lng();
											var markerId = marker.get("id");
											console.log(mlat+" "+mlng+" "+markerId);
											google.maps.event.addListener(marker, 'rightclick', function(event) {
												marker.setMap(null);
												$.post( "scripts/setMarker.php", { route_id: "<?php echo $get['id'] ?>", markerId: markerId, type: "delete", mlat: mlat, mlng: mlng } );
											});
											$.post( "scripts/setMarker.php", { route_id: "<?php echo $get['id'] ?>", markerId: markerId, type: "set", mlat: mlat, mlng: mlng } );
											google.maps.event.addListener(marker, 'dragend', function (evt) {
												var mlat = marker.getPosition().lat();
												var mlng = marker.getPosition().lng();
												var markerId = marker.get("id");
												console.log(mlat+" "+mlng+" "+markerId);
												$.post( "scripts/setMarker.php", { route_id: "<?php echo $get['id'] ?>", markerId: markerId, type: "update", mlat: mlat, mlng: mlng } );
											});
										}
										
										
										function placeMarkerExist(lat, lng, markerincrement) {
											incrementId++;
											var marker2 = new google.maps.Marker({
												position: new google.maps.LatLng(lat, lng), 
												map: map,
												draggable: true,
												icon: 'images/markers/number_'+incrementId+'.png'
											});
											marker2.set("id", markerincrement);
											var mlat = marker2.getPosition().lat();
											var mlng = marker2.getPosition().lng();
											var markerId = marker2.get("id");
											console.log(mlat+" "+mlng+" "+markerId);
											google.maps.event.addListener(marker2, 'rightclick', function(event) {
												marker2.setMap(null);
												$.post( "scripts/setMarker.php", { route_id: "<?php echo $get['id'] ?>", markerId: markerId, type: "delete", mlat: mlat, mlng: mlng } );
											});
											google.maps.event.addListener(marker2, 'dragend', function (evt) {
												var mlat = marker2.getPosition().lat();
												var mlng = marker2.getPosition().lng();
												var markerId = marker2.get("id");
												console.log(mlat+" "+mlng+" "+markerId);
												$.post( "scripts/setMarker.php", { route_id: "<?php echo $get['id'] ?>", markerId: markerId, type: "update", mlat: mlat, mlng: mlng } );
											});
										}
										<?php 
											if ($firstMarkerLat != '')
											{
												$selectMarkers = mysqli_query($link, "SELECT * FROM in_routes_points WHERE route_id = '$get[id]' ORDER by marker_id");
												while ($getMarkers = mysqli_fetch_array($selectMarkers))
												{ ?>
												placeMarkerExist(<?php echo $getMarkers['lat'] ?>, <?php echo $getMarkers['lng'] ?>, <?php echo $getMarkers['marker_id'] ?>);
												<?php
												}
											}
										?>
										
										
										const flightPlanCoordinates = [
										<?php 
											if ($firstMarkerLat != '')
											{
												$selectMarkers = mysqli_query($link, "SELECT * FROM in_routes_points WHERE route_id = '$get[id]' ORDER by marker_id");
												while ($getMarkers = mysqli_fetch_array($selectMarkers))
												{ ?>
												{ lat: <?php echo $getMarkers['lat'] ?>, lng: <?php echo $getMarkers['lng'] ?> },
											<?php } ?>
											<?php
											}
										?>
										];
										
										
										
										const flightPath = new google.maps.Polyline({
											path: flightPlanCoordinates,
											geodesic: true,
											strokeColor: "#00FFFF",
											strokeOpacity: 1.0,
											strokeWeight: 2,
											
											
											
										});
										flightPath.setMap(map);
									}
									function handleLocationError(browserHasGeolocation, infoWindow, pos) {
										infoWindow.setPosition(pos);
										infoWindow.setContent(
										browserHasGeolocation
										? "Error: The Geolocation service failed."
										: "Error: Your browser doesn't support geolocation."
										);
										infoWindow.open(map);
									}
								</script>
								<a style="margin-top:20px;" class="btn btn-success" href="<?php echo $uri_parts; ?>">Закрыть редактирование маршрута</a>
							</div><!--end card-body-->                                
						</div>
					</div>
					<?php
					}
				?>
				<?php 
					if (isset($_GET['delete']))
					{
						$delete = $_GET['delete'];
						$selectPhotos = mysqli_query($link, "SELECT * FROM in_routes WHERE id = '$delete'");
						$getPhotos = mysqli_fetch_array($selectPhotos);
						if($getPhotos['image'] != ''){
							unlink("uploads/routes/".$getPhotos['image']);
						}
						$update = mysqli_query($link, "DELETE FROM in_routes WHERE id = '$delete'");
						$select = mysqli_query($link, "SELECT * FROM in_routes_points WHERE route_id = '$delete'");
						while($get = mysqli_fetch_array($select)){
							$select_cp = mysqli_query($link, "SELECT * FROM in_control_points WHERE id = '$get[point_id]'");
							$get_cp = mysqli_fetch_array($select_cp);
							$log = mysqli_query($link, "INSERT INTO in_delete_cp_log (name,log_date) VALUES ('$get_cp[name]',NOW())");
						}
						$update = mysqli_query($link, "DELETE FROM in_routes_points WHERE route_id = '$delete'");
					?>
					<script>
						Command: toastr["success"]("Маршрут удален")
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
					if (isset($_GET['saveEditRoute']))	
					{
						$error = 0;
						$client_id = mysqli_real_escape_string($link, $_POST['client_id']);
						$id = mysqli_real_escape_string($link, $_POST['id']);
						$name = mysqli_real_escape_string($link, $_POST['name']);
						$description = mysqli_real_escape_string($link, $_POST['description']);
						$cost = mysqli_real_escape_string($link, $_POST['cost']);
						$route_oc = mysqli_real_escape_string($link, $_POST['route_oc']);
						$route_type = mysqli_real_escape_string($link, $_POST['route_type']);
						$route_theme = mysqli_real_escape_string($link, $_POST['route_theme']);
						$route_method = mysqli_real_escape_string($link, $_POST['route_method']);
						$route_terra = mysqli_real_escape_string($link, $_POST['route_terra']);
						$penalty_minutes = mysqli_real_escape_string($link, $_POST['penalty_minutes']);
						$cp_arr = $_POST['cp_id'];
						if (empty($client_id) OR empty($name) OR empty($description) OR empty($cost) OR empty($cp_arr))
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
							$update = "UPDATE in_routes SET 
							client_id = '$client_id', 
							name = '$name', 
							description = '$description', 
							cost = '$cost', 
							route_oc = '$route_oc', 
							route_type = '$route_type', 
							route_theme = '$route_theme', 
							route_method = '$route_method', 
							route_terra = '$route_terra', 
							penalty_minutes = '$penalty_minutes'
							WHERE id = '$id'";
							$tmpFilePath1 = $_FILES['image']['tmp_name'];
							if ($tmpFilePath1 != "")
							{
								$selectPhotos = mysqli_query($link, "SELECT * FROM in_routes WHERE id = '$id'");
								$getPhotos = mysqli_fetch_array($selectPhotos);
								if(!empty($getPhotos['image'])){
									unlink("uploads/routes/".$getPhotos['image']);
								}
								$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
								$addon = rand(1, 10000)."_".rand(1, 10000);
								$imgname = $addon."_".time().".".$ext;
								$newFilePath = "uploads/routes/" . $imgname;
								if(move_uploaded_file($tmpFilePath1, $newFilePath)) {
									$insertGallery = mysqli_query($link, "UPDATE in_routes SET image = '$imgname' WHERE id = '$id'");
								}
							}
							//echo $update;
							$update = mysqli_query($link, $update);

							$delet_cp = mysqli_query($link, "DELETE FROM in_routes_points WHERE route_id = '$id'");
							$i = 1;
							foreach ($cp_arr as $cp) {
								$insert_point = mysqli_query($link, "INSERT INTO in_routes_points (route_id,point_id,marker_id) VALUES ('$id','$cp','$i')");
								$i++;
							}
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
					if(isset($_GET['addNewRoute']))
					{
						$error = 0;
						$client_id = mysqli_real_escape_string($link, $_POST['client_id']);
						$name = mysqli_real_escape_string($link, $_POST['name']);
						$description = mysqli_real_escape_string($link, $_POST['description']);
						$cost = mysqli_real_escape_string($link, $_POST['cost']);
						$route_oc = mysqli_real_escape_string($link, $_POST['route_oc']);
						$route_type = mysqli_real_escape_string($link, $_POST['route_type']);
						$route_theme = mysqli_real_escape_string($link, $_POST['route_theme']);
						$route_method = mysqli_real_escape_string($link, $_POST['route_method']);
						$route_terra = mysqli_real_escape_string($link, $_POST['route_terra']);
						$penalty_minutes = mysqli_real_escape_string($link, $_POST['penalty_minutes']);
						$cp_arr = $_POST['cp_id'];
						
						if(empty($client_id) OR empty($name) OR empty($description) OR empty($cost) OR empty($cp_arr)){
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
							$insert = "INSERT INTO in_routes (client_id, name, description, cost, route_oc, route_type, route_theme, route_method, route_terra, penalty_minutes) VALUES ('$client_id', '$name', '$description', '$cost', '$route_oc', '$route_type', '$route_theme', '$route_method', '$route_terra', '$penalty_minutes')";
							//echo $insert;
							$insert = mysqli_query($link, $insert);
							$last_id = mysqli_insert_id($link);

							$i = 1;
							foreach ($cp_arr as $cp) {
								$insert_point = mysqli_query($link, "INSERT INTO in_routes_points (route_id,point_id,marker_id) VALUES ('$last_id','$cp','$i')");
								$i++;
							}

							$tmpFilePath1 = $_FILES['image']['tmp_name'];
							if ($tmpFilePath1 != "")
							{
								$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
								$addon = rand(1, 10000)."_".rand(1, 10000);
								$imgname = $addon."_".time().".".$ext;
								$newFilePath = "uploads/routes/" . $imgname;
								if(move_uploaded_file($tmpFilePath1, $newFilePath)) {
									$insertGallery = mysqli_query($link, "UPDATE in_routes SET image = '$imgname' WHERE id = '$last_id'");
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
						$select = mysqli_query($link, "SELECT * FROM in_routes WHERE id = '$id'");
						$get = mysqli_fetch_array($select);
					?>
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header bg-info">
								<div class="row align-items-center">
									<div class="col">                      
										<h4 class="card-title text-white">Редактировать маршрут #<?php echo $get['id'] ?></h4>  
									</div><!--end col-->                                                                             
								</div>  <!--end row-->                                  
							</div><!--end card-header-->
							<div class="card-body">    
								<form method="post" action="?saveEditRoute=1&page=<?php echo $_GET['page'] ?>" enctype="multipart/form-data">
									<input class="form-control" type="hidden" name="id" value="<?php echo $get['id'] ?>">
									<div class="form-group row">
										<label for="example-email-input" class="col-sm-2 col-form-label text-right">Пользователь *</label>
										<div class="col-sm-10">
											<select name="client_id" class="form-control select2">
												<option value="0" selected disabled>Выберите</option>
												<?php
												$select_user = mysqli_query($link, "SELECT * FROM in_clients");
												while($get_user = mysqli_fetch_array($select_user))
												{
													if($get_user['id'] == $get['client_id']){
													?>
														<option value="<?php echo $get_user['id'] ?>" selected><?php echo $get_user['nikname']; ?></option>
													<?php
													}else{
													?>
														<option value="<?php echo $get_user['id'] ?>"><?php echo $get_user['nikname']; ?></option>
													<?php
													}
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Название *</label>
										<div class="col-sm-10">
											<input class="form-control" type="text" value="<?php echo $get['name'] ?>" name="name" id="example-text-input" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-email-input" class="col-sm-2 col-form-label text-right">Описание *</label>
										<div class="col-sm-10">
											<textarea class="form-control" rows="5" name="description"><?php echo $get['description'] ?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Стоимость *</label>
										<div class="col-sm-10">
											<input class="form-control" type="number" value="<?php echo $get['cost'] ?>" name="cost" id="example-text-input" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-email-input" class="col-sm-2 col-form-label text-right">Картинка</label>
										<div class="col-sm-10">
											<input class="form-control" type="file" name="image">
											<?php if(!empty($get['image'])){ ?>
												<br/>
												<div class="col-lg-3">                            
													<div class="card">
														<div class="card-body"> 
															<div class="media">
																<img style="width:100%;" src="/admin/uploads/routes/<?php echo $get['image'] ?>" />
															</div>
														</div><!--end card-body-->
													</div><!--end card-->
												</div>
											<?php } ?>
										</div>
									</div>
									<hr/>
									<div class="form-group row">
										<label for="example-email-input" class="col-sm-2 col-form-label text-right">Контрольные точки *</label>
										<div class="col-sm-10">
											<select id="cp_id_edit" name="cp_id[]" class="form-control select2" multiple="true">
												<?php
												$select_cp_selected = mysqli_query($link, "SELECT point_id FROM in_routes_points WHERE route_id = '$get[id]' ORDER BY marker_id");
												while($get_cp_selected = mysqli_fetch_array($select_cp_selected)){
													$select_cp = mysqli_query($link, "SELECT * FROM in_control_points WHERE id = '$get_cp_selected[point_id]'");
													if(mysqli_num_rows($select_cp) > 0){
														$get_cp = mysqli_fetch_array($select_cp);
														?>
														<option value="<?php echo $get_cp['id'] ?>" selected><?php echo $get_cp['name']; ?></option>
														<?php
													}
												}
												$select_cp = mysqli_query($link, "SELECT * FROM in_control_points WHERE id NOT IN (SELECT point_id FROM in_routes_points WHERE route_id = '$get[id]' ORDER BY marker_id) ORDER BY id");
												while($get_cp = mysqli_fetch_array($select_cp))
												{
													?>
													<option value="<?php echo $get_cp['id'] ?>" ><?php echo $get_cp['name']; ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<div id="arBlock_edit" class="form-group row" style="display: none;">
										<label for="example-email-input" class="col-sm-2 col-form-label text-right">AR по контрольным точкам *</label>
										<div class="col-sm-10">
											<div class="row loadArButtons_edit">
												
											</div>
										</div>
									</div>
									<div id="showRoute_edit" class="form-group row" style="display: none;">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right"></label>
										<div class="col-sm-10">
											<button type="button" class="btn btn-success showRoute_edit">Посмотреть маршрут</button>
										</div>
									</div>
									<script>
										var val = $("#cp_id_edit").val();

										if(val != '' && val != null){
											$.post( "scripts/get_cp_ar.php", { val: val })
											.done(function( data ) {
												$("#arBlock_edit").show();
												$("#showRoute_edit").show();
												$(".loadArButtons_edit").html(data);
											});
										}else{
											$("#arBlock_edit").hide();
											$("#showRoute_edit").hide();
										}
										$("#cp_id_edit").change(function(){
											var val = $("#cp_id_edit").val();
											
											if(val != '' && val != null){
												$.post( "scripts/get_cp_ar.php", { val: val })
												.done(function( data ) {
													$("#arBlock_edit").show();
													$("#showRoute_edit").show();
													$(".loadArButtons_edit").html(data);
												});
											}else{
												$("#arBlock_edit").hide();
												$("#showRoute_edit").hide();
											}
										});
										$(".showRoute_edit").click(function(){
											var val = $("#cp_id_edit").val();

											$.post( "scripts/show_route.php", { val: val })
											.done(function( data ) {
												$(".loadMap").html(data);
												$("#exampleModalMap").modal("show");
											});
										});
									</script>
									<hr/>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Маршурт открыт/закрыт</label>
										<div class="col-sm-10">
											<select name="route_oc" class="form-control">
												<?php if ($get['route_oc'] == "Open") { ?>
													<option value="1">Open</option>
													<option value="Closed">Closed</option>
												<?php } ?>
												<?php if ($get['route_oc'] == "Closed") { ?>
													<option value="Closed">Closed</option>
													<option value="Open">Open</option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Тип</label>
										<div class="col-sm-10">
											<select name="route_type" class="form-control">
												<?php if ($get['route_type'] == "Orient") { ?>
													<option value="Orient">Orient</option>
													<option value="Rogaine">Rogaine</option>
													<option value="Quest">Quest</option>
													<option value="Detective">Detective</option>
												<?php } ?>
												<?php if ($get['route_type'] == "Quest") { ?>
													<option value="Quest">Quest</option>
													<option value="Orient">Orient</option>
													<option value="Rogaine">Rogaine</option>
													<option value="Detective">Detective</option>
												<?php } ?>
												<?php if ($get['route_type'] == "Detective") { ?>
													<option value="Detective">Detective</option>
													<option value="Quest">Quest</option>
													<option value="Orient">Orient</option>
													<option value="Rogaine">Rogaine</option>
												<?php } ?>
												<?php if ($get['route_type'] == "Rogaine") { ?>
													<option value="Rogaine">Rogaine</option>
													<option value="Detective">Detective</option>
													<option value="Quest">Quest</option>
													<option value="Orient">Orient</option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Тема</label>
										<div class="col-sm-10">
											<select name="route_theme" class="form-control">
												<?php if ($get['route_theme'] == "Science") { ?>
													<option value="Science">Science</option>
													<option value="Geo">Geo</option>
													<option value="Art">Art</option>
													<option value="Sport">Sport</option>
													<option value="Language">Language</option>
												<?php } ?>
												<?php if ($get['route_theme'] == "Geo") { ?>
													<option value="Geo">Geo</option>
													<option value="Science">Science</option>
													<option value="Art">Art</option>
													<option value="Sport">Sport</option>
													<option value="Language">Language</option>
												<?php } ?>
												<?php if ($get['route_theme'] == "Art") { ?>
													<option value="Art">Art</option>
													<option value="Geo">Geo</option>
													<option value="Science">Science</option>
													<option value="Sport">Sport</option>
													<option value="Language">Language</option>
												<?php } ?>
												<?php if ($get['route_theme'] == "Sport") { ?>
													<option value="Sport">Sport</option>
													<option value="Art">Art</option>
													<option value="Geo">Geo</option>
													<option value="Science">Science</option>
													<option value="Language">Language</option>
												<?php } ?>
												<?php if ($get['route_theme'] == "Language") { ?>
													<option value="Language">Language</option>
													<option value="Sport">Sport</option>
													<option value="Art">Art</option>
													<option value="Geo">Geo</option>
													<option value="Science">Science</option>
												<?php } ?>
											</select>	
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Метод</label>
										<div class="col-sm-10">
											<select name="route_method" class="form-control">
												<?php if ($get['route_method'] == "Runner") { ?>
													<option value="Runner">Runner</option>
													<option value="Bike">Bike</option>
													<option value="Ski">Ski</option>
												<?php } ?>
												<?php if ($get['route_method'] == "Bike") { ?>
													<option value="Bike">Bike</option>
													<option value="Runner">Runner</option>
													<option value="Ski">Ski</option>
												<?php } ?>
												<?php if ($get['route_method'] == "Ski") { ?>
													<option value="Ski">Ski</option>
													<option value="Bike">Bike</option>
													<option value="Runner">Runner</option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Терра</label>
										<div class="col-sm-10">
											<select name="route_terra" class="form-control">
												<?php if ($get['route_terra'] == "Forest") { ?>
													<option value="Forest">Forest</option>
													<option value="City">City</option>
													<option value="Park">Park</option>
												<?php } ?>
												<?php if ($get['route_terra'] == "City") { ?>
													<option value="City">City</option>
													<option value="Forest">Forest</option>
													<option value="Park">Park</option>
												<?php } ?>
												<?php if ($get['route_terra'] == "Park") { ?>
													<option value="Park">Park</option>
													<option value="City">City</option>
													<option value="Forest">Forest</option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Пенальти</label>
										<div class="col-sm-10">
											<input class="form-control" type="number" value="<?php echo $get['penalty_minutes'] ?>" name="penalty_minutes" id="example-text-input" required>
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
										<h4 class="card-title text-white">Добавить маршрут</h4>  
									</div><!--end col-->                                                                             
								</div>  <!--end row-->                                  
							</div><!--end card-header-->
							<div class="card-body">    
								<form method="post" action="?addNewRoute=1&page=<?php echo $_GET['page'] ?>" enctype="multipart/form-data">
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
										<label for="example-email-input" class="col-sm-2 col-form-label text-right">Название *</label>
										<div class="col-sm-10">
											<input class="form-control" type="text" name="name" id="example-email-input" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-email-input" class="col-sm-2 col-form-label text-right">Описание *</label>
										<div class="col-sm-10">
											<textarea rows="5" class="form-control" name="description"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-email-input" class="col-sm-2 col-form-label text-right">Стоимость *</label>
										<div class="col-sm-10">
											<input class="form-control" type="number" name="cost" id="example-email-input" required>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-email-input" class="col-sm-2 col-form-label text-right">Картинка</label>
										<div class="col-sm-10">
											<input class="form-control" type="file" name="image">
										</div>
									</div>
									<hr/>
									<div class="form-group row">
										<label for="example-email-input" class="col-sm-2 col-form-label text-right">Контрольные точки *</label>
										<div class="col-sm-10">
											<select id="cp_id" name="cp_id[]" class="form-control select2" multiple="true">
												<?php
												$select_cp = mysqli_query($link, "SELECT * FROM in_control_points ORDER BY id");
												while($get_cp = mysqli_fetch_array($select_cp))
												{
													?>
													<option value="<?php echo $get_cp['id'] ?>"><?php echo $get_cp['name']; ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<div id="arBlock" class="form-group row" style="display: none;">
										<label for="example-email-input" class="col-sm-2 col-form-label text-right">AR по контрольным точкам *</label>
										<div class="col-sm-10">
											<div class="row loadArButtons">
												
											</div>
										</div>
									</div>
									<div id="showRoute" class="form-group row" style="display: none;">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right"></label>
										<div class="col-sm-10">
											<button class="btn btn-success showRoute">Посмотреть маршрут</button>
										</div>
									</div>
									<script>
										$("#cp_id").change(function(){
											var val = $("#cp_id").val();
											
											if(val != '' && val != null){
												$.post( "scripts/get_cp_ar.php", { val: val })
												.done(function( data ) {
													$("#arBlock").show();
													$("#showRoute").show();
													$(".loadArButtons").html(data);
												});
											}else{
												$("#arBlock").hide();
												$("#showRoute").hide();
											}
										});
										$(".showRoute").click(function(){
											var val = $("#cp_id").val();

											$.post( "scripts/show_route.php", { val: val })
											.done(function( data ) {
												$(".loadMap").html(data);
												$("#exampleModalMap").modal("show");
											});
										});
									</script>
									<hr/>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Маршурт открыт/закрыт</label>
										<div class="col-sm-10">
											<select name="route_oc" class="form-control">
													<option value="Open">Open</option>
													<option value="Closed">Closed</option>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Тип</label>
										<div class="col-sm-10">
											<select name="route_type" class="form-control">
													<option value="Orient">Orient</option>
													<option value="Rogaine">Rogaine</option>
													<option value="Quest">Quest</option>
													<option value="Detective">Detective</option>
											</select>
										</div>
									</div>
									
									
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Тема</label>
										<div class="col-sm-10">
											<select name="route_theme" class="form-control">
													<option value="Science">Science</option>
													<option value="Geo">Geo</option>
													<option value="Art">Art</option>
													<option value="Sport">Sport</option>
													<option value="Language">Language</option>
											</select>	
										</div>
									</div>
									
									
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Метод</label>
										<div class="col-sm-10">
											<select name="route_method" class="form-control">
													<option value="Runner">Runner</option>
													<option value="Bike">Bike</option>
													<option value="Ski">Ski</option>
											</select>	
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Терра</label>
										<div class="col-sm-10">
											<select name="route_terra" class="form-control">
													<option value="Forest">Forest</option>
													<option value="City">City</option>
													<option value="Park">Park</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="example-text-input" class="col-sm-2 col-form-label text-right">Пенальти</label>
										<div class="col-sm-10">
											<input class="form-control" type="number"  name="penalty_minutes" id="example-text-input" required>
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
							<form id="searchForm" method="get" action="/admin/scripts/route_datatable2.php">
								<div class="row">

									<div class="col-lg-2">
										<div class="form-group">
											<label>Название</label>
											<input type="text" class="form-control search-class" name="search_name">
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
											<label data-toggle="tooltip" data-placement="top" title="Кол-во спортсменов, прошедших маршрут">U</label>
											<div style="display: flex;">
												<div class="input-group" style="margin-right: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ОТ</button>
													</span>
													<input type="number" id="search_count_athletes_end_with" name="search_count_athletes_end_with" class="form-control search-class">
												</div>
												<div class="input-group" style="margin-left: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ДО</button>
													</span>
													<input type="number" id="search_count_athletes_end_to" name="search_count_athletes_end_to" class="form-control search-class">
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Рейтинг">R</label>
											<div style="display: flex;">
												<div class="input-group" style="margin-right: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ОТ</button>
													</span>
													<input type="number" id="search_rate_with" name="search_rate_with" class="form-control search-class">
												</div>
												<div class="input-group" style="margin-left: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ДО</button>
													</span>
													<input type="number" id="search_rate_to" name="search_rate_to" class="form-control search-class">
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Цена">€</label>
											<div style="display: flex;">
												<div class="input-group" style="margin-right: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ОТ</button>
													</span>
													<input type="number" id="search_cost_with" name="search_cost_with" class="form-control search-class">
												</div>
												<div class="input-group" style="margin-left: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ДО</button>
													</span>
													<input type="number" id="search_cost_to" name="search_cost_to" class="form-control search-class">
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Тип + Тема">Ty</label>
											<select name="search_type" class="form-control select2 search-class">
												<option value="all">Все</option>
												<?php
												$select_type = mysqli_query($link, "SELECT * FROM in_route_type");
												while($get_type = mysqli_fetch_array($select_type))
												{
													if($_GET['search_type'] == $get_type['name']){
														?>
														<option value="<?php echo $get_type['name'] ?>" selected><?php echo $get_type['name']; ?></option>
														<?php
													}else{
														?>
														<option value="<?php echo $get_type['name'] ?>"><?php echo $get_type['name']; ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Кол-во КП">CP</label>
											<div style="display: flex;">
												<div class="input-group" style="margin-right: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ОТ</button>
													</span>
													<input type="number" id="search_count_cp_with" name="search_count_cp_with" class="form-control search-class search-class">
												</div>
												<div class="input-group" style="margin-left: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ДО</button>
													</span>
													<input type="number" id="search_count_cp_to" name="search_count_cp_to" class="form-control search-class">
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Метод">Mt</label>
											<select name="search_method" class="form-control select2 search-class">
												<option value="all">Все</option>
												<?php
												$select_method = mysqli_query($link, "SELECT * FROM in_route_method");
												while($get_method = mysqli_fetch_array($select_method))
												{
													if($_GET['search_method'] == $get_method['name']){
														?>
														<option value="<?php echo $get_method['name'] ?>" selected><?php echo $get_method['name']; ?></option>
														<?php
													}else{
														?>
														<option value="<?php echo $get_method['name'] ?>"><?php echo $get_method['name']; ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Местность">Tr</label>
											<select name="search_terra" class="form-control select2 search-class">
												<option value="all">Все</option>
												<?php
												$select_terra = mysqli_query($link, "SELECT * FROM in_route_terra");
												while($get_terra = mysqli_fetch_array($select_terra))
												{
													if($_GET['search_terra'] == $get_terra['name']){
														?>
														<option value="<?php echo $get_terra['name'] ?>" selected><?php echo $get_terra['name']; ?></option>
														<?php
													}else{
														?>
														<option value="<?php echo $get_terra['name'] ?>"><?php echo $get_terra['name']; ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Сумма - за маршрут">∑M</label>
											<div style="display: flex;">
												<div class="input-group" style="margin-right: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ОТ</button>
													</span>
													<input type="number" id="search_route_sum_with" name="search_route_sum_with" class="form-control search-class">
												</div>
												<div class="input-group" style="margin-left: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ДО</button>
													</span>
													<input type="number" id="search_route_sum_to" name="search_route_sum_to" class="form-control search-class">
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Сумма - чаевые">∑T</label>
											<div style="display: flex;">
												<div class="input-group" style="margin-right: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ОТ</button>
													</span>
													<input type="number" id="search_route_tips_with" name="search_route_tips_with" class="form-control search-class">
												</div>
												<div class="input-group" style="margin-left: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ДО</button>
													</span>
													<input type="number" id="search_route_tips_to" name="search_route_tips_to" class="form-control search-class">
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
											<label data-toggle="tooltip" data-placement="top" title="Сумма - подсказка">∑H</label>
											<div style="display: flex;">
												<div class="input-group" style="margin-right: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ОТ</button>
													</span>
													<input type="number" id="search_route_hints_with" name="search_route_hints_with" class="form-control search-class">
												</div>
												<div class="input-group" style="margin-left: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ДО</button>
													</span>
													<input type="number" id="search_route_hints_to" name="search_route_hints_to" class="form-control search-class">
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Сумма - за маршрут + чаевые + подсказка">∑S</label>
											<div style="display: flex;">
												<div class="input-group" style="margin-right: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ОТ</button>
													</span>
													<input type="number" id="search_route_all_sum_with" name="search_route_all_sum_with" class="form-control search-class" step="0.01">
												</div>
												<div class="input-group" style="margin-left: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ДО</button>
													</span>
													<input type="number" id="search_route_all_sum_to" name="search_route_all_sum_to" class="form-control search-class" step="0.01">
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Сумма - отчисления тренеру">∑Ƨ</label>
											<div style="display: flex;">
												<div class="input-group" style="margin-right: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ОТ</button>
													</span>
													<input type="number" id="search_coach_sum_with" name="search_coach_sum_with" class="form-control search-class" step="0.01">
												</div>
												<div class="input-group" style="margin-left: 5px;">
													<span class="input-group-prepend">
														<button type="button" class="btn btn-secondary">ДО</button>
													</span>
													<input type="number" id="search_coach_sum_to" name="search_coach_sum_to" class="form-control search-class" step="0.01">
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Пользователь-Тренер ID">U ID</label>
											<select name="search_coach_nikname" class="form-control select2 search-class">
												<option value="all">Все</option>
												<?php
												$select_coachs = mysqli_query($link, "SELECT * FROM in_clients WHERE id IN (SELECT client_id FROM in_routes)");
												while($get_coachs = mysqli_fetch_array($select_coachs))
												{
													if($_GET['search_coach_nikname'] == $get_coachs['nikname']){
														?>
														<option value="<?php echo $get_coachs['nikname'] ?>" selected><?php echo $get_coachs['nikname']; ?></option>
														<?php
													}else{
														?>
														<option value="<?php echo $get_coachs['nikname'] ?>"><?php echo $get_coachs['nikname']; ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Дата крайнего прохождения">LastɌ</label>
											<div class="input-group">                                            
												<input type="text" class="form-control search-class" name="search_last_date_end">
												<div class="input-group-append">
													<span class="input-group-text"><i class="dripicons-calendar"></i></span>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-2">
										<div class="form-group">
											<label data-toggle="tooltip" data-placement="top" title="Дата установки">1Ƨ</label>
											<div class="input-group">                                            
												<input type="text" class="form-control search-class" name="search_create_date_route">
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
											<button type="button" class="btn btn-success waves-effect waves-light exportexcel" data-toggle="tooltip" data-placement="top" title="Выгрузить в Excel" style="margin-top: 8px;"><i class="far fa-file-excel"></i></button>
											<button type="button" class="btn btn-dark saveTemplate" data-toggle="tooltip" data-placement="top" title="Сохранить шаблон фильтров" style="margin-top: 8px;"><i class="far fa-save"></i></button>
										</div>
									</div>

								</div>
							</form>

							<script>
								$( ".exportexcel" ).click(function() {

									var $form = $("#searchForm");

									var url = "scripts/export_routes.php?" + $form.serialize();
									window.open(url, '_blank');
								});
							</script>

						</div><!--end card-body-->
					</div>
					<div class="zoomed" style="width: 200px;position: absolute;right: 8px;top: 0px;z-index: 99;padding: 10px;background: white;border: 1px solid red;display:none;">
						<img src='' style='width:100%;' />
					</div>

					<table id="routeTable" class="table table-striped table-bordered dt-responsive" style="width:100%">
						<thead>
							<tr>
								<th data-name="name" data-toggle="tooltip" data-placement="top" title="Маршрут ID">Ɍ ID</th>
								<th data-name="country">Страна</th>
								<th data-name="region">Регион</th>
								<th data-name="profit_sum" data-toggle="tooltip" data-placement="top" title="Сумма - прибыль">∑Ɍ</th>
								<th data-name="count_athletes_end" data-toggle="tooltip" data-placement="top" title="Кол-во спортсменов, прошедших маршрут">U</th>
								<th data-name="rate" data-toggle="tooltip" data-placement="top" title="Рейтинг">R</th>
								<th data-name="cost" data-toggle="tooltip" data-placement="top" title="Цена">€</th>
								<th data-name="type" data-toggle="tooltip" data-placement="top" title="Тип + Тема">Ty</th>
								<th data-name="count_cp" data-toggle="tooltip" data-placement="top" title="Кол-во КП">CP</th>
								<th data-name="method" data-toggle="tooltip" data-placement="top" title="Метод">Mt</th>
								<th data-name="terra" data-toggle="tooltip" data-placement="top" title="Местность">Tr</th>
								<th data-name="route_sum" data-toggle="tooltip" data-placement="top" title="Сумма - за маршрут">∑M</th>
								<th data-name="route_tips" data-toggle="tooltip" data-placement="top" title="Сумма - чаевые">∑T</th>
								<th data-name="procent_tips" data-toggle="tooltip" data-placement="top" title="Процент чаевых от суммы за платные маршруты">%T</th>
								<th data-name="route_hints" data-toggle="tooltip" data-placement="top" title="Сумма - подсказка">∑H</th>
								<th data-name="route_all_sum" data-toggle="tooltip" data-placement="top" title="Сумма - за маршрут + чаевые + подсказка">∑S</th>
								<th data-name="coach_sum" data-toggle="tooltip" data-placement="top" title="Сумма - отчисления тренеру">∑Ƨ</th>
								<th data-name="coach_nikname" data-toggle="tooltip" data-placement="top" title="Пользователь-Тренер ID">U ID</th>
								<th data-name="last_date_end" data-toggle="tooltip" data-placement="top" title="Дата крайнего прохождения">LastɌ</th>
								<th data-name="create_date_route" data-toggle="tooltip" data-placement="top" title="Дата установки">1Ƨ</th>
								<th data-priority="1">Действия</th>
							</tr>
						</thead>
					</table>
					</div>

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
					</div>

					<div class="modal fade" id="exampleModalComments" tabindex="-1" role="dialog" aria-labelledby="exampleModalComments1" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header bg-warning">
									<h6 class="modal-title m-0 text-white" id="exampleModalComments1">Комментарии к маршруту</h6>
									<button type="button" class="close " data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true"><i class="la la-times text-white"></i></span>
									</button>
								</div><!--end modal-header-->
								<div class="loadedContentComments">
								</div>
							</div><!--end modal-content-->
						</div><!--end modal-dialog-->
					</div>

					<div class="modal fade" id="exampleModalMap" tabindex="-1" role="dialog" aria-labelledby="exampleModalMap" aria-hidden="true">
						<div class="modal-dialog" role="document" style="max-width: 80%;">
							<div class="modal-content">
								<div class="modal-header bg-info">
									<h6 class="modal-title m-0 text-white" id="exampleModalMap">Маршрут</h6>
									<button type="button" class="close " data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true"><i class="la la-times text-white"></i></span>
									</button>
								</div>
								<div class="modal-body loadMap">

								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary btn-sm" data-dismiss="modal">Закрыть</button>
								</div>
							</div><!--end modal-content-->
						</div><!--end modal-dialog-->
					</div>

					<div class="modal fade" id="exampleModalCP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCPtext" aria-hidden="true">
						<div class="modal-dialog" role="document" style="max-width: 80%;">
							<div class="modal-content">
								<div class="modal-header bg-info">
									<h6 class="modal-title m-0 text-white" id="exampleModalCPtext">Контрольные точки</h6>
									<button type="button" class="close " data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true"><i class="la la-times text-white"></i></span>
									</button>
								</div>
								<div class="modal-body loadCP">

								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary btn-sm" data-dismiss="modal">Закрыть</button>
								</div>
							</div>
						</div>
					</div>

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
	        
	        <script src="template/default/assets/js/app.js"></script>

	        <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	        <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
	        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
	        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAApIdDi7CvnuqeGZIjf7oyBRY8T3SpePI&callback=initMap" async></script>
			<script>
				$('.select2').select2({
					placeholder: 'Выберите',
					tags: true
				});
				$("#cp_id").on("select2:select", function (evt) {
					var element = evt.params.data.element;
					var $element = $(element);

					$element.detach();
					$(this).append($element);
					$(this).trigger("change");
				});
				$("#cp_id_edit").on("select2:select", function (evt) {
					var element = evt.params.data.element;
					var $element = $(element);

					$element.detach();
					$(this).append($element);
					$(this).trigger("change");
				});

				$('input[name="search_last_pay_date"]').daterangepicker({
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

				$('input[name="search_last_pay_date"]').on('cancel.daterangepicker', function(ev, picker) {
					$('input[name="search_last_pay_date"]').val('');
				});

				$('input[name="search_first_date_route"]').on('cancel.daterangepicker', function(ev, picker) {
					$('input[name="search_first_date_route"]').val('');
				});

				$('input[name="search_date"]').on('cancel.daterangepicker', function(ev, picker) {
					$('input[name="search_date"]').val('');
				});

				$('input[name="search_last_pay_date"]').val('');
				$('input[name="search_first_date_route"]').val('');
				$('input[name="search_date"]').val('');
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
					$('#routeTable').DataTable({
						"responsive": true,
						"processing": true,
						"serverSide": true,
						"serverMethod": 'post',
						"ajax": {
							"url": "/admin/scripts/route_datatable2.php",
							"type": "POST",
							"dataSrc":"data"
						},
						"drawCallback": function( settings ) {
							feather.replace();
							$(".showRouteTable").click(function(){
								var id = $(this).attr("data-id");

								$.post( "scripts/show_route.php", { id: id })
								.done(function( data ) {
									$(".loadMap").html(data);
									$("#exampleModalMap").modal("show");
								});
							});
							$(".showCPTable").click(function(){
								var id = $(this).attr("data-id");
								$.post( "scripts/show_cp.php", { id: id })
								.done(function( data ) {
									$(".loadCP").html(data);
									$("#exampleModalCP").modal("show");
								});
							});
							$( ".deleteuser" ).click(function() {
								var id = $(this).attr("data-id");
								$.post( "scripts/confirmation.php", { type: "route", id: id }).done(function( data ) {
									$( ".loadedContent" ).html(data);
								});
							});
							$( ".showcomments" ).click(function() {
								var id = $(this).attr("data-id");
								$.post( "scripts/get_comments.php", { id: id }).done(function( data ) {
									$( ".loadedContentComments" ).html(data);
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
						},
						"pagingType": "full_numbers",
						"paging": true,
						"lengthMenu": [10, 25, 50, 75, 100]
					});

					$("#searchForm").on("submit", function(event){
						event.preventDefault();

						var $form = $("#searchForm"), url = $form.attr('action');
						console.log(url + "?" + $form.serialize());

						$('#routeTable').DataTable().ajax.url(url + "?" + $form.serialize()).load();
					});

					$(".changeTemplateBtn").click(function(){
						$.post( "scripts/load_filters_template.php", { type: "route" })
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

								if(arr_value[0] == 'search_country' || arr_value[0] == 'search_type' || arr_value[0] == 'search_method' || arr_value[0] == 'search_terra' || arr_value[0] == 'search_coach_nikname'){
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
								if(name == 'search_country' || name == 'search_type' || name == 'search_method' || name == 'search_terra' || name == 'search_coach_nikname'){
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
								$.post( "scripts/add_filters_template.php", { type: "route", name: name_template, filters: filters })
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
				});
			</script>
		</body>
	</html>																															