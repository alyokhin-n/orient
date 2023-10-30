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

	if($_GET['search_name'] != ''){
		$search_name = mysqli_real_escape_string($link, $_GET['search_name']);

		$q .= " AND name LIKE '%$search_name%'";
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

	if(!empty($searchValue)){
		$q .= " AND (users.name LIKE '%$searchValue%' OR users.email LIKE '%$searchValue%' OR users.username LIKE '%$searchValue%' OR users.role_name LIKE '%$searchValue%' OR users.status_name LIKE '%$searchValue%')";
	}
    
    $sql = "SELECT * FROM in_routes_report WHERE id != '' $q $order_q LIMIT ".$row.",".$rowperpage;

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_routes_report WHERE id != '' $order_q");
	$records = mysqli_fetch_array($sel);
	$totalRecords = $records['allcount'];

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_routes_report WHERE id != '' $q $order_q");
	$records = mysqli_fetch_array($sel);
	$totalRecordwithFilter = $records['allcount'];

	$while_counter = 0;

	$select = mysqli_query($link, $sql);	
	$json['data'] = [];	
	$data = array();
	while ($get = mysqli_fetch_array($select)){

		if($get['last_date_end'] != ''){
			$last_date_end = date("d.m.Y", strtotime($get['last_date_end']));
		}
		if($get['create_date_route'] != ''){
			$create_date_route = date("d.m.Y", strtotime($get['create_date_route']));
		}

		if($get['type'] == 'Q'){
			$type = $get['type'] . $get['theme'];
		}else{
			$type = $get['type'];
		}

		$actions_html = "
			<button class='btn btn-info waves-effect waves-light btn-xs showRouteTable' data-id='".$get['route_id']."' style=''>M</button>
			<button class='btn btn-info waves-effect waves-light btn-xs showCPTable' data-id='".$get['route_id']."' style=''>КП</button>
			<button class='btn btn-info waves-effect waves-light btn-xs showcomments' data-id='".$get['route_id']."' data-toggle='modal'  data-target='#exampleModalComments'>♪</button>
			<a class='btn btn-warning waves-effect waves-light btn-xs' href='?edit=".$get['route_id']."'>Е</a>
			<a class='btn btn-danger waves-effect waves-light btn-xs deleteuser' data-id='".$get['route_id']."' data-toggle='modal'  data-target='#exampleModalWarning'>D</a>
		";

		$data[$while_counter][0] = $get['name'];
		$data[$while_counter][1] = $get['country'];
		$data[$while_counter][2] = $get['region'];
		$data[$while_counter][3] = intval($get['profit_sum']);
        $data[$while_counter][4] = intval($get['count_athletes_end']);
        $data[$while_counter][5] = $get['rate'];
        $data[$while_counter][6] = intval($get['cost']);
        $data[$while_counter][7] = $type;
        $data[$while_counter][8] = intval($get['count_cp']);
        $data[$while_counter][9] = $get['method'];
        $data[$while_counter][10] = $get['terra'];
        $data[$while_counter][11] = intval($get['route_sum']);
        $data[$while_counter][12] = intval($get['route_tips']);
        $data[$while_counter][13] = intval($get['procent_tips']) . "%";
        $data[$while_counter][14] = intval($get['route_hints']);
        $data[$while_counter][15] = intval($get['route_all_sum']);
        $data[$while_counter][16] = intval($get['coach_sum']);
        $data[$while_counter][17] = $get['coach_nikname'];
        $data[$while_counter][18] = $last_date_end;
        $data[$while_counter][19] = $create_date_route;
        $data[$while_counter][20] = $actions_html;

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