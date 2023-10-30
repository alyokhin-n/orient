<?php 
	include("../config/dbconnect.php");

	require_once("../template/plugins/PHPExcel-1.8/Classes/PHPExcel.php");
	require_once("../template/plugins/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel5.php");
	
	header ("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M Y H:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=Routes-".date("Y.m.d H:i:s").".xls");

	$myXls = new PHPExcel();
	// Указание на активный лист
	$myXls->setActiveSheetIndex(0);
	// Получение активного листа
	$mySheet = $myXls->getActiveSheet();
	
	
	$mySheet->getTabColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKGREEN);
	
	// Указание названия листа книги
	$mySheet->setTitle("Отчет");
	
	$mySheet->setCellValue("A1", "Маршрут ID");
	$mySheet->setCellValue("B1", "Страна");
	$mySheet->setCellValue("C1", "Регион");
	$mySheet->setCellValue("D1", "Сумма - прибыль");
	$mySheet->setCellValue("E1", "Кол-во спортсменов, прошедших маршрут");
	$mySheet->setCellValue("F1", "Рейтинг");
	$mySheet->setCellValue("G1", "Цена");
	$mySheet->setCellValue("H1", "Тип + Тема");
	$mySheet->setCellValue("I1", "Кол-во КП");
	$mySheet->setCellValue("J1", "Метод");
	$mySheet->setCellValue("K1", "Местность");
	$mySheet->setCellValue("L1", "Сумма - за маршрут");
	$mySheet->setCellValue("M1", "Сумма - чаевые");
	$mySheet->setCellValue("N1", "Процент чаевых от суммы за платные маршруты");
	$mySheet->setCellValue("O1", "Сумма - подсказка");
	$mySheet->setCellValue("P1", "Сумма - за маршрут + чаевые + подсказка");
	$mySheet->setCellValue("Q1", "Сумма - отчисления тренеру");
	$mySheet->setCellValue("R1", "Пользователь-Тренер ID");
	$mySheet->setCellValue("S1", "Дата крайнего прохождения");
	$mySheet->setCellValue("T1", "Дата установки");
	
	
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
	$mySheet ->getColumnDimension("S")->setAutoSize(true);
	$mySheet ->getColumnDimension("T")->setAutoSize(true);

	$q = "";

	if($_GET['search_name'] != ''){
		$search_name = mysqli_real_escape_string($link, $_GET['search_name']);

		$q .= " AND name LIKE '%$search_name%'";
	}

	if($_GET['search_country'] != '' && $_GET['search_country'] != 'all'){
		$search_country = mysqli_real_escape_string($link, $_GET['search_country']);

		$q .= " AND country = '$search_country'";
	}

	if($_GET['search_profit_sum_with'] != ''){
		$q .= " AND profit_sum >= '$_GET[search_profit_sum_with]'";
	}

	if($_GET['search_profit_sum_to'] != ''){
		$q .= " AND profit_sum <= '$_GET[search_profit_sum_to]'";
	}

	if($_GET['search_count_athletes_end_with'] != ''){
		$q .= " AND count_athletes_end >= '$_GET[search_count_athletes_end_with]'";
	}

	if($_GET['search_count_athletes_end_to'] != ''){
		$q .= " AND count_athletes_end <= '$_GET[search_count_athletes_end_to]'";
	}

	if($_GET['search_rate_with'] != ''){
		$q .= " AND rate >= '$_GET[search_rate_with]'";
	}

	if($_GET['search_rate_to'] != ''){
		$q .= " AND rate <= '$_GET[search_rate_to]'";
	}

	if($_GET['search_cost_with'] != ''){
		$q .= " AND cost >= '$_GET[search_cost_with]'";
	}

	if($_GET['search_cost_to'] != ''){
		$q .= " AND cost <= '$_GET[search_cost_to]'";
	}

	if($_GET['search_type'] != '' && $_GET['search_type'] != 'all'){
		$search_type = $_GET['search_type'][0];
		$q .= " AND type = 'search_type'";
	}

	if($_GET['search_count_cp_with'] != ''){
		$q .= " AND count_cp >= '$_GET[search_count_cp_with]'";
	}

	if($_GET['search_count_cp_to'] != ''){
		$q .= " AND count_cp <= '$_GET[search_count_cp_to]'";
	}

	if($_GET['search_method'] != '' && $_GET['search_method'] != 'all'){
		$search_method = $_GET['search_method'][0];
		$q .= " AND method = '$search_method'";
	}

	if($_GET['search_terra'] != '' && $_GET['search_terra'] != 'all'){
		$search_terra = $_GET['search_terra'][0];
		$q .= " AND terra = '$search_terra'";
	}

	if($_GET['search_route_sum_with'] != ''){
		$q .= " AND route_sum >= '$_GET[search_route_sum_with]'";
	}

	if($_GET['search_route_sum_to'] != ''){
		$q .= " AND route_sum <= '$_GET[search_route_sum_to]'";
	}

	if($_GET['search_route_tips_with'] != ''){
		$q .= " AND route_tips >= '$_GET[search_route_tips_with]'";
	}

	if($_GET['search_route_tips_to'] != ''){
		$q .= " AND route_tips <= '$_GET[search_route_tips_to]'";
	}

	if($_GET['search_procent_tips_with'] != ''){
		$q .= " AND procent_tips >= '$_GET[search_procent_tips_with]'";
	}

	if($_GET['search_procent_tips_to'] != ''){
		$q .= " AND procent_tips <= '$_GET[search_procent_tips_to]'";
	}

	if($_GET['search_route_hints_with'] != ''){
		$q .= " AND route_hints >= '$_GET[search_route_hints_with]'";
	}

	if($_GET['search_route_hints_to'] != ''){
		$q .= " AND route_hints <= '$_GET[search_route_hints_to]'";
	}

	if($_GET['search_route_all_sum_with'] != ''){
		$q .= " AND route_all_sum >= '$_GET[search_route_all_sum_with]'";
	}

	if($_GET['search_route_all_sum_to'] != ''){
		$q .= " AND route_all_sum <= '$_GET[search_route_all_sum_to]'";
	}

	if($_GET['search_coach_sum_with'] != ''){
		$q .= " AND coach_sum >= '$_GET[search_coach_sum_with]'";
	}

	if($_GET['search_coach_sum_to'] != ''){
		$q .= " AND coach_sum <= '$_GET[search_coach_sum_to]'";
	}

	if($_GET['search_coach_nikname'] != '' && $_GET['search_coach_nikname'] != 'all'){
		$q .= " AND coach_nikname = '$_GET[search_coach_nikname]'";
	}

	if($_GET['search_last_date_end'] != ''){
		$search_last_date_end = $_GET['search_last_date_end'];
		$search_last_date_end = explode(" - ", $search_last_date_end);
		$q .= " AND DATE(last_date_end) >= '$search_last_date_end[0]'";
		$q .= " AND DATE(last_date_end) <= '$search_last_date_end[1]'";
	}

	if($_GET['search_create_date_route'] != ''){
		$search_create_date_route = $_GET['search_create_date_route'];
		$search_create_date_route = explode(" - ", $search_create_date_route);
		$q .= " AND DATE(create_date_route) >= '$search_create_date_route[0]'";
		$q .= " AND DATE(create_date_route) <= '$search_create_date_route[1]'";
	}
    
    $sql = "SELECT * FROM in_routes_report WHERE id != '' $q";

	$str = 1;

	$select = mysqli_query($link, $sql);	
	while ($get = mysqli_fetch_array($select)){

		if($get['last_date_end'] != ''){
			$last_date_end = date("d.m.Y H:i:s", strtotime($get['last_date_end']));
		}
		if($get['create_date_route'] != ''){
			$create_date_route = date("d.m.Y H:i:s", strtotime($get['create_date_route']));
		}

		$str++;

		$mySheet->setCellValue("A".$str, $get['name']);
		$mySheet->setCellValue("B".$str, $get['country']);
		$mySheet->setCellValue("C".$str, $get['region']);
		$mySheet->setCellValue("D".$str, $get['profit_sum']);
		$mySheet->setCellValue("E".$str, $get['count_athletes_end']);
		$mySheet->setCellValue("F".$str, $get['rate']);
		$mySheet->setCellValue("G".$str, $get['cost']);
		$mySheet->setCellValue("H".$str, $get['type'] . "+" . $get['theme']);
		$mySheet->setCellValue("I".$str, $get['count_cp']);
		$mySheet->setCellValue("J".$str, $get['method']);
		$mySheet->setCellValue("K".$str, $get['terra']);
		$mySheet->setCellValue("L".$str, $get['route_sum']);
		$mySheet->setCellValue("M".$str, $get['route_tips']);
		$mySheet->setCellValue("N".$str, $get['procent_tips'] . "%");
		$mySheet->setCellValue("O".$str, $get['route_hints']);
		$mySheet->setCellValue("P".$str, $get['route_all_sum']);
		$mySheet->setCellValue("Q".$str, $get['coach_sum']);
		$mySheet->setCellValue("R".$str, $get['coach_nikname']);
		$mySheet->setCellValue("S".$str, $last_date_end);
		$mySheet->setCellValue("T".$str, $create_date_route);
	}


	$myXls->setActiveSheetIndex(0);
	
	$objWriter = new PHPExcel_Writer_Excel5($myXls);
	$objWriter->save("php://output");
?>