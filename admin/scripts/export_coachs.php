<?php 
	include("../config/dbconnect.php");

	require_once("../template/plugins/PHPExcel-1.8/Classes/PHPExcel.php");
	require_once("../template/plugins/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel5.php");
	
	header ("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M Y H:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=Coachs-".date("Y.m.d H:i:s").".xls");

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
	$mySheet->setCellValue("E1", "Маршруты - установленные цена >0 (кол-во)");
	$mySheet->setCellValue("F1", "Маршруты - установленные цена =0 (кол-во)");
	$mySheet->setCellValue("G1", "Полученная сумма - маршруты");
	$mySheet->setCellValue("H1", "Полученная сумма - чаевые");
	$mySheet->setCellValue("I1", "Процент чаевых от суммы за платные маршруты");
	$mySheet->setCellValue("J1", "Полученная сумма - подсказки");
	$mySheet->setCellValue("K1", "Полученная сумма - маршруты + чаевые + подсказки");
	$mySheet->setCellValue("L1", "Начисленная сумма - оплаченная");
	$mySheet->setCellValue("M1", "Начисленная сумма - не оплаченная");
	$mySheet->setCellValue("N1", "Сумма тренеру - оплаченная + не оплаченная");
	$mySheet->setCellValue("O1", "Маршруты - признаны BAD (кол-во)");
	$mySheet->setCellValue("P1", "Маршруты - средний рейтинг (без BAD)");
	$mySheet->setCellValue("Q1", "Дата крайней оплаты тренеру");
	$mySheet->setCellValue("R1", "Дата установки первого маршрута");
	$mySheet->setCellValue("S1", "Бан");
	
	
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

	if($_GET['search_count_cost_not_null_with'] != ''){
		$q .= " AND count_cost_not_null >= '$_GET[search_count_cost_not_null_with]'";
	}

	if($_GET['search_count_cost_not_null_to'] != ''){
		$q .= " AND count_cost_not_null <= '$_GET[search_count_cost_not_null_to]'";
	}

	if($_GET['search_count_cost_null_with'] != ''){
		$q .= " AND count_cost_null >= '$_GET[search_count_cost_null_with]'";
	}

	if($_GET['search_count_cost_null_to'] != ''){
		$q .= " AND count_cost_null <= '$_GET[search_count_cost_null_to]'";
	}

	if($_GET['search_all_route_price_with'] != ''){
		$q .= " AND all_route_price >= '$_GET[search_all_route_price_with]'";
	}

	if($_GET['search_all_route_price_to'] != ''){
		$q .= " AND all_route_price <= '$_GET[search_all_route_price_to]'";
	}

	if($_GET['search_all_route_tips_with'] != ''){
		$q .= " AND all_route_tips >= '$_GET[search_all_route_tips_with]'";
	}

	if($_GET['search_all_route_tips_to'] != ''){
		$q .= " AND all_route_tips <= '$_GET[search_all_route_tips_to]'";
	}

	if($_GET['search_procent_tips_with'] != ''){
		$q .= " AND procent_tips >= '$_GET[search_procent_tips_with]'";
	}

	if($_GET['search_procent_tips_to'] != ''){
		$q .= " AND procent_tips <= '$_GET[search_procent_tips_to]'";
	}

	if($_GET['search_all_route_hints_with'] != ''){
		$q .= " AND all_route_hints >= '$_GET[search_all_route_hints_with]'";
	}

	if($_GET['search_all_route_hints_to'] != ''){
		$q .= " AND all_route_hints <= '$_GET[search_all_route_hints_to]'";
	}

	if($_GET['search_all_route_sum_with'] != ''){
		$q .= " AND all_route_sum >= '$_GET[search_all_route_sum_with]'";
	}

	if($_GET['search_all_route_sum_to'] != ''){
		$q .= " AND all_route_sum <= '$_GET[search_all_route_sum_to]'";
	}

	if($_GET['search_pay_sum_with'] != ''){
		$q .= " AND pay_sum >= '$_GET[search_pay_sum_with]'";
	}

	if($_GET['search_pay_sum_to'] != ''){
		$q .= " AND pay_sum <= '$_GET[search_pay_sum_to]'";
	}

	if($_GET['search_no_pay_sum_with'] != ''){
		$q .= " AND no_pay_sum >= '$_GET[search_no_pay_sum_with]'";
	}

	if($_GET['search_no_pay_sum_to'] != ''){
		$q .= " AND no_pay_sum <= '$_GET[search_no_pay_sum_to]'";
	}

	if($_GET['search_all_sum_with'] != ''){
		$q .= " AND all_sum >= '$_GET[search_all_sum_with]'";
	}

	if($_GET['search_all_sum_to'] != ''){
		$q .= " AND all_sum <= '$_GET[search_all_sum_to]'";
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

	if($_GET['search_last_pay_date'] != ''){
		$search_last_pay_date = $_GET['search_last_pay_date'];
		$search_last_pay_date = explode(" - ", $search_last_pay_date);
		$q .= " AND DATE(last_pay_date) >= '$search_last_pay_date[0]'";
		$q .= " AND DATE(last_pay_date) <= '$search_last_pay_date[1]'";
	}

	if($_GET['search_first_date_route'] != ''){
		$search_first_date_route = $_GET['search_first_date_route'];
		$search_first_date_route = explode(" - ", $search_first_date_route);
		$q .= " AND DATE(first_date_route) >= '$search_first_date_route[0]'";
		$q .= " AND DATE(first_date_route) <= '$search_first_date_route[1]'";
	}
    
    $sql = "SELECT * FROM in_coachs WHERE id != '' $q";

	$str = 1;

	$select = mysqli_query($link, $sql);	
	while ($get = mysqli_fetch_array($select)){

		if($get['last_pay_date'] != ''){
			$last_pay_date = date("d.m.Y H:i:s", strtotime($get['last_pay_date']));
		}else{
			$last_pay_date = '';
		}
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
		$mySheet->setCellValue("E".$str, $get['count_cost_not_null']);
		$mySheet->setCellValue("F".$str, $get['count_cost_null']);
		$mySheet->setCellValue("G".$str, $get['all_route_price']);
		$mySheet->setCellValue("H".$str, $get['all_route_tips']);
		$mySheet->setCellValue("I".$str, $get['procent_tips'] . "%");
		$mySheet->setCellValue("J".$str, $get['all_route_hints']);
		$mySheet->setCellValue("K".$str, $get['all_route_sum']);
		$mySheet->setCellValue("L".$str, $get['pay_sum']);
		$mySheet->setCellValue("M".$str, $get['no_pay_sum']);
		$mySheet->setCellValue("N".$str, $get['all_sum']);
		$mySheet->setCellValue("O".$str, $get['route_bad']);
		$mySheet->setCellValue("P".$str, $get['avg_rate']);
		$mySheet->setCellValue("Q".$str, $last_pay_date);
		$mySheet->setCellValue("R".$str, $first_date_route);
		$mySheet->setCellValue("S".$str, $ban);
	}


	$myXls->setActiveSheetIndex(0);
	
	$objWriter = new PHPExcel_Writer_Excel5($myXls);
	$objWriter->save("php://output");
?>