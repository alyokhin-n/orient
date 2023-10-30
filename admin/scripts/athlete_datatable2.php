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

	$select_percent_coach = mysqli_query($link, "SELECT * FROM in_constants WHERE name = 'coach_percent'");
	$get_percent_coach = mysqli_fetch_array($select_percent_coach);

	$percent_coach = $get_percent_coach['value'];

	$q = "";
	$q_end = "";

	if($_GET['search_date'] != ''){
		$search_date = $_GET['search_date'];
		$search_date = explode(" - ", $search_date);
		$q .= " AND DATE(created_date) >= '$search_date[0]'";
		$q .= " AND DATE(created_date) <= '$search_date[1]'";
		$q_end .= " AND DATE(create_time) >= '$search_date[0]'";
		$q_end .= " AND DATE(create_time) <= '$search_date[1]'";
	}
	//$order_q = "ORDER BY " . $columnNameSortOrder . " " . $columnSortOrder;
    
    $sql = "SELECT * FROM in_clients WHERE id IN (SELECT client_id FROM in_routes_end) LIMIT ".$row.",".$rowperpage;

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_clients WHERE id IN (SELECT client_id FROM in_routes_end)");
	$records = mysqli_fetch_array($sel);
	$totalRecords = $records['allcount'];

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_clients WHERE id IN (SELECT client_id FROM in_routes)");
	$records = mysqli_fetch_array($sel);
	$totalRecordwithFilter = $records['allcount'];

	$while_counter = 0;

	$select = mysqli_query($link, $sql);	
	$json['data'] = [];	
	$data = array();
	while ($get = mysqli_fetch_array($select)){

		$procent_tips = 0;
		$route_bad = 0;
		$avg_rate = 0;
		$profit_sum = 0;
		$all_wasted_tips = 0;
		$count_route_end = 0;
		$avg_rate = 0;
		$count_route_no_paid = 0;
		$count_route_free = 0;
		$all_wasted_route = 0;
		$count_route_paid = 0;
		$all_wasted_hints = 0;

		$select_first_end = mysqli_query($link, "SELECT MIN(create_time) as first_date, AVG(rate) as avg_rate FROM in_routes_end WHERE client_id = '$get[id]'");
		$get_first_end = mysqli_fetch_array($select_first_end);

		if($get_first_end['first_date'] != ''){
			$first_date_route = $get_first_end['first_date'];
		}else{
			$first_date_route = '';
		}

		if($get_first_end['avg_rate'] != ''){
			$avg_rate = $get_first_end['avg_rate'];
		}

		$select_end_routes = mysqli_query($link, "SELECT * FROM in_routes_end WHERE client_id = '$get[id]' $q_end");
		while($get_end_routes = mysqli_fetch_array($select_end_routes)){
			$select_route = mysqli_query($link, "SELECT * FROM in_routes WHERE id = '$get_end_routes[route_id]'");
			$get_route = mysqli_fetch_array($select_route);

			if($get_end_routes['paid'] != 'true' && $get_route['cost'] > 0){
				$count_route_no_paid++;
			}

			if($get_route['cost'] == 0){
				$count_route_free++;
			}

			if($get_route['cost'] > 0){
				$all_wasted_route += $get_route['cost'];
				$count_route_paid++;
			}

			if($get_end_routes['tips'] != ''){
				$all_wasted_tips += $get_end_routes['tips'];
			}

			$count_route_end++;
		}

		$select_all_hints = mysqli_query($link, "SELECT * FROM in_hints_log WHERE route_id IN (SELECT route_id FROM in_routes_end WHERE client_id = '$get[id]') AND client_id = '$get[id]' $q_end");
		if(mysqli_num_rows($select_all_hints) > 0){
			$all_wasted_hints = 0;
			while($get_all_hints = mysqli_fetch_array($select_all_hints)){
				$select_route_hint = mysqli_query($link, "SELECT hint_price FROM in_routes WHERE id = '$get_all_hints[route_id]'");
				$get_route_hint = mysqli_fetch_array($select_route_hint);
				$all_wasted_hints += $get_route_hint['hint_price'];
			}
		}

		if($all_wasted_route > 0){
			$procent_tips = $all_wasted_tips / $all_wasted_route * 100;
		}

		$all_wasted_sum = $all_wasted_route + $all_wasted_tips + $all_wasted_hints;

		$profit_sum = ($all_wasted_route + $all_wasted_tips) * $percent_coach / 100 + $all_wasted_hints;

		$select_client = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$get[client_id]'");
		$get_client = mysqli_fetch_array($select_client);

		if($get_client['banned'] == 1){
			$ban_html = date('d.m.Y', strtotime($get_client['ban_date_end']));
		}else{
			$ban_html = "";
		}

		if($get_client['banned'] == 1){
			$actions_html = "
			<a class='badge badge-pill badge-soft-danger delban' data-id='".$get['id']."' style='cursor:pointer;'>Бан</a>
			<a class='btn btn-warning waves-effect waves-light btn-xs' href='?edit=".$get['id']."' style='font-size: 10px;'>E</a>
			<a class='btn btn-info waves-effect waves-light btn-xs changePhoto' data-id='".$get['id']."' style='font-size: 10px;'>StAv</a>
			<a class='btn btn-danger waves-effect waves-light btn-xs deleteuser' data-id='".$get['id']."' data-toggle='modal'  data-target='#exampleModalWarning' style='font-size: 10px;'>D</a>
			";
		}else{
			$actions_html = "
			<a class='badge badge-pill badge-soft-success banuser' data-id='".$get['id']."' style='cursor:pointer;'>Бан</a>
			<a class='btn btn-warning waves-effect waves-light btn-xs' href='?edit=".$get['id']."' style='font-size: 10px;'>E</a>
			<a class='btn btn-info waves-effect waves-light btn-xs changePhoto' data-id='".$get['id']."' style='font-size: 10px;'>StAv</a>
			<a class='btn btn-danger waves-effect waves-light btn-xs deleteuser' data-id='".$get['id']."' data-toggle='modal'  data-target='#exampleModalWarning' style='font-size: 10px;'>D</a>
			";
		}

		$show = 1;

		if($_GET['search_nickname'] != '' && $show != 0){
			if($get['nikname'] == $_GET['search_nickname']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_country'] != '' && $_GET['search_country'] != 'all' && $show != 0){
			if($get['country'] == $_GET['search_country']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_region'] != '' && $_GET['search_region'] != 'all' && $show != 0){
			if($get['region'] == $_GET['search_region']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_profit_sum_with'] != '' && $show != 0){
			if($profit_sum >= $_GET['search_profit_sum_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_profit_sum_to'] != '' && $show != 0){
			if($profit_sum <= $_GET['search_profit_sum_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_balance_with'] != '' && $show != 0){
			if($get['balance'] >= $_GET['search_balance_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_balance_to'] != '' && $show != 0){
			if($get['balance'] <= $_GET['search_balance_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_wasted_sum_with'] != '' && $show != 0){
			if($all_wasted_sum >= $_GET['search_all_wasted_sum_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_wasted_sum_to'] != '' && $show != 0){
			if($all_wasted_sum <= $_GET['search_all_wasted_sum_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_wasted_route_with'] != '' && $show != 0){
			if($all_wasted_route >= $_GET['search_all_wasted_route_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_wasted_route_with'] != '' && $show != 0){
			if($all_wasted_route <= $_GET['search_all_wasted_route_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_wasted_tips_with'] != '' && $show != 0){
			if($all_wasted_tips >= $_GET['search_all_wasted_tips_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_wasted_tips_to'] != '' && $show != 0){
			if($all_wasted_tips <= $_GET['search_all_wasted_tips_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_procent_tips_with'] != '' && $show != 0){
			if($procent_tips >= $_GET['search_procent_tips_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_procent_tips_to'] != '' && $show != 0){
			if($procent_tips <= $_GET['search_procent_tips_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_wasted_hints_with'] != '' && $show != 0){
			if($all_wasted_hints >= $_GET['search_all_wasted_hints_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_wasted_hints_to'] != '' && $show != 0){
			if($all_wasted_hints <= $_GET['search_all_wasted_hints_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_route_end_with'] != '' && $show != 0){
			if($count_route_end >= $_GET['search_count_route_end_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_route_end_to'] != '' && $show != 0){
			if($count_route_end <= $_GET['search_count_route_end_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_route_paid_with'] != '' && $show != 0){
			if($count_route_paid >= $_GET['search_count_route_paid_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_route_paid_to'] != '' && $show != 0){
			if($count_route_paid <= $_GET['search_count_route_paid_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_route_free_with'] != '' && $show != 0){
			if($count_route_free >= $_GET['search_count_route_free_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_route_free_to'] != '' && $show != 0){
			if($count_route_free <= $_GET['search_count_route_free_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_route_no_paid_with'] != '' && $show != 0){
			if($count_route_no_paid >= $_GET['search_count_route_no_paid_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_route_no_paid_to'] != '' && $show != 0){
			if($count_route_no_paid <= $_GET['search_count_route_no_paid_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_route_bad_with'] != '' && $show != 0){
			if($route_bad >= $_GET['search_route_bad_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_route_bad_to'] != '' && $show != 0){
			if($route_bad <= $_GET['search_route_bad_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_avg_rate_with'] != '' && $show != 0){
			if($avg_rate >= $_GET['search_avg_rate_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_avg_rate_to'] != '' && $show != 0){
			if($avg_rate <= $_GET['search_avg_rate_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_first_date_route'] != '' && $show != 0){
			$search_first_date_route = $_GET['search_first_date_route'];
			$search_first_date_route = explode(" - ", $search_first_date_route);
			$first_date = strtotime(date("Y-m-d", strtotime($first_date_route)));
			$with_date = strtotime($search_first_date_route[0]);
			$to_date = strtotime($search_first_date_route[1]);
			if($first_date >= $with_date && $first_date <= $to_date){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($first_date_route != ''){
			$first_date_route = date("d.m.Y", strtotime($first_date_route));
		}else{
			$first_date_route = '';
		}
		
		if($show == 1){

			$data[$while_counter][0] = $get['nikname'];
			$data[$while_counter][1] = $get['country'];
			$data[$while_counter][2] = $get['region'];
			$data[$while_counter][3] = intval($profit_sum);
	        $data[$while_counter][4] = $get['balance'];
	        $data[$while_counter][5] = intval($all_wasted_sum);
	        $data[$while_counter][6] = intval($all_wasted_route);
	        $data[$while_counter][7] = intval($all_wasted_tips);
	        $data[$while_counter][8] = number_format($procent_tips, 0, '.', '') . "%";
	        $data[$while_counter][9] = intval($all_wasted_hints);
	        $data[$while_counter][10] = intval($count_route_end);
	        $data[$while_counter][11] = intval($count_route_paid);
	        $data[$while_counter][12] = intval($count_route_free);
	        $data[$while_counter][13] = intval($count_route_no_paid);
	        $data[$while_counter][14] = number_format($route_bad, 0, '.', '');
	        $data[$while_counter][15] = number_format($avg_rate, 2, '.', '');
	        $data[$while_counter][16] = $first_date_route;
	        $data[$while_counter][17] = $ban_html;
	        $data[$while_counter][18] = $actions_html;

			$while_counter++;
		}
	}

	$totalRecordwithFilter = $while_counter;

	if($columnSortOrder == 'asc'){
		usort($data, function ($a, $b) {
			global $columnIndex;
			return -($a[$columnIndex] <=> $b[$columnIndex]);
		});
	}else{
		usort($data, function ($a, $b) {
			global $columnIndex;
			return ($a[$columnIndex] <=> $b[$columnIndex]);
		});
	}

	
	$response = array(
		"draw" => intval($draw),
		"iTotalRecords" => $totalRecords,
		"iTotalDisplayRecords" => $totalRecordwithFilter,
		"aaData" => $data,
		"sql" => $res,
	);

	echo json_encode($response);
?>