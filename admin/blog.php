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
                                        <h4 class="page-title">Blog</h4>
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
							$update = mysqli_query($link, "DELETE FROM in_blog WHERE id = '$delete'");
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

					<?php
						if(isset($_GET['addNewBlog']))
						{
							$error = 0;
							$name_en = $_POST['name_en'];
							$text_en = $_POST['text_en'];
							$name_ru = $_POST['name_ru'];
							$text_ru = $_POST['text_ru'];
							$short_text_en = $_POST['short_text_en'];
							$short_text_ru = $_POST['short_text_ru'];
							$image = $_FILES['image']['tmp_name'];

							if(empty($name_en) OR empty($text_en)){
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
								$name_en = mysqli_real_escape_string($link, $name_en);
								$text_en = mysqli_real_escape_string($link, $text_en);
								$name_ru = mysqli_real_escape_string($link, $name_ru);
								$text_ru = mysqli_real_escape_string($link, $text_ru);
								$short_text_en = mysqli_real_escape_string($link, $short_text_en);
								$short_text_ru = mysqli_real_escape_string($link, $short_text_ru);

								$insert = mysqli_query($link, "INSERT INTO in_blog (name_en,text_en,name_ru,text_ru,short_text_en,short_text_ru,create_date) VALUES ('$name_en','$text_en','$name_ru','$text_ru','$short_text_en','$short_text_ru',NOW())");

								$last_id = mysqli_insert_id($link);

								$tmpFilePath1 = $_FILES['image']['tmp_name'];
								if ($tmpFilePath1 != "")
								{
									$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
									$addon = rand(1, 10000)."_".rand(1, 10000);
									$imgname = $addon."_".time().".".$ext;
									$newFilePath = "uploads/blog/" . $imgname;
									if(move_uploaded_file($tmpFilePath1, $newFilePath)) {
										$insertGallery = mysqli_query($link, "UPDATE in_blog SET image = '$imgname' WHERE id = '$last_id'");
									}
								}

								?>
								<script>
									location.href = "blog.php";
									// Command: toastr["success"]("Данные добавлены")

									// toastr.options = {
									// 	"closeButton": false,
									// 	"debug": false,
									// 	"newestOnTop": false,
									// 	"progressBar": false,
									// 	"positionClass": "toast-top-right",
									// 	"preventDuplicates": false,
									// 	"onclick": null,
									// 	"showDuration": "300",
									// 	"hideDuration": "1000",
									// 	"timeOut": "1000",
									// 	"extendedTimeOut": "1000",
									// 	"showEasing": "swing",
									// 	"hideEasing": "linear",
									// 	"showMethod": "fadeIn",
									// 	"hideMethod": "fadeOut"
									// }
								</script>
								<?php
							}

						}
					?>

					<?php
						if(isset($_GET['saveEditBlog']))
						{
							$error = 0;
							$name_en = $_POST['name_en'];
							$text_en = $_POST['text_en'];
							$name_ru = $_POST['name_ru'];
							$text_ru = $_POST['text_ru'];
							$short_text_en = $_POST['short_text_en'];
							$short_text_ru = $_POST['short_text_ru'];
							$image = $_FILES['image']['tmp_name'];

							if(empty($name_en) OR empty($text_en)){
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
								$id = mysqli_real_escape_string($link, $_POST['id']);
								$name_en = mysqli_real_escape_string($link, $name_en);
								$text_en = mysqli_real_escape_string($link, $text_en);
								$name_ru = mysqli_real_escape_string($link, $name_ru);
								$text_ru = mysqli_real_escape_string($link, $text_ru);
								$short_text_en = mysqli_real_escape_string($link, $short_text_en);
								$short_text_ru = mysqli_real_escape_string($link, $short_text_ru);

								//$insert = mysqli_query($link, "INSERT INTO in_blog (name,`text`,create_date) VALUES ('$name','$text',NOW())");

								$update = mysqli_query($link, "UPDATE in_blog SET name_en = '$name_en', text_en = '$text_en', name_ru = '$name_ru', text_ru = '$text_ru', short_text_en = '$short_text_en', short_text_ru = '$short_text_ru' WHERE id = '$id'");

								$tmpFilePath1 = $_FILES['image']['tmp_name'];
								if ($tmpFilePath1 != "")
								{
									$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
									$addon = rand(1, 10000)."_".rand(1, 10000);
									$imgname = $addon."_".time().".".$ext;
									$newFilePath = "uploads/blog/" . $imgname;
									if(move_uploaded_file($tmpFilePath1, $newFilePath)) {
										$insertGallery = mysqli_query($link, "UPDATE in_blog SET image = '$imgname' WHERE id = '$id'");
									}
								}
								?>
								<script>
									location.href = "blog.php";
									// Command: toastr["success"]("Данные добавлены")

									// toastr.options = {
									// 	"closeButton": false,
									// 	"debug": false,
									// 	"newestOnTop": false,
									// 	"progressBar": false,
									// 	"positionClass": "toast-top-right",
									// 	"preventDuplicates": false,
									// 	"onclick": null,
									// 	"showDuration": "300",
									// 	"hideDuration": "1000",
									// 	"timeOut": "1000",
									// 	"extendedTimeOut": "1000",
									// 	"showEasing": "swing",
									// 	"hideEasing": "linear",
									// 	"showMethod": "fadeIn",
									// 	"hideMethod": "fadeOut"
									// }
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
	                                            <h4 class="card-title text-white">Добавить Blog</h4>  
											</div><!--end col-->                                                                             
										</div>  <!--end row-->                                  
									</div><!--end card-header-->
	                                <div class="card-body">    
										<form method="post" action="?addNewBlog=1&page=<?php echo $_GET['page'] ?>" enctype="multipart/form-data">

											<div class="tabs-container">
												<ul class="nav nav-tabs">
													<?php 
														$selectLang = mysqli_query($link, "SELECT * FROM in_languages WHERE status IS NULL ORDER by sort");	
														while ($getlang = mysqli_fetch_array($selectLang))
														{
															$i++;
															if ($i == 1)
															{
																$active = "active show";
															}
															else
															{
																$active = "";
															}
														?>
														<li><a class="nav-link <?php echo $active; ?>" data-toggle="tab" href="#tab-<?php echo $i; ?>"> <img style="width:16px;" src="<?php echo $getlang['icon'] ?>" /></a></li>
														<?php } $i++;?>
													<?php $i = 0; ?>
												</ul>
												<div class="tab-content">
													<?php 
													$selectLang = mysqli_query($link, "SELECT * FROM in_languages WHERE status IS NULL ORDER by sort");	
													while ($getlang = mysqli_fetch_array($selectLang))
													{
														$j++;
														if ($j == 1)
														{
															$active = "active show";
														}
														else
														{
															$active = "";
														}
														?>
														<div id="tab-<?php echo $j; ?>" class="tab-pane <?php echo $active; ?>">
															<div class="panel-body">

																<div class="form-group row">
																	<label for="example-email-input" class="col-sm-2 col-form-label text-right">Название *</label>
																	<div class="col-sm-10">
																		<input class="form-control" type="text" name="name_<?php echo $getlang['lang'] ?>" id="userAddWish" autocomplete="off">
																	</div>
																</div>

																<div class="form-group row">
																	<label for="example-email-input" class="col-sm-2 col-form-label text-right">Краткий текст *</label>
																	<div class="col-sm-10">
																		<textarea class="form-control" name="short_text_<?php echo $getlang['lang'] ?>" style="height: 200px;"></textarea>
																	</div>
																</div>

																<div class="form-group row">
																	<label for="example-email-input" class="col-sm-2 col-form-label text-right">Текст *</label>
																	<div class="col-sm-10">
																		<textarea class="form-control summernote" name="text_<?php echo $getlang['lang'] ?>" style="height: 200px;"></textarea>
																	</div>
																</div>

															</div>
														</div>
													<?php } $j++; ?>
													<?php $j = 0; ?>

													<div class="form-group row">
														<label for="example-email-input" class="col-sm-2 col-form-label text-right">Фото</label>
														<div class="col-sm-10">
															<input type="file" class="form-control" name="image" style="width:100%;">
														</div>
													</div>
													<button type="submit" class="btn btn-success">Создать</button>
													<a class="btn btn-error" href="<?php echo $uri_parts; ?>">Отмена</a>
													
												</div>
											</div>
										</form>
										
										
									</div>                              
								</div>
							</div>
							<?php
						}
					?>

					<?php
						if (isset($_GET['edit']))
						{
							$id = $_GET['edit'];
							$select = mysqli_query($link, "SELECT * FROM in_blog WHERE id = '$id'");
							$get = mysqli_fetch_array($select);
							?>
							<div class="col-lg-12">
	                            <div class="card">
	                                <div class="card-header bg-info">
	                                    <div class="row align-items-center">
	                                        <div class="col">                      
	                                            <h4 class="card-title text-white">Редактировать <?php echo $get['name_en']; ?></h4>  
											</div><!--end col-->                                                                             
										</div>  <!--end row-->                                  
									</div><!--end card-header-->
	                                <div class="card-body">    
										<form method="post" action="?saveEditBlog=1&page=<?php echo $_GET['page'] ?>" enctype="multipart/form-data">
											<input class="form-control" type="hidden" name="id" value="<?php echo $get['id'] ?>">

											<div class="tabs-container">
												<ul class="nav nav-tabs">
													<?php 
														$selectLang = mysqli_query($link, "SELECT * FROM in_languages WHERE status IS NULL ORDER by sort");	
														while ($getlang = mysqli_fetch_array($selectLang))
														{
															$i++;
															if ($i == 1)
															{
																$active = "active show";
															}
															else
															{
																$active = "";
															}
														?>
														<li><a class="nav-link <?php echo $active; ?>" data-toggle="tab" href="#tab-<?php echo $i; ?>"> <img style="width:16px;" src="<?php echo $getlang['icon'] ?>" /></a></li>
														<?php } $i++;?>
													<?php $i = 0; ?>
												</ul>
												<div class="tab-content">
													<?php 
													$selectLang = mysqli_query($link, "SELECT * FROM in_languages WHERE status IS NULL ORDER by sort");	
													while ($getlang = mysqli_fetch_array($selectLang))
													{
														$j++;
														if ($j == 1)
														{
															$active = "active show";
														}
														else
														{
															$active = "";
														}
														?>
														<div id="tab-<?php echo $j; ?>" class="tab-pane <?php echo $active; ?>">
															<div class="panel-body">

																<div class="form-group row">
																	<label for="example-email-input" class="col-sm-2 col-form-label text-right">Название *</label>
																	<div class="col-sm-10">
																		<input class="form-control" type="text" name="name_<?php echo $getlang['lang'] ?>" id="userAddWish" autocomplete="off" value="<?php echo $get['name_'.$getlang['lang'].'']; ?>">
																	</div>
																</div>

																<div class="form-group row">
																	<label for="example-email-input" class="col-sm-2 col-form-label text-right">Краткий текст *</label>
																	<div class="col-sm-10">
																		<textarea class="form-control" name="short_text_<?php echo $getlang['lang'] ?>" style="height: 200px;"></textarea>
																	</div>
																</div>

																<div class="form-group row">
																	<label for="example-email-input" class="col-sm-2 col-form-label text-right">Текст *</label>
																	<div class="col-sm-10">
																		<textarea class="form-control summernote" name="text_<?php echo $getlang['lang'] ?>" style="height: 200px;"><?php echo $get['text_'.$getlang['lang'].'']; ?></textarea>
																	</div>
																</div>

															</div>
														</div>
													<?php } $j++; ?>
													<?php $j = 0; ?>

													<div class="form-group row">
														<label for="example-email-input" class="col-sm-2 col-form-label text-right">Фото</label>
														<div class="col-sm-10">
															<input type="file" class="form-control" name="image" style="width:100%;">
															<?php if(!empty($get['image'])){ ?>
																<br/>
																<div class="col-lg-3">                            
																	<div class="card">
																		<div class="card-body"> 
																			<div class="media">
																				<img style="width:100%;" src="/admin/uploads/blog/<?php echo $get['image'] ?>" />
																			</div>
																		</div>
																	</div>
																</div>
															<?php } ?>
														</div>
													</div>
												</div>
											</div>
											
											
											<button type="submit" class="btn btn-success">Сохранить</button>
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
												<input type="text" class="form-control" name="search_nickname">
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
						
						
						<div class="table-responsive">
							<table class="table table-bordered mb-0 table-centered">
								<thead>
									<tr>
										<th>id</th>
										<th>Название (EN)</th>
										<th>Название (RU)</th>
										<!-- <th>Текст</th> -->
										<th>Фото</th>
										<th>Дата добавления</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										
										if ($_POST['search_nickname'] != '')
										{
											$searchString .=" AND name LIKE '%$_POST[search_nickname]%'";
										}
										
										$num = 20;
										$page = $_GET['page'];  
										$result = "SELECT * FROM in_blog WHERE id != '' $searchString ORDER by id DESC";
										$result = mysqli_query($link, $result);
										$posts = mysqli_num_rows($result);  
										$total = intval(($posts - 1) / $num) + 1;  
										$page = intval($page);  
										if(empty($page) or $page < 0) $page = 1;  
										if($page > $total) $page = $total;  
										$start = $page * $num - $num;  
										$result = "SELECT * FROM in_blog WHERE id != '' $searchString ORDER by id DESC LIMIT $start, $num";  
										$result = mysqli_query($link, $result);
										while($getBlogTable = mysqli_fetch_array($result))										
										{
										?>
										<tr>
											<td><?php echo $getBlogTable['id'] ?></td>
											<td><?php echo $getBlogTable['name_en'] ?></td>
											<td><?php echo $getBlogTable['name_ru'] ?></td>
											<!-- <td><?php echo $getBlogTable['text']; ?></td> -->
											<td>
												<div id="lightgallery">
													<a href="uploads/blog/<?php echo $getBlogTable['image']; ?>">
														<img src="uploads/blog/<?php echo $getBlogTable['image']; ?>" style="height: 100px;">
													</a>
												</div>
											</td>
											<td><?php echo $getBlogTable['create_date'] ?></td>
											
											<td class="text-right">
												<div class="dropdown d-inline-block">
													<a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
														<i class="las la-ellipsis-v font-20 text-muted"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
														<a class="dropdown-item addFavorites<?php echo $getBlogTable['id'] ?>" href="?edit=<?php echo $getBlogTable['id']; ?>">Редактировать</a>
														<a class="dropdown-item addFavorites<?php echo $getBlogTable['id'] ?>">Добавить в избранное</a>
														<script>
															$( ".addFavorites<?php echo $getBlogTable['id'] ?>" ).click(function() {
																$.post( "scripts/addFavorites.php", { id: "<?php echo $getBlogTable['id'] ?>" }).done(function( data ) {
																	if(data == "1"){
																		Command: toastr["success"]("Добавлено в избранное")

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
				
				<div class="modal fade" id="exampleModalWarning<?php echo $getWishTable['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalWarning1" aria-hidden="true">
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js" integrity="sha512-P2Z/b+j031xZuS/nr8Re8dMwx6pNIexgJ7YqcFWKIqCdbjynk4kuX/GrqpQWEcI94PRCyfbUQrjRcWMi7btb0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- App js -->
        <script src="template/default/assets/js/app.js"></script>
        <script src="template/plugins/dropzone/dropzone.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lightgallery.js@1.4.0/dist/js/lightgallery.min.js"></script>
        <script src='https://cdn.tiny.cloud/1/i51v16d0m8gfpjz4xefbhk7bylffkpm3wsc83c3b877qcfb5/tinymce/4/tinymce.min.js'></script>


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
				$('#userAddWish').typeahead({
					source: function (query, result) {
						$.ajax({
							url: "scripts/searchUser.php",
							data: 'query=' + query,
							dataType: "json",
							type: "POST",
							success: function (data) {
								result($.map(data, function (item) {
									return item;
								}));
							}
						});
					}
				});
			});
			Dropzone.options.dropzoneForm2 = {
				paramName: "file",
				maxFilesize: 2,
				dictDefaultMessage: "<strong>Перенесите файлы или кликните для выбора. </strong></br> (В это поле можно выбирать много файлов)",
				success : function(file, response) {
					if (response['target_file'] != '') {
						var currentValue = jQuery("#dropzoneForm2 input[name='attached_files'").val();
						if (currentValue == '') {
							jQuery(".filenames2").val(response['target_file']);
						} else {
							jQuery(".filenames2").val(jQuery(".filenames2").val()+","+ response['target_file']);
						}
					}
				}
			};
			lightGallery(document.getElementById('lightgallery'));

			tinymce.init({
				selector: '.summernote',
				plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help image code autoresize',
				toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment | image code',

				convert_urls: false,
				height : "480",
				images_upload_url: 'saveImageTiny.php',


				images_upload_handler: function (blobInfo, success, failure) {
					var xhr, formData;

					xhr = new XMLHttpRequest();
					xhr.withCredentials = false;
					xhr.open('POST', 'saveImageTiny.php');

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
					};

					formData = new FormData();
					formData.append('file', blobInfo.blob(), blobInfo.filename());

					xhr.send(formData);
				},
			});
		</script>
        
	</body>
	
</html>