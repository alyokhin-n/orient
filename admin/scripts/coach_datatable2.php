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
    
    $sql = "SELECT * FROM in_clients WHERE id IN (SELECT client_id FROM in_routes) LIMIT ".$row.",".$rowperpage;

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_clients WHERE id IN (SELECT client_id FROM in_routes)");
	$records = mysqli_fetch_array($sel);
	$totalRecords = $records['allcount'];

	$sel = mysqli_query($link, "SELECT * FROM in_clients WHERE id IN (SELECT client_id FROM in_routes)");
	$records = mysqli_fetch_array($sel);
	$totalRecordwithFilter = $records['allcount'];

	$while_counter = 0;

	$select = mysqli_query($link, $sql);	
	$json['data'] = [];	
	$data = array();
	while ($get = mysqli_fetch_array($select)){

		// if($get['last_pay_date'] != ''){
		// 	$last_pay_date = date("d.m.Y", strtotime($get['last_pay_date']));
		// }else{
		// 	$last_pay_date = '';
		// }
		
		$count_cost_not_null = 0;
		$count_cost_null = 0;
		$procent_tips = 0;
		$pay_sum = 0;
		$no_pay_sum = 0;
		$all_sum = 0;
		$route_bad = 0;
		$avg_rate = 0;
		$profit_sum = 0;

		$last_pay_date = "";
		$paysera_address = "";

		if($get['pay_sum'] != ''){
			$pay_sum = $get['pay_sum'];
		}
		if($get['no_pay_sum'] != ''){
			$no_pay_sum = $get['no_pay_sum'];
		}
		if($get['last_pay_date'] != ''){
			$last_pay_date = $get['last_pay_date'];
		}

		if($get['paysera_address'] != ''){
			$paysera_address = "Да";
		}else{
			$paysera_address = "Нет";
		}

		$select_first_route = mysqli_query($link, "SELECT MIN(created_date) as min_date FROM in_routes WHERE client_id = '$get[id]'");
		$get_first_route = mysqli_fetch_array($select_first_route);

		if($get_first_route['min_date'] != ''){
			$first_date_route = $get_first_route['min_date'];
		}else{
			$first_date_route = "";
		}

		$select_cost_not_null = mysqli_query($link, "SELECT * FROM in_routes WHERE client_id = '$get[id]' AND cost > 0 $q");
		$count_cost_not_null = mysqli_num_rows($select_cost_not_null);

		$select_cost_null = mysqli_query($link, "SELECT * FROM in_routes WHERE client_id = '$get[id]' AND cost = 0 $q");
		$count_cost_null = mysqli_num_rows($select_cost_null);

		$all_route_price = 0;
		$all_route_tips = 0;
		$all_route_hints = 0;

		$select_routes = mysqli_query($link, "SELECT * FROM in_routes WHERE client_id = '$get[id]' $q");
		while($get_routes = mysqli_fetch_array($select_routes)){
			$select_route_end = mysqli_query($link, "SELECT * FROM in_routes_end WHERE route_id = '$get_routes[id]' AND paid = 'true' $q_end");
			$count_route_end = mysqli_num_rows($select_route_end);

			$all_route_price += $get_routes['cost'] * $count_route_end;

			if($count_route_end > 0){
				while($get_route_end = mysqli_fetch_array($select_route_end)){
					if($get_route_end['tips'] > 0){
						$all_route_tips += $get_route_end['tips'];
					}
				}
			}

			$select_all_hints = mysqli_query($link, "SELECT * FROM in_hints_log WHERE route_id = '$get_routes[id]' $q_end");
			$count_all_hints = mysqli_num_rows($select_all_hints);
			if($count_all_hints > 0){
				$all_route_hints += $count_all_hints * $get_routes['hint_price'];
			}
		}

		$no_pay_sum = ($all_route_price + $all_route_tips) * intval($percent_coach) / 100;

		if($pay_sum > 0){
			$no_pay_sum -= $pay_sum;
		}

		$all_sum = $no_pay_sum + $pay_sum;

		$all_route_sum = $all_route_price + $all_route_tips + $all_route_hints;

		if($all_route_price > 0){
			$procent_tips = $all_route_tips / $all_route_price * 100;
		}

		$select_avg_rate = mysqli_query($link, "SELECT AVG(rate) as avg_rate FROM in_routes_end WHERE route_id IN (SELECT id FROM in_routes WHERE client_id = '$get[id]') $q_end");
		if(mysqli_num_rows($select_avg_rate) > 0){
			$get_avg_rate = mysqli_fetch_array($select_avg_rate);

			$avg_rate = $get_avg_rate['avg_rate'];
		}else{
			$avg_rate = 0;
		}

		$profit_sum = ($all_route_price + $all_route_tips) * $percent_coach / 100 + $all_route_hints;

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

		if($_GET['search_count_cost_not_null_with'] != '' && $show != 0){
			if($count_cost_not_null >= $_GET['search_count_cost_not_null_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_cost_not_null_to'] != '' && $show != 0){
			if($count_cost_not_null <= $_GET['search_count_cost_not_null_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_cost_null_with'] != '' && $show != 0){
			if($count_cost_null >= $_GET['search_count_cost_null_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_cost_null_to'] != '' && $show != 0){
			if($count_cost_null <= $_GET['search_count_cost_null_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_route_price_with'] != '' && $show != 0){
			if($all_route_price >= $_GET['search_all_route_price_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_route_price_to'] != '' && $show != 0){
			if($all_route_price <= $_GET['search_all_route_price_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_route_tips_with'] != '' && $show != 0){
			if($all_route_tips >= $_GET['search_all_route_tips_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_route_tips_to'] != '' && $show != 0){
			if($all_route_tips <= $_GET['search_all_route_tips_to']){
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

		if($_GET['search_all_route_hints_with'] != '' && $show != 0){
			if($all_route_hints >= $_GET['search_all_route_hints_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_route_hints_to'] != '' && $show != 0){
			if($all_route_hints <= $_GET['search_all_route_hints_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_route_sum_with'] != '' && $show != 0){
			if($all_route_sum >= $_GET['search_all_route_sum_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_route_sum_to'] != '' && $show != 0){
			if($all_route_sum <= $_GET['search_all_route_sum_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_pay_sum_with'] != '' && $show != 0){
			if($pay_sum >= $_GET['search_pay_sum_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_pay_sum_to'] != '' && $show != 0){
			if($pay_sum <= $_GET['search_pay_sum_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_no_pay_sum_with'] != '' && $show != 0){
			if($no_pay_sum >= $_GET['search_no_pay_sum_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_no_pay_sum_to'] != '' && $show != 0){
			if($no_pay_sum <= $_GET['search_no_pay_sum_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_sum_with'] != '' && $show != 0){
			if($all_sum >= $_GET['search_all_sum_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_all_sum_to'] != '' && $show != 0){
			if($all_sum <= $_GET['search_all_sum_to']){
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

		if($_GET['search_last_pay_date'] != '' && $show != 0){
			$search_last_pay_date = $_GET['search_last_pay_date'];
			$search_last_pay_date = explode(" - ", $search_last_pay_date);
			$pay_date = strtotime(date("Y-m-d", strtotime($last_pay_date)));
			$with_date = strtotime($search_last_pay_date[0]);
			$to_date = strtotime($search_last_pay_date[1]);
			if($pay_date >= $with_date && $pay_date <= $to_date){
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

		if($last_pay_date != ''){
			$last_pay_date = date("d.m.Y", strtotime($last_pay_date));
		}else{
			$last_pay_date = '';
		}

		if($first_date_route != ''){
			$first_date_route = date("d.m.Y", strtotime($first_date_route));
		}else{
			$first_date_route = '';
		}
		
		if($show == 1){

			$data[$while_counter][0] = $get['nikname'];
			$data[$while_counter][1] = $paysera_address;
			$data[$while_counter][2] = $get['country'];
			$data[$while_counter][3] = $get['region'];
			$data[$while_counter][4] = intval($profit_sum);
	        $data[$while_counter][5] = $count_cost_not_null;
	        $data[$while_counter][6] = $count_cost_null;
	        $data[$while_counter][7] = intval($all_route_price);
	        $data[$while_counter][8] = intval($all_route_tips);
	        $data[$while_counter][9] = number_format($procent_tips, 0, '.', '') . "%";
	        $data[$while_counter][10] = intval($all_route_hints);
	        $data[$while_counter][11] = intval($all_route_sum);
	        $data[$while_counter][12] = intval($pay_sum);
	        $data[$while_counter][13] = intval($no_pay_sum);
	        $data[$while_counter][14] = intval($all_sum);
	        $data[$while_counter][15] = number_format($route_bad, 0, '.', '');
	        $data[$while_counter][16] = number_format($avg_rate, 2, '.', '');
	        $data[$while_counter][17] = $last_pay_date;
	        $data[$while_counter][18] = $first_date_route;
	        $data[$while_counter][19] = $ban_html;
	        $data[$while_counter][20] = $actions_html;

			$while_counter++;
		}

		$res .= "SELECT * FROM in_routes WHERE client_id = '$get[id]' AND cost > 0 $q";
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