<?php
	include("../config/dbconnect.php");

	require_once("../template/plugins/PHPExcel-1.8/Classes/PHPExcel.php");
	require_once("../template/plugins/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel5.php");
	
	header ("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M Y H:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=Payouts-".date("Y.m.d H:i:s").".xls");

	$curr_date = date("d.m.Y H:i:s");

	$myXls = new PHPExcel();
	// Указание на активный лист
	$myXls->setActiveSheetIndex(0);
	// Получение активного листа
	$mySheet = $myXls->getActiveSheet();
	
	
	$mySheet->getTabColor()->setARGB(PHPExcel_Style_Color::COLOR_DARKGREEN);
	
	// Указание названия листа книги
	$mySheet->setTitle("Отчет о выплатах");
	
	$mySheet->setCellValue("A1", "Дата формирования");
	$mySheet->setCellValue("B1", "Пользователь ID");
	$mySheet->setCellValue("C1", "Имя Пользователя");
	$mySheet->setCellValue("D1", "ID пользователя в платежной системе");
	$mySheet->setCellValue("E1", "Email");
	$mySheet->setCellValue("F1", "Начисленная  сумма - не оплаченная (у.е)");
	$mySheet->setCellValue("G1", "Начисленная  сумма - не оплаченная (€)");
	$mySheet->setCellValue("H1", "Платёж прошёл или нет (true/false)");
	
	
	$mySheet ->getColumnDimension("A")->setAutoSize(true);
	$mySheet ->getColumnDimension("B")->setAutoSize(true);
	$mySheet ->getColumnDimension("C")->setAutoSize(true);
	$mySheet ->getColumnDimension("D")->setAutoSize(true);
	$mySheet ->getColumnDimension("E")->setAutoSize(true);
	$mySheet ->getColumnDimension("F")->setAutoSize(true);
	$mySheet ->getColumnDimension("G")->setAutoSize(true);
	$mySheet ->getColumnDimension("H")->setAutoSize(true);

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

    	$str++;

    	$client_id = $get['client_id'];

    	$select_client = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$client_id'");
    	$get_client = mysqli_fetch_array($select_client);

    	$name = $get_client['nikname'];
    	$email = $get_client['email'];
    	$paysera_address = $get_client['paysera_address'];

    	$no_pay_sum = $get_client['no_pay_sum'];
    	$no_pay_sum_evro = $get_client['no_pay_sum'] / 10;

    	$mySheet->setCellValue("A".$str, $curr_date);
		$mySheet->setCellValue("B".$str, $client_id);
		$mySheet->setCellValue("C".$str, $name);
		$mySheet->setCellValue("D".$str, $paysera_address);
		$mySheet->setCellValue("E".$str, $email);
		$mySheet->setCellValue("F".$str, $no_pay_sum);
		$mySheet->setCellValue("G".$str, $no_pay_sum_evro);
		$mySheet->setCellValue("H".$str, "false");

    }


    $myXls->setActiveSheetIndex(0);
	
	$objWriter = new PHPExcel_Writer_Excel5($myXls);
	$objWriter->save("php://output");
?>