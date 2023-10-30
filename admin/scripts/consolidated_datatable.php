<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php"); 

	$draw = $_POST['draw'];
	$row = $_POST['start'];
	$rowperpage = $_POST['length']; // Rows display per page
	$columnIndex = $_POST['order'][0]['column']; // Column index
	$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
	$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
	$columnNameSortOrder = $_POST['order'][0]['column_name']; // Order Column name
	$searchValue = $_POST['search']['value']; // Search value

	$q = "";
	$order_q = "ORDER BY " . $columnNameSortOrder . " " . $columnSortOrder;

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

	if(!empty($searchValue)){
		$q .= " AND (users.name LIKE '%$searchValue%' OR users.email LIKE '%$searchValue%' OR users.username LIKE '%$searchValue%' OR users.role_name LIKE '%$searchValue%' OR users.status_name LIKE '%$searchValue%')";
	}
    
    $sql = "SELECT * FROM in_consolidated WHERE id != '' $q $order_q LIMIT ".$row.",".$rowperpage;

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_consolidated WHERE id != '' $order_q");
	$records = mysqli_fetch_array($sel);
	$totalRecords = $records['allcount'];

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_consolidated WHERE id != '' $q $order_q");
	$records = mysqli_fetch_array($sel);
	$totalRecordwithFilter = $records['allcount'];

	$while_counter = 0;

	$select = mysqli_query($link, $sql);	
	$json['data'] = [];	
	$data = array();
	while ($get = mysqli_fetch_array($select)){

		$data[$while_counter][0] = $get['country'];
		$data[$while_counter][1] = $get['region'];
		$data[$while_counter][2] = intval($get['profit_sum']);
		$data[$while_counter][3] = intval($get['route_sum']);
        $data[$while_counter][4] = intval($get['tips_sum']);
        $data[$while_counter][5] = intval($get['procent_tips']) . "%";
        $data[$while_counter][6] = intval($get['hints_sum']);
        $data[$while_counter][7] = intval($get['all_sum']);
        $data[$while_counter][8] = intval($get['coach_sum']);
        $data[$while_counter][9] = intval($get['balance']);
        $data[$while_counter][10] = intval($get['count_route_end']);
        $data[$while_counter][11] = intval($get['count_create_route']);
        $data[$while_counter][12] = intval($get['count_free_route']);
        $data[$while_counter][13] = intval($get['count_paid_route']);
        $data[$while_counter][14] = intval($get['count_route_end_free']);
        $data[$while_counter][15] = intval($get['count_paid_route_cost']);
        $data[$while_counter][16] = intval($get['count_no_paid_route']);
        $data[$while_counter][17] = $get['bad_route'];

		$while_counter++;
	}

	$response = array(
		"draw" => intval($draw),
		"iTotalRecords" => $totalRecords,
		"iTotalDisplayRecords" => $totalRecordwithFilter,
		"aaData" => $data,
		"sql" => $sql,
	);

	echo json_encode($response);
?>