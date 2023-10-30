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
                                        <h4 class="page-title">Страницы / Бизнес модель</h4>
									</div><!--end col-->
								</div><!--end row-->                                                              
							</div><!--end page-title-box-->
						</div><!--end col-->
					</div><!--end row-->
                    <!-- end page title end breadcrumb -->
					<?php 
						$selectValues = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_type = 'businessmodel'");
						while ($getValues = mysqli_fetch_array($selectValues))
						{
							
							/*----------------------------------------------------*/
							if ($getValues['setting_name'] == "block1_title")
							{
								$block1_title = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block1_subtitle")
							{
								$block1_subtitle = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block1_link")
							{
								$block1_link = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block1_image")
							{
								$block1_image = $getValues['setting_value'];
							}
							
							
							
							/*----------------------------------------------------*/
							
							/*Блок 2 тройоной*/
							if ($getValues['setting_name'] == "block2_title")
							{
								$block2_title = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block2_subtitle")
							{
								$block2_subtitle = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block2_note")
							{
								$block2_note = $getValues['setting_value'];
							}
							
							
							if ($getValues['setting_name'] == "block2_image1")
							{
								$block2_image1 = $getValues['setting_value'];
							}
							
							if ($getValues['setting_name'] == "block2_title1")
							{
								$block2_title1 = $getValues['setting_value'];
							}
							
							
							if ($getValues['setting_name'] == "block2_subtitle1")
							{
								$block2_subtitle1 = $getValues['setting_value'];
							}
							
							
							
							if ($getValues['setting_name'] == "block2_image2")
							{
								$block2_image2 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block2_title2")
							{
								$block2_title2 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block2_subtitle2")
							{
								$block2_subtitle2 = $getValues['setting_value'];
							}
							
							
							if ($getValues['setting_name'] == "block2_title3")
							{
								$block2_title3 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block2_subtitle3")
							{
								$block2_subtitle3 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block2_image3")
							{
								$block2_image3 = $getValues['setting_value'];
							}
							/*----------------------------------------------------*/
							
							
							
							
							
							
							
							/*----------------------------------------------------*/
							
							/*Блок 3*/
							if ($getValues['setting_name'] == "block3_title")
							{
								$block3_title = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block3_subtitle")
							{
								$block3_subtitle = $getValues['setting_value'];
							}
							
							
							
							if ($getValues['setting_name'] == "block3_title_1")
							{
								$block3_title_1 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block3_subtitle_1")
							{
								$block3_subtitle_1 = $getValues['setting_value'];
							}
							
							
							if ($getValues['setting_name'] == "block3_title_2")
							{
								$block3_title_2 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block3_subtitle_2")
							{
								$block3_subtitle_2 = $getValues['setting_value'];
							}
							
							if ($getValues['setting_name'] == "block3_title_3")
							{
								$block3_title_3 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block3_subtitle_3")
							{
								$block3_subtitle_3 = $getValues['setting_value'];
							}
							
							
							if ($getValues['setting_name'] == "block3_title_4")
							{
								$block3_title_4 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block3_subtitle_4")
							{
								$block3_subtitle_4 = $getValues['setting_value'];
							}
							
							if ($getValues['setting_name'] == "block3_title_5")
							{
								$block3_title_5 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block3_subtitle_5")
							{
								$block3_subtitle_5 = $getValues['setting_value'];
							}
							
							
							if ($getValues['setting_name'] == "block3_title_6")
							{
								$block3_title_6 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block3_subtitle_6")
							{
								$block3_subtitle_6 = $getValues['setting_value'];
							}
							/*----------------------------------------------------*/
							
							
							
							
							
							/*Блок 4*/
							if ($getValues['setting_name'] == "block4_title")
							{
								$block4_title = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block4_subtitle")
							{
								$block4_subtitle = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block4_image")
							{
								$block4_image = $getValues['setting_value'];
							}
							
							
							
							if ($getValues['setting_name'] == "block4_title_1")
							{
								$block4_title_1 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block4_subtitle_1")
							{
								$block4_subtitle_1 = $getValues['setting_value'];
							}
							
							if ($getValues['setting_name'] == "block4_title_2")
							{
								$block4_title_2 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block4_subtitle_2")
							{
								$block4_subtitle_2 = $getValues['setting_value'];
							}
							
							if ($getValues['setting_name'] == "block4_title_3")
							{
								$block4_title_3 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block4_subtitle_3")
							{
								$block4_subtitle_3 = $getValues['setting_value'];
							}
							/*----------------------------------------------------*/
							
							
							
							/*Блок 5*/
							if ($getValues['setting_name'] == "block5_title")
							{
								$block5_title = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block5_subtitle")
							{
								$block5_subtitle = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block5_content")
							{
								$block5_content = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block5_note")
							{
								$block5_note = $getValues['setting_value'];
							}
							/*----------------------------------------------------*/
							
							
							
							/*Блок 6*/
							if ($getValues['setting_name'] == "block6_title")
							{
								$block6_title = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block6_subtitle")
							{
								$block6_subtitle = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block6_title_1")
							{
								$block6_title_1 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block6_subtitle_1")
							{
								$block6_subtitle_1 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block6_link_1")
							{
								$block6_link_1 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block6_title_2")
							{
								$block6_title_2 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block6_subtitle_2")
							{
								$block6_subtitle_2 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block6_link_2")
							{
								$block6_link_2 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block6_title_3")
							{
								$block6_title_3 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block6_subtitle_3")
							{
								$block6_subtitle_3 = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block6_link_3")
							{
								$block6_link_3 = $getValues['setting_value'];
							}
							/*----------------------------------------------------*/
							
							
							/*Блок 7*/
							if ($getValues['setting_name'] == "block7_title")
							{
								$block7_title = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block7_subtitle")
							{
								$block7_subtitle = $getValues['setting_value'];
							}
							if ($getValues['setting_name'] == "block7_content")
							{
								$block7_content = $getValues['setting_value'];
							}

							/*----------------------------------------------------*/
							
							
							
						}
					?>
					<div class="row">
                        <div class="col-sm-12">
							<h4>Первый блок</h4>
							<div class="card">
								
								<div class="card-body">
									<p class="card-text">
										
										
										
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Картинка</label>
											
											<div class="col-sm-10">
												<div class="imageBlock1">
													<img class="img-fluid bg-light-alt selectImage1" src="/admin/uploads/pages/<?php echo $block1_image; ?>" alt="Card image">
												</div>
												<script>
													$( ".selectImage1" ).click(function() {
														$( ".newselectedimage1" ).click();
													});
												</script>
												<form id="submitForm1" style="display:none;">
													<input type="file" class="form-control newselectedimage1" id="image" name="block1_image">
													<input type="hidden" class="form-control" name="type" value="businessmodel">
												</form>
												<script type="text/javascript">
													$(document).ready(function (e) {
														$("#submitForm1").on('submit',(function(e) {
															e.preventDefault();
															$.ajax({
																url: "/admin/scripts/uploadImage2.php",
																type: "POST",
																data:  new FormData(this),
																contentType: false,
																cache: false,
																processData:false,
																success: function(data)
																{
																	$(".imageBlock1").html(data);
																},
																error: function() 
																{
																	alert("1");
																} 	        
															});
														}));
													});
													$( ".newselectedimage1" ).change(function() {
														$( "#submitForm1" ).submit();
													});
												</script>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Заголовок</label>
											<div class="col-sm-10">
												<input class="form-control block1_title" value="<?php echo $block1_title; ?>" type="text" id="example-text-input">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Подзаголовок</label>
											<div class="col-sm-10">
												<input class="form-control block1_subtitle" value="<?php echo $block1_subtitle; ?>" type="text" id="example-text-input">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Ссылка</label>
											<div class="col-sm-10">
												<input class="form-control block1_link" value="<?php echo $block1_link; ?>" type="text" id="example-text-input">
											</div>
										</div>
									</p>
								</div><!--end card-body-->
							</div>
						</div>
						
						
						
						
						
						
						
						<div class="col-sm-12">
							<h4>Второй блок</h4>
							<div class="card">
								<div class="card-body">
									<p class="card-text">
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Заголовок</label>
											<div class="col-sm-10">
												<input class="form-control block2_title" type="text" value="<?php echo $block2_title ?>" id="example-text-input">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Подзаголовок</label>
											<div class="col-sm-10">
												<input class="form-control block2_subtitle" type="text" value="<?php echo $block2_subtitle ?>" id="example-text-input">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="card">
													<div class="imageBlock2" style="margin: 0 auto;padding-top: 10px;">
														<img class="img-fluid bg-light-alt selectImage2" src="/admin/uploads/pages/<?php echo $block2_image1; ?>" alt="Card image">
													</div>
													<script>
														$( ".selectImage2" ).click(function() {
															$( ".newselectedimage2" ).click();
														});
													</script>
													<form id="submitForm2" style="display:none;">
														<input type="file" class="form-control newselectedimage2" id="image" name="block2_image1">
														<input type="hidden" class="form-control" name="type" value="businessmodel">
													</form>
													<script type="text/javascript">
														$(document).ready(function (e) {
															$("#submitForm2").on('submit',(function(e) {
																e.preventDefault();
																$.ajax({
																	url: "/admin/scripts/uploadImage2.php",
																	type: "POST",
																	data:  new FormData(this),
																	contentType: false,
																	cache: false,
																	processData:false,
																	success: function(data)
																	{
																		$(".imageBlock2").html(data);
																	},
																	error: function() 
																	{
																		alert("1");
																	} 	        
																});
															}));
														});
														$( ".newselectedimage2" ).change(function() {
															$( "#submitForm2" ).submit();
														});
													</script>
													<div class="card-body">
														<p class="card-text">
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block2_title1" type="text" id="example-text-input" value="<?php echo $block2_title1 ?>" placeholder="Заголовок">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block2_subtitle1" type="text" id="example-text-input" value="<?php echo $block2_subtitle1 ?>" placeholder="Подзаголовок">
																</div>
															</div>
														</p>
													</div><!--end card-body-->
												</div>
											</div>
											<div class="col-sm-4">
												<div class="card">
													<div class="imageBlock3" style="margin: 0 auto;padding-top: 10px;">
														<img class="img-fluid bg-light-alt selectImage3" src="/admin/uploads/pages/<?php echo $block2_image2; ?>" alt="Card image">
													</div>
													<script>
														$( ".selectImage3" ).click(function() {
															$( ".newselectedimage3" ).click();
														});
													</script>
													<form id="submitForm3" style="display:none;">
														<input type="file" class="form-control newselectedimage3" id="image" name="block2_image2">
														<input type="hidden" class="form-control" name="type" value="businessmodel">
													</form>
													<script type="text/javascript">
														$(document).ready(function (e) {
															$("#submitForm3").on('submit',(function(e) {
																e.preventDefault();
																$.ajax({
																	url: "/admin/scripts/uploadImage2.php",
																	type: "POST",
																	data:  new FormData(this),
																	contentType: false,
																	cache: false,
																	processData:false,
																	success: function(data)
																	{
																		$(".imageBlock3").html(data);
																	},
																	error: function() 
																	{
																		alert("1");
																	} 	        
																});
															}));
														});
														$( ".newselectedimage3" ).change(function() {
															$( "#submitForm3" ).submit();
														});
													</script>
													<div class="card-body">
														<p class="card-text">
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block2_title2" type="text" id="example-text-input" value="<?php echo $block2_title2 ?>" placeholder="Заголовок">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block2_subtitle2" type="text" id="example-text-input" value="<?php echo $block2_subtitle2 ?>" placeholder="Подзаголовок">
																</div>
															</div>
														</p>
													</div><!--end card-body-->
												</div>
											</div>
											<div class="col-sm-4">
												<div class="card">
													<div class="imageBlock4" style="margin: 0 auto;padding-top: 10px;">
														<img class="img-fluid bg-light-alt selectImage4" src="/admin/uploads/pages/<?php echo $block2_image3; ?>" alt="Card image">
													</div>
													<script>
														$( ".selectImage4" ).click(function() {
															$( ".newselectedimage4" ).click();
														});
													</script>
													<form id="submitForm4" style="display:none;">
														<input type="file" class="form-control newselectedimage4" id="image" name="block2_image3">
														<input type="hidden" class="form-control" name="type" value="businessmodel">
													</form>
													<script type="text/javascript">
														$(document).ready(function (e) {
															$("#submitForm4").on('submit',(function(e) {
																e.preventDefault();
																$.ajax({
																	url: "/admin/scripts/uploadImage2.php",
																	type: "POST",
																	data:  new FormData(this),
																	contentType: false,
																	cache: false,
																	processData:false,
																	success: function(data)
																	{
																		$(".imageBlock4").html(data);
																	},
																	error: function() 
																	{
																		alert("1");
																	} 	        
																});
															}));
														});
														$( ".newselectedimage4" ).change(function() {
															$( "#submitForm4" ).submit();
														});
													</script>
													<div class="card-body">
														<p class="card-text">
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block2_title3" type="text" id="example-text-input" value="<?php echo $block2_title3 ?>" placeholder="Заголовок">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block2_subtitle3" type="text" id="example-text-input" value="<?php echo $block2_subtitle3 ?>" placeholder="Подзаголовок">
																</div>
															</div>
														</p>
													</div><!--end card-body-->
												</div>
											</div>
										</div>
									</p>
								</div><!--end card-body-->
							</div>
						</div>
						
						
						
						
						
						
						
						
						
						<div class="col-sm-12">
							<h4>Третий блок</h4>
							<div class="card">
								<div class="card-body">
									<p class="card-text">
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Заголовок</label>
											<div class="col-sm-10">
												<input class="form-control block3_title" type="text" value="<?php echo $block3_title ?>" id="example-text-input">
											</div>
										</div>
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Подзаголовок</label>
											<div class="col-sm-10">
												<input class="form-control block3_subtitle" type="text" value="<?php echo $block3_subtitle ?>" id="example-text-input">
											</div>
										</div>
										<div class="row">
											
											
											<?php 
												for ($i = 1; $i <= 6; $i++)
												{
													
												?>
												<div class="col-sm-4">
													<div class="card">
														
														
														
														
														<div class="card-body">
															<p class="card-text">
																<?php 
																	if ($i == 1)
																	{
																		$blockTitle = $block3_title_1;
																		$blocksubTitle = $block3_subtitle_1;
																	}
																	if ($i == 2)
																	{
																		$blockTitle = $block3_title_2;
																		$blocksubTitle = $block3_subtitle_2;
																	}
																	if ($i == 3)
																	{
																		$blockTitle = $block3_title_3;
																		$blocksubTitle = $block3_subtitle_3;
																	}
																	if ($i == 4)
																	{
																		$blockTitle = $block3_title_4;
																		$blocksubTitle = $block3_subtitle_4;
																	}
																	if ($i == 5)
																	{
																		$blockTitle = $block3_title_5;
																		$blocksubTitle = $block3_subtitle_5;
																	}
																	if ($i == 6)
																	{
																		$blockTitle = $block3_title_6;
																		$blocksubTitle = $block3_subtitle_6;
																	}
																	
																	
																	
																?>
																<div class="form-group row">
																	<div class="col-sm-12">
																		<input class="form-control block3_title_<?php echo $i; ?>" type="text" id="example-text-input" value="<?php echo $blockTitle ?>" placeholder="Заголовок">
																	</div>
																</div>
																<div class="form-group row">
																	<div class="col-sm-12">
																		<input class="form-control block3_subtitle_<?php echo $i; ?>" type="text" id="example-text-input" value="<?php echo $blocksubTitle ?>" placeholder="Подзаголовок">
																	</div>
																</div>
															</p>
														</div><!--end card-body-->
													</div>
												</div>
											<?php } ?>
											
											
											
											
										</div>
									</p>
								</div><!--end card-body-->
							</div>
						</div>
						
						
						
						
						<div class="col-sm-12">
							<h4>Четвертый блок</h4>
							<div class="card">
								<div class="card-body">
									<p class="card-text">
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Заголовок</label>
											<div class="col-sm-10">
												<input class="form-control block4_title" type="text" value="<?php echo $block4_title ?>" id="example-text-input">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Подзаголовок</label>
											<div class="col-sm-10">
												<input class="form-control block4_subtitle" type="text" value="<?php echo $block4_subtitle ?>" id="example-text-input">
											</div>
										</div>
										
										<div class="row">
											
											
											<div class="col-sm-6">
												<div class="card">
													<div class="card-body">
														
														<div class="imageBlock5" style="margin: 0 auto;padding-top: 10px;">
															<img class="img-fluid bg-light-alt selectImage5" src="/admin/uploads/pages/<?php echo $block4_image; ?>" alt="Card image">
														</div>
														<script>
															$( ".selectImage5" ).click(function() {
																$( ".newselectedimage5" ).click();
															});
														</script>
														<form id="submitForm5" style="display:none;">
															<input type="file" class="form-control newselectedimage5" id="image" name="block4_image">
															<input type="hidden" class="form-control" name="type" value="businessmodel">
														</form>
														<script type="text/javascript">
															$(document).ready(function (e) {
																$("#submitForm5").on('submit',(function(e) {
																	e.preventDefault();
																	$.ajax({
																		url: "/admin/scripts/uploadImage2.php",
																		type: "POST",
																		data:  new FormData(this),
																		contentType: false,
																		cache: false,
																		processData:false,
																		success: function(data)
																		{
																			$(".imageBlock5").html(data);
																		},
																		error: function() 
																		{
																			alert("1");
																		} 	        
																	});
																}));
															});
															$( ".newselectedimage5" ).change(function() {
																$( "#submitForm5" ).submit();
															});
														</script>
														
														
														
														
														
														
														
														
														
														
														
													</div><!--end card-body-->
												</div>
											</div>
											<div class="col-sm-6">
												<div class="card">
													<div class="card-body">
														
														
														<div class="form-group row">
															<label for="example-text-input" class="col-sm-2 col-form-label text-right">Заголовок 1</label>
															<div class="col-sm-10">
																<input class="form-control block4_title_1" type="text" value="<?php echo $block4_title_1 ?>" id="example-text-input">
															</div>
														</div>
														
														<div class="form-group row">
															<label for="example-text-input" class="col-sm-2 col-form-label text-right">Подзаголовок 1</label>
															<div class="col-sm-10">
																<input class="form-control block4_subtitle_1" type="text" value="<?php echo $block4_subtitle_1 ?>" id="example-text-input">
															</div>
														</div>
														
														<hr/>
														
														<div class="form-group row">
															<label for="example-text-input" class="col-sm-2 col-form-label text-right">Заголовок 2</label>
															<div class="col-sm-10">
																<input class="form-control block4_title_2" type="text" value="<?php echo $block4_title_2 ?>" id="example-text-input">
															</div>
														</div>
														
														<div class="form-group row">
															<label for="example-text-input" class="col-sm-2 col-form-label text-right">Подзаголовок 2</label>
															<div class="col-sm-10">
																<input class="form-control block4_subtitle_2" type="text" value="<?php echo $block4_subtitle_2 ?>" id="example-text-input">
															</div>
														</div>
														
														<hr/>
														
														<div class="form-group row">
															<label for="example-text-input" class="col-sm-2 col-form-label text-right">Заголовок 3</label>
															<div class="col-sm-10">
																<input class="form-control block4_title_3" type="text" value="<?php echo $block4_title_3 ?>" id="example-text-input">
															</div>
														</div>
														
														<div class="form-group row">
															<label for="example-text-input" class="col-sm-2 col-form-label text-right">Подзаголовок 3</label>
															<div class="col-sm-10">
																<input class="form-control block4_subtitle_3" type="text" value="<?php echo $block4_subtitle_3 ?>" id="example-text-input">
															</div>
														</div>
														
														
													</div><!--end card-body-->
												</div>
											</div>
											
											
											
											
											
											
											
											
										</div>
										
									</p>
								</div><!--end card-body-->
							</div>
						</div>
						
						<div class="col-sm-12">
							<h4>Пятый блок</h4>
							<div class="card">
								<div class="card-body">
									<p class="card-text">
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Заголовок</label>
											<div class="col-sm-10">
												<input class="form-control block5_title" type="text" value="<?php echo $block5_title ?>" id="example-text-input">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Подзаголовок</label>
											<div class="col-sm-10">
												<input class="form-control block5_subtitle" type="text" value="<?php echo $block5_subtitle ?>" id="example-text-input">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Контент</label>
											<div class="col-sm-10">
												<input class="form-control block5_content" type="text" value="<?php echo $block5_content ?>" id="example-text-input">
											</div>
											
										</div>
										
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Примечание</label>
											<div class="col-sm-10">
												<input class="form-control block5_note" type="text" value="<?php echo $block5_note ?>" id="example-text-input">
											</div>
										</div>
										
									</p>
								</div><!--end card-body-->
							</div>
						</div>
						
						
						<div class="col-sm-12">
							<h4>Шестой блок</h4>
							<div class="card">
								<div class="card-body">
									<p class="card-text">
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Заголовок</label>
											<div class="col-sm-10">
												<input class="form-control block6_title" type="text" value="<?php echo $block6_title ?>" id="example-text-input">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Подзаголовок</label>
											<div class="col-sm-10">
												<input class="form-control block6_subtitle" type="text" value="<?php echo $block6_subtitle ?>" id="example-text-input">
											</div>
										</div>
										
										
										
										<div class="row">
											<div class="col-sm-4">
												<div class="card">
													<div class="card-body">
														<p class="card-text">
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block6_title_1" type="text" id="example-text-input" value="<?php echo $block6_title_1 ?>" placeholder="Заголовок">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block6_subtitle_1" type="text" id="example-text-input" value="<?php echo $block6_subtitle_1 ?>" placeholder="Подзаголовок">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block6_link_1" type="text" id="example-text-input" value="<?php echo $block6_link_1 ?>" placeholder="Ссылка">
																</div>
															</div>
														</p>
													</div><!--end card-body-->
												</div>
											</div>
											
											<div class="col-sm-4">
												<div class="card">
													<div class="card-body">
														<p class="card-text">
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block6_title_2" type="text" id="example-text-input" value="<?php echo $block6_title_2 ?>" placeholder="Заголовок">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block6_subtitle_2" type="text" id="example-text-input" value="<?php echo $block6_subtitle_2 ?>" placeholder="Подзаголовок">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block6_link_2" type="text" id="example-text-input" value="<?php echo $block6_link_2 ?>" placeholder="Ссылка">
																</div>
															</div>
														</p>
													</div><!--end card-body-->
												</div>
											</div>
											
											<div class="col-sm-4">
												<div class="card">
													<div class="card-body">
														<p class="card-text">
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block6_title_3" type="text" id="example-text-input" value="<?php echo $block6_title_3 ?>" placeholder="Заголовок">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block6_subtitle_3" type="text" id="example-text-input" value="<?php echo $block6_subtitle_3 ?>" placeholder="Подзаголовок">
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-12">
																	<input class="form-control block6_link_3" type="text" id="example-text-input" value="<?php echo $block6_link_3 ?>" placeholder="Ссылка">
																</div>
															</div>
														</p>
													</div><!--end card-body-->
												</div>
											</div>
											
											
										</div>
										
										
										
										
									</p>
								</div><!--end card-body-->
							</div>
						</div>
						
						
						
						<div class="col-sm-12">
							<h4>Седьмой блок</h4>
							<div class="card">
								<div class="card-body">
									<p class="card-text">
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Заголовок</label>
											<div class="col-sm-10">
												<input class="form-control block7_title" type="text" value="<?php echo $block7_title ?>" id="example-text-input">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Подзаголовок</label>
											<div class="col-sm-10">
												<input class="form-control block7_subtitle" type="text" value="<?php echo $block7_subtitle ?>" id="example-text-input">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="example-text-input" class="col-sm-2 col-form-label text-right">Контент</label>
											<div class="col-sm-10">
												<input class="form-control block7_content" type="text" value="<?php echo $block7_content ?>" id="example-text-input">
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
			var block1_title = $( ".block1_title" ).val();
			var block1_subtitle = $( ".block1_subtitle" ).val();
			var block1_link = $( ".block1_link" ).val();
			var block2_title = $( ".block2_title" ).val();
			var block2_title1 = $( ".block2_title1" ).val();
			var block2_subtitle1 = $( ".block2_subtitle1" ).val();
			var block2_title2 = $( ".block2_title2" ).val();
			var block2_subtitle2 = $( ".block2_subtitle2" ).val();
			var block2_title3 = $( ".block2_title3" ).val();
			var block2_subtitle3 = $( ".block2_subtitle3" ).val();
			var block2_subtitle = $( ".block2_subtitle" ).val();
			var block2_note = $( ".block2_note" ).val();
			var block3_title = $( ".block3_title" ).val();
			var block3_subtitle = $( ".block3_subtitle" ).val();
			var block3_title_1 = $( ".block3_title_1" ).val();
			var block3_subtitle_1 = $( ".block3_subtitle_1" ).val();
			var block3_title_2 = $( ".block3_title_2" ).val();
			var block3_subtitle_2 = $( ".block3_subtitle_2" ).val();
			var block3_title_3 = $( ".block3_title_3" ).val();
			var block3_subtitle_3 = $( ".block3_subtitle_3" ).val();
			var block3_title_4 = $( ".block3_title_4" ).val();
			var block3_subtitle_4 = $( ".block3_subtitle_4" ).val();
			var block3_title_5 = $( ".block3_title_5" ).val();
			var block3_subtitle_5 = $( ".block3_subtitle_5" ).val();
			var block3_title_6 = $( ".block3_title_6" ).val();
			var block3_subtitle_6 = $( ".block3_subtitle_6" ).val();
			var block4_title = $( ".block4_title" ).val();
			var block4_subtitle = $( ".block4_subtitle" ).val();
			var block4_title_1 = $( ".block4_title_1" ).val();
			var block4_subtitle_1 = $( ".block4_subtitle_1" ).val();
			var block4_title_2 = $( ".block4_title_2" ).val();
			var block4_subtitle_2 = $( ".block4_subtitle_2" ).val();
			var block4_title_3 = $( ".block4_title_3" ).val();
			var block4_subtitle_3 = $( ".block4_subtitle_3" ).val();
			var block5_title = $( ".block5_title" ).val();
			var block5_subtitle = $( ".block5_subtitle" ).val();
			var block5_content = $( ".block5_content" ).val();
			var block5_note = $( ".block5_note" ).val();
			var block6_title = $( ".block6_title" ).val();
			var block6_subtitle = $( ".block6_subtitle" ).val();
			var block6_title_1 = $( ".block6_title_1" ).val();
			var block6_subtitle_1 = $( ".block6_subtitle_1" ).val();
			var block6_link_1 = $( ".block6_link_1" ).val();
			var block6_title_2 = $( ".block6_title_2" ).val();
			var block6_subtitle_2 = $( ".block6_subtitle_2" ).val();
			var block6_link_2 = $( ".block6_link_2" ).val();
			var block6_title_3 = $( ".block6_title_3" ).val();
			var block6_subtitle_3 = $( ".block6_subtitle_3" ).val();
			var block6_link_3 = $( ".block6_link_3" ).val();
			var block7_title = $( ".block7_title" ).val();
			var block7_subtitle = $( ".block7_subtitle" ).val();
			var block7_content = $( ".block7_content" ).val();
			
			
			
			$.post( "scripts/savePage.php", { 
			type: "businessmodel", 
			block1_title:block1_title,
			block1_subtitle:block1_subtitle,
			block1_link:block1_link,
			block2_title:block2_title,
			block2_title1:block2_title1,
			block2_subtitle1:block2_subtitle1,
			block2_title2:block2_title2,
			block2_subtitle2:block2_subtitle2,
			block2_title3:block2_title3,
			block2_subtitle3:block2_subtitle3,
			block2_subtitle:block2_subtitle,
			block2_note:block2_note,
			block3_title:block3_title,
			block3_subtitle:block3_subtitle,
			block3_title_1:block3_title_1,
			block3_subtitle_1:block3_subtitle_1,
			block3_title_2:block3_title_2,
			block3_subtitle_2:block3_subtitle_2,
			block3_title_3:block3_title_3,
			block3_subtitle_3:block3_subtitle_3,
			block3_title_4:block3_title_4,
			block3_subtitle_4:block3_subtitle_4,
			block3_title_5:block3_title_5,
			block3_subtitle_5:block3_subtitle_5,
			block3_title_6:block3_title_6,
			block3_subtitle_6:block3_subtitle_6,
			block4_title:block4_title,
			block4_subtitle:block4_subtitle,
			block4_title_1:block4_title_1,
			block4_subtitle_1:block4_subtitle_1,
			block4_title_2:block4_title_2,
			block4_subtitle_2:block4_subtitle_2,
			block4_title_3:block4_title_3,
			block4_subtitle_3:block4_subtitle_3,
			block5_title:block5_title,
			block5_subtitle:block5_subtitle,
			block5_content:block5_content,
			block5_note:block5_note,
			block6_title:block6_title,
			block6_subtitle:block6_subtitle,
			block6_title_1:block6_title_1,
			block6_subtitle_1:block6_subtitle_1,
			block6_link_1:block6_link_1,
			block6_title_2:block6_title_2,
			block6_subtitle_2:block6_subtitle_2,
			block6_link_2:block6_link_2,
			block6_title_3:block6_title_3,
			block6_subtitle_3:block6_subtitle_3,
			block6_link_3:block6_link_3,
			block7_title:block7_title,
			block7_subtitle:block7_subtitle,
			block7_content:block7_content
			
			
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