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
    
    $sql = "SELECT * FROM in_routes WHERE country <> '' AND region <> '' $q GROUP BY country, region";

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_routes WHERE country <> '' AND region <> '' GROUP BY country, region");
	$records = mysqli_fetch_array($sel);
	$totalRecords = $records['allcount'];

	$sel = mysqli_query($link, "SELECT * FROM in_routes WHERE country <> '' AND region <> '' $q GROUP BY country, region");
	$records = mysqli_fetch_array($sel);
	$totalRecordwithFilter = $records['allcount'];

	$while_counter = 0;

	$select = mysqli_query($link, $sql);	
	$json['data'] = [];	
	$data = array();
	while ($get = mysqli_fetch_array($select)){

		$country = mysqli_real_escape_string($link, $get['country']);
		$region = mysqli_real_escape_string($link, $get['region']);

		$route_sum = 0;
		$tips_sum = 0;
		$procent_tips = 0;
		$hints_sum = 0;
		$all_sum = 0;
		$coach_sum = 0;
		$profit_sum = 0;
		$balance = 0;
		$count_free_route = 0;
		$count_paid_route = 0;
		$count_paid_route_cost = 0;
		$count_route_end_free = 0;
		$count_no_paid_route = 0;
		$bad_route = 0;
		$count_route_end = 0;
		$count_create_route = 0;

		$select_routes = mysqli_query($link, "SELECT * FROM in_routes WHERE country = '$country' AND region = '$region' $q");
		while($get_routes = mysqli_fetch_array($select_routes)){
			$select_route_end = mysqli_query($link, "SELECT * FROM in_routes_end WHERE route_id = '$get_routes[id]'");
			$count_route_end = mysqli_num_rows($select_route_end);

			$route_sum += $get_routes['cost'] * $count_route_end;

			if($count_route_end > 0){
				while($get_route_end = mysqli_fetch_array($select_route_end)){
					if($get_route_end['tips'] > 0){
						$tips_sum += $get_route_end['tips'];
					}

					if($get_routes['cost'] > 0 && $get_route_end['paid'] != 'true'){
						$count_no_paid_route++;
					}
				}
			}

			$select_all_hints = mysqli_query($link, "SELECT * FROM in_hints_log WHERE route_id = '$get_routes[id]' $q_end");
			$count_all_hints = mysqli_num_rows($select_all_hints);
			if($count_all_hints > 0){
				$hints_sum += $count_all_hints * $get_routes['hint_price'];
			}

			if($get_routes['cost'] > 0){
				$count_paid_route++;
				$count_paid_route_cost += $count_route_end;
			}else{
				$count_free_route++;
				$count_route_end_free += $count_route_end;
			}
		}

		$select_count_coachs = mysqli_query($link, "SELECT * FROM in_routes WHERE country = '$country' AND region = '$region' $q GROUP BY client_id");
		$count_create_route = mysqli_num_rows($select_count_coachs);

		$select_count_athletes = mysqli_query($link, "SELECT * FROM in_routes_end WHERE route_id IN (SELECT id FROM in_routes WHERE country = '$country' AND region = '$region') $q_end GROUP BY client_id");
		$count_route_end = mysqli_num_rows($select_count_athletes);

		$all_sum = $route_sum + $tips_sum + $hints_sum;

		if($route_sum > 0){
			$procent_tips = $tips_sum / $route_sum * 100;
		}

		$coach_sum = ($route_sum + $tips_sum) * $percent_coach / 100;

		$profit_sum = $all_sum - $coach_sum;

		$select_clients = mysqli_query($link, "SELECT SUM(balance) as sum FROM in_clients WHERE country = '$country' AND region = '$region'");
		$get_clients = mysqli_fetch_array($select_clients);

		if($get_clients['sum'] > 0){
			$balance = $get_clients['sum'];
		}

		$show = 1;

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

		if($_GET['search_route_sum_with'] != '' && $show != 0){
			if($route_sum >= $_GET['search_route_sum_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_route_sum_to'] != '' && $show != 0){
			if($route_sum <= $_GET['search_route_sum_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_tips_sum_with'] != '' && $show != 0){
			if($tips_sum >= $_GET['search_tips_sum_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_tips_sum_to'] != '' && $show != 0){
			if($tips_sum <= $_GET['search_tips_sum_to']){
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

		if($_GET['search_hints_sum_with'] != '' && $show != 0){
			if($hints_sum >= $_GET['search_hints_sum_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_hints_sum_to'] != '' && $show != 0){
			if($hints_sum <= $_GET['search_hints_sum_to']){
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

		if($_GET['search_coach_sum_with'] != '' && $show != 0){
			if($coach_sum >= $_GET['search_coach_sum_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_coach_sum_to'] != '' && $show != 0){
			if($coach_sum <= $_GET['search_coach_sum_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_balance_with'] != '' && $show != 0){
			if($balance >= $_GET['search_balance_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_balance_to'] != '' && $show != 0){
			if($balance <= $_GET['search_balance_to']){
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

		if($_GET['search_count_create_route_with'] != '' && $show != 0){
			if($count_create_route >= $_GET['search_count_create_route_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_create_route_to'] != '' && $show != 0){
			if($count_create_route <= $_GET['search_count_create_route_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_paid_route_with'] != '' && $show != 0){
			if($count_paid_route >= $_GET['search_count_paid_route_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_paid_route_to'] != '' && $show != 0){
			if($count_paid_route <= $_GET['search_count_paid_route_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_route_end_free_with'] != '' && $show != 0){
			if($count_route_end_free >= $_GET['search_count_route_end_free_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_route_end_free_to'] != '' && $show != 0){
			if($count_route_end_free <= $_GET['search_count_route_end_free_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_paid_route_cost_with'] != '' && $show != 0){
			if($count_paid_route_cost >= $_GET['search_count_paid_route_cost_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_paid_route_cost_to'] != '' && $show != 0){
			if($count_paid_route_cost <= $_GET['search_count_paid_route_cost_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_no_paid_route_with'] != '' && $show != 0){
			if($count_no_paid_route >= $_GET['search_count_no_paid_route_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_no_paid_route_to'] != '' && $show != 0){
			if($count_no_paid_route <= $_GET['search_count_no_paid_route_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_bad_route_with'] != '' && $show != 0){
			if($bad_route >= $_GET['search_bad_route_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_bad_route_to'] != '' && $show != 0){
			if($bad_route <= $_GET['search_bad_route_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}
		
		if($show == 1){

			$data[$while_counter][0] = $get['country'];
			$data[$while_counter][1] = $get['region'];
			$data[$while_counter][2] = intval($profit_sum);
			$data[$while_counter][3] = intval($route_sum);
			$data[$while_counter][4] = intval($tips_sum);
			$data[$while_counter][5] = intval($procent_tips) . "%";
			$data[$while_counter][6] = intval($hints_sum);
			$data[$while_counter][7] = intval($all_sum);
			$data[$while_counter][8] = intval($coach_sum);
			$data[$while_counter][9] = intval($balance);
			$data[$while_counter][10] = intval($count_route_end);
			$data[$while_counter][11] = intval($count_create_route);
			$data[$while_counter][12] = intval($count_free_route);
			$data[$while_counter][13] = intval($count_paid_route);
			$data[$while_counter][14] = intval($count_route_end_free);
			$data[$while_counter][15] = intval($count_paid_route_cost);
			$data[$while_counter][16] = intval($count_no_paid_route);
			$data[$while_counter][17] = $bad_route;

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