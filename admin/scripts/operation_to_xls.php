<?php
	require_once '../template/plugins/PHPExcel-1.8/Classes/PHPExcel.php';
	ini_set("max_execution_time", 'time_limit');
	ini_set('memory_limit', '4096M');
	include("../config/dbconnect.php");
	include("../config/checkAdmin.php");

	$curr_unixtime = strtotime(date('Y-m-d H:i:s'));
	$curr_date = date("Y-m-d");

	$date_from = $_GET['date_from'];
	$date_to = $_GET['date_to'];
	$operation = $_GET['operation'];
	$client = $_GET['client'];

	if($date_from != ''){
		$q .= " AND date >= '$date_from 00:00:00'";
	}
	if($date_to != ''){
		$q .= " AND date <= '$date_to 23:59:59'";
	}
	if($operation != ''){
		$o = 0;
		$q_oper = "";
		foreach ($operation as $key => $value) {
			$select_operation_type = mysqli_query($link, "SELECT ot.id,ot.name,ot.avatar,ot.tag_id,ot.create_date,ot.sort,h.name as tag_name FROM in_operations_type as ot LEFT JOIN in_hashtags as h ON ot.tag_id = h.id WHERE ot.id = '$value'");
			$get_operation_type = mysqli_fetch_array($select_operation_type);

			if($get_operation_type['tag_name'] == 'маршруты'){
				if($o == 0){
					$q_oper .= " type = '#$get_operation_type[tag_name]'";
				}else{
					$q_oper .= " OR type = '#$get_operation_type[tag_name]'";
				}
				$o++;
			}else{
				if($o == 0){
					$q_oper .= " name = '$get_operation_type[name]'";
				}else{
					$q_oper .= " OR name = '$get_operation_type[name]'";
				}
				$o++;
			}
		}

		$q .= " AND ($q_oper)";
	}
	if($client != '' && $client != 'all'){
		$q .= " AND id IN (SELECT operation_id FROM in_operations_elements WHERE client_id = '$client')";
	}

	//create PHPExcel object
	$excel = new PHPExcel();

	function cellColor($cells,$color){
	    global $excel;

	    $excel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
	        'type' => PHPExcel_Style_Fill::FILL_SOLID,
	        'startcolor' => array(
	             'rgb' => $color
	        )
	    ));
	}

	$counter = 1;


	$result = mysqli_query($link, "SELECT * FROM in_operations WHERE id != '' $q ORDER BY date DESC");
	$test_str = "SELECT * FROM in_operations WHERE id != '' $q ORDER BY date DESC";

	/* $rowcount == 0; */
	$rowcount = mysqli_num_rows($result);
	if($rowcount > 0){
	    $excel->setActiveSheetIndex(0)
	            ->setCellValue('A'.$counter, '#')
	            ->setCellValue('B'.$counter, 'Дата и время')
	            ->setCellValue('C'.$counter, 'Название')
	            ->setCellValue('D'.$counter, 'Тип')
	            ->setCellValue('E'.$counter, 'у.е')
	            ->setCellValue('F'.$counter, 'Пользователь')
	            ->setCellValue('G'.$counter, 'Маршрут')
	            ->setCellValue('H'.$counter, 'Елементы')
	            ->setCellValue('I'.$counter, 'Комментарий');
	            /* ->setCellValue('S'.$counter, 'Відмітка про перевірку даних'); */

	            $counter++;
	    
	    for($col = 'A'; $col !== 'J'; $col++) {
	        $excel->getActiveSheet()
	            ->getColumnDimension($col)
	            ->setAutoSize(true);

	        cellColor($col.'1', 'afafaf');
	    }

	    while ($get = mysqli_fetch_array($result)){
	        
	        $date = date("d.m.Y H:i:s", strtotime($get['date']));
	        $name = $get['name'];
	        $type = $get['type'];
	        $money = $get['money'];
	        $comment = $get['comment'];

	        if($money == null OR $money == ''){
	        	$money = "";
	        }

	        $users = "";
	        $routes = "";
	        $elements = "";

	        $select_detail = mysqli_query($link, "SELECT * FROM in_operations_elements WHERE operation_id = '$get[id]'");
	        while($get_detail = mysqli_fetch_array($select_detail)){
	        	if($get_detail['client_id'] != null){
	        		$select_user = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$get_detail[client_id]'");
	        		$get_user = mysqli_fetch_array($select_user);

	        		$users .= $get_user['nikname'] . "\n";
	        	}
	        	if($get_detail['route_id'] != null){
	        		$select_route = mysqli_query($link, "SELECT * FROM in_routes WHERE id = '$get_detail[route_id]'");
	        		$get_route = mysqli_fetch_array($select_route);

	        		$routes .= $get_route['name'] . "\n";
	        	}
	        	if($get_detail['element_id'] != null){
	        		$select_element = mysqli_query($link, "SELECT * FROM in_elements WHERE id = '$get_detail[element_id]'");
	        		$get_element = mysqli_fetch_array($select_element);

	        		$select_hashtag = mysqli_query($link, "SELECT * FROM in_hashtags WHERE id = '$get_element[tag_id]'");
	        		$get_hashtag = mysqli_fetch_array($select_hashtag);

	        		$elements .= $get_element['name'] . "(" . $get_hashtag['name'] . ")" . "\n";
	        	}
	        }

			

	    	$excel->setActiveSheetIndex(0)
	    	->setCellValue('A'.$counter,$counter)
	    	->setCellValue('B'.$counter,$date)
	    	->setCellValue('C'.$counter,$name)
	    	->setCellValue('D'.$counter,$type)
	    	->setCellValue('E'.$counter,$money)
	    	->setCellValue('F'.$counter,$users)
	    	->setCellValue('G'.$counter,$routes)
	    	->setCellValue('H'.$counter,$elements)
	    	->setCellValue('I'.$counter,$comment);

	    	$counter++;
	        
	    }
	}
	else{
	    $excel->setActiveSheetIndex(0)
	    ->setCellValue('A1','Нету')
	    ->setCellValue('B1','Данных')
	    ->setCellValue('C1','');
	}


	//insert some data to PHPExcel object
	/* $excel->setActiveSheetIndex(0)
	 ->setCellValue('A1','Hello')
	 ->setCellValue('B1','World'); */

	//redirect to browser (download) instead of saving the result as a file

	//this is for MS Office Excel 2007 xlsx format
	/* header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="tr-'.$curr_unixtime .'.xls"'); */

	//this is for MS Office Excel 2003 xls format
	//header('Content-Type: application/vnd.ms-excel');
	//header('Content-Disposition: attachment; filename="test.xlsx"');


	header('Cache-Control: max-age=0');

	//write the result to a file
	//for excel 2007 format
	$file = PHPExcel_IOFactory::createWriter($excel,'Excel5');
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="operations_'.$curr_unixtime.'.xls"');

	//for excel 2003 format
	//$file = PHPExcel_IOFactory::createWriter($excel,'Excel5');

	//output to php output instead of filename
	$file->save('php://output');

	?>