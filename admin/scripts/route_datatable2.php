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
    
    $sql = "SELECT * FROM in_routes WHERE id != '' $q";

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_routes");
	$records = mysqli_fetch_array($sel);
	$totalRecords = $records['allcount'];

	// $sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_routes WHERE id != '' $q");
	// $records = mysqli_fetch_array($sel);
	// $totalRecordwithFilter = $records['allcount'];

	$while_counter = 0;

	$select = mysqli_query($link, $sql);	
	$json['data'] = [];	
	$data = array();
	while ($get = mysqli_fetch_array($select)){

		$route_id = $get['id'];
		$route_name = $get['name'];
		$country = $get['country'];
		$region = $get['region'];
		$cost = $get['cost'];
		$type = $get['route_type'][0];
		$theme = $get['route_theme'][0];
		$method = $get['route_method'][0];
		$terra = $get['route_terra'][0];
		$coach_id = $get['client_id'];
		$create_date_route = $get['created_date'];

		$rate = 0;
		$route_sum = 0;
		$route_tips = 0;
		$procent_tips = 0;
		$route_hints = 0;
		$route_all_sum = 0;
		$coach_sum = 0;
		$profit_sum = 0;
		$count_athletes_end = 0;

		if($type == 'Q'){
			$type = $type . $theme;
		}else{
			$type = $type;
		}

		$select_points = mysqli_query($link, "SELECT * FROM in_routes_points WHERE route_id = '$route_id' GROUP BY point_id");
		$count_cp = mysqli_num_rows($select_points);

		$select_last_route = mysqli_query($link, "SELECT MAX(create_time) as max_date, COUNT(*) as count, SUM(tips) as tips, AVG(rate) as rate FROM in_routes_end WHERE route_id = '$route_id' $q_end");
		$get_last_route = mysqli_fetch_array($select_last_route);

		if($get_last_route['max_date'] != ''){
			$last_date_end = $get_last_route['max_date'];
		}else{
			$last_date_end = "";
		}

		if($get_last_route['rate'] != ''){
			$rate = $get_last_route['rate'];
		}
		$route_sum = $cost * $get_last_route['count'];
		$route_tips = $get_last_route['tips'];
		$count_athletes_end = $get_last_route['count'];

		if($route_tips > 0){
			$procent_tips = $route_tips / $route_sum * 100;
		}

		$select_all_hints = mysqli_query($link, "SELECT * FROM in_hints_log WHERE route_id = '$route_id' $q_end");
		$count_all_hints = mysqli_num_rows($select_all_hints);
		if($count_all_hints > 0){
			$route_hints += $count_all_hints * $get['hint_price'];
		}

		$route_all_sum = $route_sum + $route_tips + $route_hints;

		$coach_sum = ($route_sum + $route_tips) * $percent_coach / 100;

		$profit_sum = $route_all_sum - $coach_sum;

		$select_coach = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$coach_id'");
		$get_coach = mysqli_fetch_array($select_coach);

		$coach_nikname = $get_coach['nikname'];

		$actions_html = "
			<button class='btn btn-info waves-effect waves-light btn-xs showRouteTable' data-id='".$get['id']."' style=''>M</button>
			<button class='btn btn-info waves-effect waves-light btn-xs showCPTable' data-id='".$get['id']."' style=''>КП</button>
			<button class='btn btn-info waves-effect waves-light btn-xs showcomments' data-id='".$get['id']."' data-toggle='modal'  data-target='#exampleModalComments'>♪</button>
			<a class='btn btn-warning waves-effect waves-light btn-xs' href='?edit=".$get['id']."'>Е</a>
			<a class='btn btn-danger waves-effect waves-light btn-xs deleteuser' data-id='".$get['id']."' data-toggle='modal'  data-target='#exampleModalWarning'>D</a>
		";

		$show = 1;

		if($_GET['search_name'] != '' && $show != 0){
			if($get['name'] == $_GET['search_name']){
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
				//$res .= "+";
			}else{
				$show = 0;
				//$res .= "-";
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

		if($_GET['search_count_athletes_end_with'] != '' && $show != 0){
			if($count_athletes_end >= $_GET['search_count_athletes_end_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_athletes_end_to'] != '' && $show != 0){
			if($count_athletes_end <= $_GET['search_count_athletes_end_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_rate_with'] != '' && $show != 0){
			if($rate >= $_GET['search_rate_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_rate_to'] != '' && $show != 0){
			if($rate <= $_GET['search_rate_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_cost_with'] != '' && $show != 0){
			if($all_route_price >= $_GET['search_cost_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_cost_to'] != '' && $show != 0){
			if($all_route_price <= $_GET['search_cost_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_type'] != '' && $_GET['search_type'] != 'all' && $show != 0){
			$search_type = $_GET['search_type'][0];
			if($type == $search_type){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_cp_with'] != '' && $show != 0){
			if($count_cp >= $_GET['search_count_cp_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_count_cp_to'] != '' && $show != 0){
			if($count_cp <= $_GET['search_count_cp_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_method'] != '' && $_GET['search_method'] != 'all' && $show != 0){
			$search_method = $_GET['search_method'][0];
			if($method == $search_method){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_terra'] != '' && $_GET['search_terra'] != 'all' && $show != 0){
			$search_terra = $_GET['search_terra'][0];
			if($terra == $search_terra){
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

		if($_GET['search_route_tips_with'] != '' && $show != 0){
			if($route_tips >= $_GET['search_route_tips_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_route_tips_to'] != '' && $show != 0){
			if($route_tips <= $_GET['search_route_tips_to']){
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

		if($_GET['search_route_hints_with'] != '' && $show != 0){
			if($route_hints >= $_GET['search_route_hints_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_route_hints_to'] != '' && $show != 0){
			if($route_hints <= $_GET['search_route_hints_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_route_all_sum_with'] != '' && $show != 0){
			if($route_all_sum >= $_GET['search_route_all_sum_with']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_route_all_sum_to'] != '' && $show != 0){
			if($route_all_sum <= $_GET['search_route_all_sum_to']){
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
			if($coach_nikname == $_GET['search_coach_sum_to']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_coach_nikname'] != '' && $_GET['search_coach_nikname'] != 'all' && $show != 0){
			if($coach_sum <= $_GET['search_coach_nikname']){
				$show = 1;
			}else{
				$show = 0;
			}
		}

		if($_GET['search_last_date_end'] != '' && $show != 0){
			$search_last_date_end = $_GET['search_last_date_end'];
			$search_last_date_end = explode(" - ", $search_last_date_end);
			$last_date = strtotime(date("Y-m-d", strtotime($last_date_end)));
			$with_date = strtotime($search_last_date_end[0]);
			$to_date = strtotime($search_last_date_end[1]);
			if($last_date >= $with_date && $last_date <= $to_date){
				$show = 1;
			}else{
				$show = 0;	
			}
		}

		if($_GET['search_create_date_route'] != '' && $show != 0){
			$search_create_date_route = $_GET['search_create_date_route'];
			$search_create_date_route = explode(" - ", $search_create_date_route);
			$create_date = strtotime(date("Y-m-d", strtotime($create_date_route)));
			$with_date = strtotime($search_create_date_route[0]);
			$to_date = strtotime($search_create_date_route[1]);
			if($create_date >= $with_date && $create_date <= $to_date){
				$show = 1;
			}else{
				$show = 0;	
			}
		}

		if($last_date_end != ''){
			$last_date_end = date("d.m.Y", strtotime($last_date_end));
		}else{
			$last_date_end = '';
		}

		if($create_date_route != ''){
			$create_date_route = date("d.m.Y", strtotime($create_date_route));
		}else{
			$create_date_route = '';
		}
		
		if($show == 1){
			$res .= "+";
			$start = $row;
			$end = $row + $rowperpage;

			if($while_counter >= $start && $while_counter < $end){
				$data[$while_counter][0] = $get['name'];
				$data[$while_counter][1] = $get['country'];
				$data[$while_counter][2] = $get['region'];
				$data[$while_counter][3] = intval($profit_sum);
		        $data[$while_counter][4] = $count_athletes_end;
		        $data[$while_counter][5] = $rate;
		        $data[$while_counter][6] = $get['cost'];
		        $data[$while_counter][7] = $type;
		        $data[$while_counter][8] = $count_cp;
		        $data[$while_counter][9] = $method;
		        $data[$while_counter][10] = $terra;
		        $data[$while_counter][11] = intval($route_sum);
		        $data[$while_counter][12] = intval($route_tips);
		        $data[$while_counter][13] = intval($procent_tips) . "%";
		        $data[$while_counter][14] = intval($route_hints);
		        $data[$while_counter][15] = intval($route_all_sum);
		        $data[$while_counter][16] = intval($coach_sum);
		        $data[$while_counter][17] = $coach_nikname;
		        $data[$while_counter][18] = $last_date_end;
		        $data[$while_counter][19] = $create_date_route;
		        $data[$while_counter][20] = $actions_html;

		        $totalRecordwithFilter++;
		    }

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