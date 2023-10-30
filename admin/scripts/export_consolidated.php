<?php 
	include("../config/dbconnect.php");

	require_once("../template/plugins/PHPExcel-1.8/Classes/PHPExcel.php");
	require_once("../template/plugins/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel5.php");
	
	header ("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M Y H:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=Consolidated-".date("Y.m.d H:i:s").".xls");

	$myXls = new PHPExcel();
	// Указание на активный лист
	$myXls->setActiveSheetIndex(0);
	// Получение активного листа
	$mySheet = $myXls->getActiveSheet();
	
	
	$mySheet->getTabColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKGREEN);
	
	// Указание названия листа книги
	$mySheet->setTitle("Отчет");
	
	$mySheet->setCellValue("A1", "Страна");
	$mySheet->setCellValue("B1", "Регион");
	$mySheet->setCellValue("C1", "Сумма - прибыль");
	$mySheet->setCellValue("D1", "Сумма - за маршрут");
	$mySheet->setCellValue("E1", "Сумма - чаевые");
	$mySheet->setCellValue("F1", "Процент чаевых от суммы за платные маршруты");
	$mySheet->setCellValue("G1", "Сумма - подсказки");
	$mySheet->setCellValue("H1", "Сумма - за маршрут + чаевые + подсказка");
	$mySheet->setCellValue("I1", "Сумма - отчисления тренеру");
	$mySheet->setCellValue("J1", "Сумма на счетах пользователей");
	$mySheet->setCellValue("K1", "Спортсмен - первое прохождение не своего маршрута (кол-во)");
	$mySheet->setCellValue("L1", "Тренера - установка первого маршрута (кол-во)");
	$mySheet->setCellValue("M1", "Установка бесплатных маршрутов (кол-во)");
	$mySheet->setCellValue("N1", "Установка платных маршрутов (кол-во)");
	$mySheet->setCellValue("O1", "Прохождение бесплатных маршрутов (кол-во)");
	$mySheet->setCellValue("P1", "Прохождение платных маршрутов (кол-во)");
	$mySheet->setCellValue("Q1", "Неоплаченные маршруты (кол-во)");
	$mySheet->setCellValue("R1", "Маршруты, признанные BAD (кол-во)");
	
	
	$mySheet ->getColumnDimension("A")->setAutoSize(true);
	$mySheet ->getColumnDimension("B")->setAutoSize(true);
	$mySheet ->getColumnDimension("C")->setAutoSize(true);
	$mySheet ->getColumnDimension("D")->setAutoSize(true);
	$mySheet ->getColumnDimension("E")->setAutoSize(true);
	$mySheet ->getColumnDimension("F")->setAutoSize(true);
	$mySheet ->getColumnDimension("G")->setAutoSize(true);
	$mySheet ->getColumnDimension("H")->setAutoSize(true);
	$mySheet ->getColumnDimension("I")->setAutoSize(true);
	$mySheet ->getColumnDimension("J")->setAutoSize(true);
	$mySheet ->getColumnDimension("K")->setAutoSize(true);
	$mySheet ->getColumnDimension("L")->setAutoSize(true);
	$mySheet ->getColumnDimension("M")->setAutoSize(true);
	$mySheet ->getColumnDimension("N")->setAutoSize(true);
	$mySheet ->getColumnDimension("O")->setAutoSize(true);
	$mySheet ->getColumnDimension("P")->setAutoSize(true);
	$mySheet ->getColumnDimension("Q")->setAutoSize(true);
	$mySheet ->getColumnDimension("R")->setAutoSize(true);

	$q = "";

	if($_GET['search_country'] != '' && $_GET['search_country'] != 'all'){
		$search_country = mysqli_real_escape_string($link, $_GET['search_country']);

		$q .= " AND country = '$search_country'";
	}

	if($_GET['search_region'] != '' && $_GET['search_region'] != 'all'){
		$search_region = mysqli_real_escape_string($link, $_GET['search_region']);

		$q .= " AND region = '$search_region'";
	}

	if($_GET['search_profit_sum_with'] != ''){
		$q .= " AND profit_sum >= '$_GET[search_profit_sum_with]'";
	}

	if($_GET['search_profit_sum_to'] != ''){
		$q .= " AND profit_sum <= '$_GET[search_profit_sum_to]'";
	}

	if($_GET['search_route_sum_with'] != ''){
		$q .= " AND route_sum >= '$_GET[search_route_sum_with]'";
	}

	if($_GET['search_route_sum_to'] != ''){
		$q .= " AND route_sum <= '$_GET[search_route_sum_to]'";
	}

	if($_GET['search_tips_sum_with'] != ''){
		$q .= " AND tips_sum >= '$_GET[search_tips_sum_with]'";
	}

	if($_GET['search_tips_sum_to'] != ''){
		$q .= " AND tips_sum <= '$_GET[search_tips_sum_to]'";
	}

	if($_GET['search_procent_tips_with'] != ''){
		$q .= " AND procent_tips >= '$_GET[search_procent_tips_with]'";
	}

	if($_GET['search_procent_tips_to'] != ''){
		$q .= " AND procent_tips <= '$_GET[search_procent_tips_to]'";
	}

	if($_GET['search_hints_sum_with'] != ''){
		$q .= " AND hints_sum >= '$_GET[search_hints_sum_with]'";
	}

	if($_GET['search_hints_sum_to'] != ''){
		$q .= " AND hints_sum <= '$_GET[search_hints_sum_to]'";
	}

	if($_GET['search_all_sum_with'] != ''){
		$q .= " AND all_sum >= '$_GET[search_all_sum_with]'";
	}

	if($_GET['search_all_sum_to'] != ''){
		$q .= " AND all_sum <= '$_GET[search_all_sum_to]'";
	}

	if($_GET['search_coach_sum_with'] != ''){
		$q .= " AND coach_sum >= '$_GET[search_coach_sum_with]'";
	}

	if($_GET['search_coach_sum_to'] != ''){
		$q .= " AND coach_sum <= '$_GET[search_coach_sum_to]'";
	}

	if($_GET['search_balance_with'] != ''){
		$q .= " AND balance >= '$_GET[search_balance_with]'";
	}

	if($_GET['search_balance_to'] != ''){
		$q .= " AND balance <= '$_GET[search_balance_to]'";
	}

	if($_GET['search_count_route_end_with'] != ''){
		$q .= " AND count_route_end >= '$_GET[search_count_route_end_with]'";
	}

	if($_GET['search_count_route_end_to'] != ''){
		$q .= " AND count_route_end <= '$_GET[search_count_route_end_to]'";
	}

	if($_GET['search_count_create_route_with'] != ''){
		$q .= " AND count_create_route >= '$_GET[search_count_create_route_with]'";
	}

	if($_GET['search_count_create_route_to'] != ''){
		$q .= " AND count_create_route <= '$_GET[search_count_create_route_to]'";
	}

	if($_GET['search_count_free_route_with'] != ''){
		$q .= " AND count_free_route >= '$_GET[search_count_free_route_with]'";
	}

	if($_GET['search_count_free_route_to'] != ''){
		$q .= " AND count_free_route <= '$_GET[search_count_free_route_to]'";
	}

	if($_GET['search_count_paid_route_with'] != ''){
		$q .= " AND count_paid_route >= '$_GET[search_count_paid_route_with]'";
	}

	if($_GET['search_count_paid_route_to'] != ''){
		$q .= " AND count_paid_route <= '$_GET[search_count_paid_route_to]'";
	}

	if($_GET['search_count_route_end_free_with'] != ''){
		$q .= " AND count_route_end_free >= '$_GET[search_count_route_end_free_with]'";
	}

	if($_GET['search_count_route_end_free_to'] != ''){
		$q .= " AND count_route_end_free <= '$_GET[search_count_route_end_free_to]'";
	}

	if($_GET['search_count_paid_route_cost_with'] != ''){
		$q .= " AND count_paid_route_cost >= '$_GET[search_count_paid_route_cost_with]'";
	}

	if($_GET['search_count_paid_route_cost_to'] != ''){
		$q .= " AND count_paid_route_cost <= '$_GET[search_count_paid_route_cost_to]'";
	}

	if($_GET['search_count_no_paid_route_with'] != ''){
		$q .= " AND count_no_paid_route >= '$_GET[search_count_no_paid_route_with]'";
	}

	if($_GET['search_count_no_paid_route_to'] != ''){
		$q .= " AND count_no_paid_route <= '$_GET[search_count_no_paid_route_to]'";
	}

	if($_GET['search_bad_route_with'] != ''){
		$q .= " AND bad_route >= '$_GET[search_bad_route_with]'";
	}

	if($_GET['search_bad_route_to'] != ''){
		$q .= " AND bad_route <= '$_GET[search_bad_route_to]'";
	}
    
    $sql = "SELECT * FROM in_consolidated WHERE id != '' $q";

	$str = 1;

	$select = mysqli_query($link, $sql);	
	while ($get = mysqli_fetch_array($select)){

		$str++;

		$mySheet->setCellValue("A".$str, $get['country']);
		$mySheet->setCellValue("B".$str, $get['region']);
		$mySheet->setCellValue("C".$str, $get['profit_sum']);
		$mySheet->setCellValue("D".$str, $get['route_sum']);
		$mySheet->setCellValue("E".$str, $get['tips_sum']);
		$mySheet->setCellValue("F".$str, $get['procent_tips'] . "%");
		$mySheet->setCellValue("G".$str, $get['hints_sum']);
		$mySheet->setCellValue("H".$str, $get['all_sum']);
		$mySheet->setCellValue("I".$str, $get['coach_sum']);
		$mySheet->setCellValue("J".$str, $get['balance']);
		$mySheet->setCellValue("K".$str, $get['count_route_end']);
		$mySheet->setCellValue("L".$str, $get['count_create_route']);
		$mySheet->setCellValue("M".$str, $get['count_free_route']);
		$mySheet->setCellValue("N".$str, $get['count_paid_route']);
		$mySheet->setCellValue("O".$str, $get['count_route_end_free']);
		$mySheet->setCellValue("P".$str, $get['count_paid_route_cost']);
		$mySheet->setCellValue("Q".$str, $get['count_no_paid_route']);
		$mySheet->setCellValue("R".$str, $get['bad_route']);
	}


	$myXls->setActiveSheetIndex(0);
	
	$objWriter = new PHPExcel_Writer_Excel5($myXls);
	$objWriter->save("php://output");
?>