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
                                        <h4 class="page-title">Сводная
                                        <!-- <a style="position: absolute;right: 0px;top: -8px;" href="?add=1&page=<?php echo $_GET['page'] ?>" class="btn btn-success waves-effect waves-light">
											<i class="fas fa-plus mr-2"></i>
											Добавить</a> -->
										<button class="btn btn-primary waves-effect waves-light changeTemplateBtn" style="float: right;margin-right: 20px;margin-top: -17px;">Выбрать шаблон фильтров</button>
										</h4>
									</div><!--end col-->
								</div><!--end row-->                                                              
							</div><!--end page-title-box-->
						</div><!--end col-->
					</div><!--end row-->
                    <!-- end page title end breadcrumb -->
					
					<div class="col-lg-12">
						
						<!-- Окно фильтров пользователя -->
						
						<div class="card">
							<div class="card-header bg-light">
								<h4 class="card-title">Фильтр</h4>
							</div><!--end card-header-->
							<div class="card-body">
								
								
								<form id="searchForm" method="get" action="/admin/scripts/consolidated_datatable2.php">
									<div class="row">
										
										<div class="col-lg-2">
											<div class="form-group">
												<label>Страна</label>
												<select name="search_country" class="form-control search-class select2">
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
												<label data-toggle="tooltip" data-placement="top" title="Сумма - прибыль">∑Ɍ</label>
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
														<input type="number" id="search_tips_sum_with" name="search_tips_sum_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_tips_sum_to" name="search_tips_sum_to" class="form-control search-class">
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
												<label data-toggle="tooltip" data-placement="top" title="Сумма - подсказки">∑H</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_hints_sum_with" name="search_hints_sum_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_hints_sum_to" name="search_hints_sum_to" class="form-control search-class">
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
														<input type="number" id="search_all_sum_with" name="search_all_sum_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_all_sum_to" name="search_all_sum_to" class="form-control search-class">
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
														<input type="number" id="search_coach_sum_with" name="search_coach_sum_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_coach_sum_to" name="search_coach_sum_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Сумма на счетах пользователей">∑</label>
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
												<label data-toggle="tooltip" data-placement="top" title="Спортсмен - первое прохождение не своего маршрута (кол-во)">1Ɍ</label>
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
												<label data-toggle="tooltip" data-placement="top" title="Тренера - установка первого маршрута (кол-во)">1Ƨ</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_count_create_route_with" name="search_count_create_route_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_count_create_route_to" name="search_count_create_route_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Установка бесплатных маршрутов (кол-во)">1ƧF</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_count_free_route_with" name="search_count_free_route_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_count_free_route_to" name="search_count_free_route_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Установка платных маршрутов (кол-во)">1ƧP</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_count_paid_route_with" name="search_count_paid_route_with" class="form-control search-class">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_count_paid_route_to" name="search_count_paid_route_to" class="form-control search-class">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Прохождение бесплатных маршрутов (кол-во)">ɌF</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_count_route_end_free_with" name="search_count_route_end_free_with" class="form-control search-class" step="0.01">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_count_route_end_free_to" name="search_count_route_end_free_to" class="form-control search-class" step="0.01">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Прохождение платных маршрутов (кол-во)">ɌP</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_count_paid_route_cost_with" name="search_count_paid_route_cost_with" class="form-control search-class" step="0.01">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_count_paid_route_cost_to" name="search_count_paid_route_cost_to" class="form-control search-class" step="0.01">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Неоплаченные маршруты (кол-во)">ɌN</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_count_no_paid_route_with" name="search_count_no_paid_route_with" class="form-control search-class" step="0.01">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_count_no_paid_route_to" name="search_count_no_paid_route_to" class="form-control search-class" step="0.01">
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-2">
											<div class="form-group">
												<label data-toggle="tooltip" data-placement="top" title="Маршруты, признанные BAD (кол-во)">ɌB</label>
												<div style="display: flex;">
													<div class="input-group" style="margin-right: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ОТ</button>
														</span>
														<input type="number" id="search_bad_route_with" name="search_bad_route_with" class="form-control search-class" step="0.01">
													</div>
													<div class="input-group" style="margin-left: 5px;">
														<span class="input-group-prepend">
															<button type="button" class="btn btn-secondary">ДО</button>
														</span>
														<input type="number" id="search_bad_route_to" name="search_bad_route_to" class="form-control search-class" step="0.01">
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

										var url = "scripts/export_consolidated.php?" + $form.serialize();
										window.open(url, '_blank');
									});
								</script>
									
									
							</div>
								
								
								
						</div>
					</div>
						
						<!-- Таблица пользователей -->

						<table id="consolidatedTable" class="table table-striped table-bordered dt-responsive" style="width:100%">
							<thead>
								<tr>
									<th data-name="country">Страна</th>
									<th data-name="region">Регион</th>
									<th data-name="profit_sum" data-toggle="tooltip" data-placement="top" title="Сумма - прибыль">∑Ɍ</th>
									<th data-name="route_sum" data-toggle="tooltip" data-placement="top" title="Сумма - за маршрут">∑M</th>
									<th data-name="tips_sum" data-toggle="tooltip" data-placement="top" title="Сумма - чаевые">∑T</th>
									<th data-name="procent_tips" data-toggle="tooltip" data-placement="top" title="Процент чаевых от суммы за платные маршруты">%T</th>
									<th data-name="hints_sum" data-toggle="tooltip" data-placement="top" title="Сумма - подсказки">∑H</th>
									<th data-name="all_sum" data-toggle="tooltip" data-placement="top" title="Сумма - за маршрут + чаевые + подсказка">∑S</th>
									<th data-name="coach_sum" data-toggle="tooltip" data-placement="top" title="Сумма - отчисления тренеру">∑Ƨ</th>
									<th data-name="balance" data-toggle="tooltip" data-placement="top" title="Сумма на счетах пользователей">∑</th>
									<th data-name="count_route_end" data-toggle="tooltip" data-placement="top" title="Спортсмен - первое прохождение не своего маршрута (кол-во)">1Ɍ</th>
									<th data-name="count_create_route" data-toggle="tooltip" data-placement="top" title="Тренера - установка первого маршрута (кол-во)">1Ƨ</th>
									<th data-name="count_free_route" data-toggle="tooltip" data-placement="top" title="Установка бесплатных маршрутов (кол-во)">1ƧF</th>
									<th data-name="count_paid_route" data-toggle="tooltip" data-placement="top" title="Установка платных маршрутов (кол-во)">1ƧP</th>
									<th data-name="count_route_end_free" data-toggle="tooltip" data-placement="top" title="Прохождение бесплатных маршрутов (кол-во)">ɌF</th>
									<th data-name="count_paid_route_cost" data-toggle="tooltip" data-placement="top" title="Прохождение платных маршрутов (кол-во)">ɌP</th>
									<th data-name="count_no_paid_route" data-toggle="tooltip" data-placement="top" title="Неоплаченные маршруты (кол-во)">ɌN</th>
									<th data-name="bad_route" data-toggle="tooltip" data-placement="top" title="Маршруты, признанные BAD (кол-во)">ɌB</th>
								</tr>
							</thead>
						</table>
				</div><!-- container -->

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

				$('input[name="search_date"]').on('cancel.daterangepicker', function(ev, picker) {
					$('input[name="search_date"]').val('');
				});
				
				$('input[name="search_date"]').val('');

				$('.select2').select2({
					placeholder: 'Выберите',
					tags: true
				});
				$('#consolidatedTable').DataTable({
					"responsive": true,
					"processing": true,
					"serverSide": true,
					"serverMethod": 'post',
					"ajax": {
						"url": "/admin/scripts/consolidated_datatable2.php",
						"type": "POST",
						"dataSrc":"data"
					},
					"drawCallback": function( settings ) {
						feather.replace();
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

				$("#searchForm").on("submit", function(event){
					event.preventDefault();

					var $form = $("#searchForm"), url = $form.attr('action');
					console.log(url + "?" + $form.serialize());

					$('#consolidatedTable').DataTable().ajax.url(url + "?" + $form.serialize()).load();
				});

				$(".changeTemplateBtn").click(function(){
					$.post( "scripts/load_filters_template.php", { type: "consolidated" })
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

							if(arr_value[0] == 'search_country' || arr_value[0] == 'search_region'){
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
							if(name == 'search_country' || arr_value[0] == 'search_region'){
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
							$.post( "scripts/add_filters_template.php", { type: "consolidated", name: name_template, filters: filters })
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