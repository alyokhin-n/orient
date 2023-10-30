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

	if($_GET['search_nickname'] != ''){
		$search_nickname = mysqli_real_escape_string($link, $_GET['search_nickname']);

		$q .= " AND nikname LIKE '%$search_nickname%'";
	}

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

	if(!empty($searchValue)){
		$q .= " AND (users.name LIKE '%$searchValue%' OR users.email LIKE '%$searchValue%' OR users.username LIKE '%$searchValue%' OR users.role_name LIKE '%$searchValue%' OR users.status_name LIKE '%$searchValue%')";
	}
    
    $sql = "SELECT * FROM in_atheletes WHERE id != '' $q $order_q LIMIT ".$row.",".$rowperpage;

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_atheletes WHERE id != '' $order_q");
	$records = mysqli_fetch_array($sel);
	$totalRecords = $records['allcount'];

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_atheletes WHERE id != '' $q $order_q");
	$records = mysqli_fetch_array($sel);
	$totalRecordwithFilter = $records['allcount'];

	$while_counter = 0;

	$select = mysqli_query($link, $sql);	
	$json['data'] = [];	
	$data = array();
	while ($get = mysqli_fetch_array($select)){

		if($get['first_date_route'] != ''){
			$first_date_route = date("d.m.Y", strtotime($get['first_date_route']));
		}

		$select_client = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$get[client_id]'");
		$get_client = mysqli_fetch_array($select_client);

		if($get_client['banned'] == 1){
			$ban_html = date('d.m.Y', strtotime($get_client['ban_date_end']));
		}else{
			$ban_html = "";
		}

		if($get_client['banned'] == 1){
			$actions_html = "
			<a class='badge badge-pill badge-soft-danger delban' data-id='".$get['client_id']."' style='cursor:pointer;'>Бан</a>
			<a class='btn btn-warning waves-effect waves-light btn-xs' href='?edit=".$get['client_id']."' style='font-size: 10px;'>E</a>
			<a class='btn btn-info waves-effect waves-light btn-xs changePhoto' data-id='".$get['client_id']."' style='font-size: 10px;'>StAv</a>
			<a class='btn btn-danger waves-effect waves-light btn-xs deleteuser' data-id='".$get['client_id']."' data-toggle='modal'  data-target='#exampleModalWarning' style='font-size: 10px;'>D</a>
			";
		}else{
			$actions_html = "
			<a class='badge badge-pill badge-soft-success banuser' data-id='".$get['client_id']."' style='cursor:pointer;'>Бан</a>
			<a class='btn btn-warning waves-effect waves-light btn-xs' href='?edit=".$get['client_id']."' style='font-size: 10px;'>E</a>
			<a class='btn btn-info waves-effect waves-light btn-xs changePhoto' data-id='".$get['client_id']."' style='font-size: 10px;'>StAv</a>
			<a class='btn btn-danger waves-effect waves-light btn-xs deleteuser' data-id='".$get['client_id']."' data-toggle='modal'  data-target='#exampleModalWarning' style='font-size: 10px;'>D</a>
			";
		}

		$data[$while_counter][0] = $get['nikname'];
		$data[$while_counter][1] = $get['country'];
		$data[$while_counter][2] = $get['region'];
		$data[$while_counter][3] = intval($get['profit_sum']);
        $data[$while_counter][4] = intval($get['balance']);
        $data[$while_counter][5] = intval($get['all_wasted_sum']);
        $data[$while_counter][6] = intval($get['all_wasted_route']);
        $data[$while_counter][7] = intval($get['all_wasted_tips']);
        $data[$while_counter][8] = number_format($get['procent_tips'], 0, '.', '') . "%";
        $data[$while_counter][9] = intval($get['all_wasted_hints']);
        $data[$while_counter][10] = intval($get['count_route_end']);
        $data[$while_counter][11] = intval($get['count_route_paid']);
        $data[$while_counter][12] = intval($get['count_route_free']);
        $data[$while_counter][13] = intval($get['count_route_no_paid']);
        $data[$while_counter][14] = number_format($get['route_bad'], 0, '.', '');
        $data[$while_counter][15] = number_format($get['avg_rate'], 2, '.', '');
        $data[$while_counter][16] = $first_date_route;
        $data[$while_counter][17] = $ban_html;
        $data[$while_counter][18] = $actions_html;

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