<?php 
	include("../config/dbconnect.php");

	require_once("../template/plugins/PHPExcel-1.8/Classes/PHPExcel.php");
	require_once("../template/plugins/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel5.php");
	
	header ("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M Y H:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=Athletes-".date("Y.m.d H:i:s").".xls");

	$myXls = new PHPExcel();
	// Указание на активный лист
	$myXls->setActiveSheetIndex(0);
	// Получение активного листа
	$mySheet = $myXls->getActiveSheet();
	
	
	$mySheet->getTabColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKGREEN);
	
	// Указание названия листа книги
	$mySheet->setTitle("Отчет");
	
	$mySheet->setCellValue("A1", "Ник");
	$mySheet->setCellValue("B1", "Страна");
	$mySheet->setCellValue("C1", "Регион");
	$mySheet->setCellValue("D1", "Сумма - прибыль");
	$mySheet->setCellValue("E1", "Сумма на счете пользователя");
	$mySheet->setCellValue("F1", "Потраченная сумма - маршруты + чаевые + подсказки");
	$mySheet->setCellValue("G1", "Потраченная сумма - маршруты");
	$mySheet->setCellValue("H1", "Потраченная сумма - чаевые");
	$mySheet->setCellValue("I1", "Процент чаевых от суммы за платные маршруты");
	$mySheet->setCellValue("J1", "Потраченная сумма");
	$mySheet->setCellValue("K1", "Маршруты - пройденные все (кол-во)");
	$mySheet->setCellValue("L1", "Маршруты - пройденные платные (кол-во)");
	$mySheet->setCellValue("M1", "Маршруты - пройденные бесплатные (кол-во)");
	$mySheet->setCellValue("N1", "Маршруты - платные неоплаченные (кол-во)");
	$mySheet->setCellValue("O1", "Маршруты - признаны BAD (кол-во)");
	$mySheet->setCellValue("P1", "Маршруты - средний выставленный рейтинг без учета BAD");
	$mySheet->setCellValue("Q1", "Дата первого прохождения по не своему маршруту");
	$mySheet->setCellValue("R1", "Бан");
	
	
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

	if($_GET['search_nickname'] != ''){
		$search_nickname = mysqli_real_escape_string($link, $_GET['search_nickname']);

		$q .= " AND nikname LIKE '%$search_nickname%'";
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

	if($_GET['search_balance_with'] != ''){
		$q .= " AND balance >= '$_GET[search_balance_with]'";
	}

	if($_GET['search_balance_to'] != ''){
		$q .= " AND balance <= '$_GET[search_balance_to]'";
	}

	if($_GET['search_all_wasted_sum_with'] != ''){
		$q .= " AND all_wasted_sum >= '$_GET[search_all_wasted_sum_with]'";
	}

	if($_GET['search_all_wasted_sum_to'] != ''){
		$q .= " AND all_wasted_sum <= '$_GET[search_all_wasted_sum_to]'";
	}

	if($_GET['search_all_wasted_route_with'] != ''){
		$q .= " AND all_wasted_route >= '$_GET[search_all_wasted_route_with]'";
	}

	if($_GET['search_all_wasted_route_to'] != ''){
		$q .= " AND all_wasted_route <= '$_GET[search_all_wasted_route_to]'";
	}

	if($_GET['search_all_wasted_tips_with'] != ''){
		$q .= " AND all_wasted_tips >= '$_GET[search_all_wasted_tips_with]'";
	}

	if($_GET['search_all_wasted_tips_to'] != ''){
		$q .= " AND all_wasted_tips <= '$_GET[search_all_wasted_tips_to]'";
	}

	if($_GET['search_procent_tips_with'] != ''){
		$q .= " AND procent_tips >= '$_GET[search_procent_tips_with]'";
	}

	if($_GET['search_procent_tips_to'] != ''){
		$q .= " AND procent_tips <= '$_GET[search_procent_tips_to]'";
	}

	if($_GET['search_all_wasted_hints_with'] != ''){
		$q .= " AND all_wasted_hints >= '$_GET[search_all_wasted_hints_with]'";
	}

	if($_GET['search_all_wasted_hints_to'] != ''){
		$q .= " AND all_wasted_hints <= '$_GET[search_all_wasted_hints_to]'";
	}

	if($_GET['search_count_route_end_with'] != ''){
		$q .= " AND count_route_end >= '$_GET[search_count_route_end_with]'";
	}

	if($_GET['search_count_route_end_to'] != ''){
		$q .= " AND count_route_end <= '$_GET[search_count_route_end_to]'";
	}

	if($_GET['search_count_route_paid_with'] != ''){
		$q .= " AND count_route_paid >= '$_GET[search_count_route_paid_with]'";
	}

	if($_GET['search_count_route_paid_to'] != ''){
		$q .= " AND count_route_paid <= '$_GET[search_count_route_paid_to]'";
	}

	if($_GET['search_count_route_free_with'] != ''){
		$q .= " AND count_route_free >= '$_GET[search_count_route_free_with]'";
	}

	if($_GET['search_count_route_free_to'] != ''){
		$q .= " AND count_route_free <= '$_GET[search_count_route_free_to]'";
	}

	if($_GET['search_count_route_no_paid_with'] != ''){
		$q .= " AND count_route_no_paid >= '$_GET[search_count_route_no_paid_with]'";
	}

	if($_GET['search_count_route_no_paid_to'] != ''){
		$q .= " AND count_route_no_paid <= '$_GET[search_count_route_no_paid_to]'";
	}

	if($_GET['search_route_bad_with'] != ''){
		$q .= " AND route_bad >= '$_GET[search_route_bad_with]'";
	}

	if($_GET['search_route_bad_to'] != ''){
		$q .= " AND route_bad <= '$_GET[search_route_bad_to]'";
	}

	if($_GET['search_avg_rate_with'] != ''){
		$q .= " AND avg_rate >= '$_GET[search_avg_rate_with]'";
	}

	if($_GET['search_avg_rate_to'] != ''){
		$q .= " AND avg_rate <= '$_GET[search_avg_rate_to]'";
	}

	if($_GET['search_first_date_route'] != ''){
		$search_first_date_route = $_GET['search_first_date_route'];
		$search_first_date_route = explode(" - ", $search_first_date_route);
		$q .= " AND DATE(first_date_route) >= '$search_first_date_route[0]'";
		$q .= " AND DATE(first_date_route) <= '$search_first_date_route[1]'";
	}
    
    $sql = "SELECT * FROM in_atheletes WHERE id != '' $q";

	$str = 1;

	$select = mysqli_query($link, $sql);	
	while ($get = mysqli_fetch_array($select)){

		if($get['first_date_route'] != ''){
			$first_date_route = date("d.m.Y H:i:s", strtotime($get['first_date_route']));
		}

		$select_client = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$get[client_id]'");
		$get_client = mysqli_fetch_array($select_client);

		if($get_client['banned'] == 1){
			$ban = "Да";
		}else{
			$ban = "Нет";
		}

		$str++;

		$mySheet->setCellValue("A".$str, $get['nikname']);
		$mySheet->setCellValue("B".$str, $get['country']);
		$mySheet->setCellValue("C".$str, $get['region']);
		$mySheet->setCellValue("D".$str, $get['profit_sum']);
		$mySheet->setCellValue("E".$str, $get['balance']);
		$mySheet->setCellValue("F".$str, $get['all_wasted_sum']);
		$mySheet->setCellValue("G".$str, $get['all_wasted_route']);
		$mySheet->setCellValue("H".$str, $get['all_wasted_tips']);
		$mySheet->setCellValue("I".$str, $get['procent_tips'] . "%");
		$mySheet->setCellValue("J".$str, $get['all_wasted_hints']);
		$mySheet->setCellValue("K".$str, $get['count_route_end']);
		$mySheet->setCellValue("L".$str, $get['count_route_paid']);
		$mySheet->setCellValue("M".$str, $get['count_route_free']);
		$mySheet->setCellValue("N".$str, $get['count_route_no_paid']);
		$mySheet->setCellValue("O".$str, $get['route_bad']);
		$mySheet->setCellValue("P".$str, $get['avg_rate']);
		$mySheet->setCellValue("Q".$str, $first_date_route);
		$mySheet->setCellValue("R".$str, $ban);
	}


	$myXls->setActiveSheetIndex(0);
	
	$objWriter = new PHPExcel_Writer_Excel5($myXls);
	$objWriter->save("php://output");
?>