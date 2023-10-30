<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php"); 

	$draw = $_POST['draw'];
	$row = $_POST['start'];
	$rowperpage = $_POST['length']; // Rows display per page
	$columnIndex = $_POST['order'][0]['column']; // Column index
	$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
	$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
	$searchValue = $_POST['search']['value']; // Search value

	$q = "";

	if(!empty($searchValue)){
		$q .= " AND (users.name LIKE '%$searchValue%' OR users.email LIKE '%$searchValue%' OR users.username LIKE '%$searchValue%' OR users.role_name LIKE '%$searchValue%' OR users.status_name LIKE '%$searchValue%')";
	}
    
    $sql = "SELECT * FROM in_clients WHERE id IN (SELECT client_id FROM in_routes_end)";

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_clients WHERE id IN (SELECT client_id FROM in_routes_end) AND id NOT IN (SELECT client_id FROM in_routes)");
	$records = mysqli_fetch_array($sel);
	$totalRecords = $records['allcount'];

	$sel = mysqli_query($link, "SELECT COUNT(*) as allcount FROM in_clients WHERE id IN (SELECT client_id FROM in_routes_end) AND id NOT IN (SELECT client_id FROM in_routes)");
	$records = mysqli_fetch_array($sel);
	$totalRecordwithFilter = $records['allcount'];

	$while_counter = 0;

	$select = mysqli_query($link, $sql);	
	$json['data'] = [];	
	$data = array();
	while ($get = mysqli_fetch_array($select)){
		
		$select_first_end = mysqli_query($link, "SELECT MIN(create_time) as first_date, SUM(tips) as tips, COUNT(*) as count, AVG(rate) as avg_rate FROM in_routes_end WHERE client_id = '$get[id]'");
		$get_first_end = mysqli_fetch_array($select_first_end);

		if($get_first_end['first_date'] != ''){
			$first_date_end = date("d.m.Y H:i:s", strtotime($get_first_end['first_date']));
		}else{
			$first_date_end = 0;
		}

		if($get_first_end['tips'] != ''){
			$all_tips = $get_first_end['tips'];
		}else{
			$all_tips = 0;
		}

		if($get_first_end['count'] != ''){
			$all_end_count = $get_first_end['count'];
		}else{
			$all_end_count = 0;
		}

		if($get_first_end['avg_rate'] != ''){
			$avg_rate = $get_first_end['avg_rate'];
		}else{
			$avg_rate = 0;
		}

		$all_end_count_no_pay = 0;
		$all_end_count_free = 0;
		$all_end_sum = 0;
		$all_end_count_cost = 0;

		$select_end_routes = mysqli_query($link, "SELECT * FROM in_routes_end WHERE client_id = '$get[id]'");
		while($get_end_routes = mysqli_fetch_array($select_end_routes)){
			$select_route = mysqli_query($link, "SELECT * FROM in_routes WHERE id = '$get_end_routes[route_id]'");
			$get_route = mysqli_fetch_array($select_route);

			if($get_end_routes['paid'] != 'true' && $get_route['cost'] > 0){
				$all_end_count_no_pay++;
			}

			if($get_route['cost'] == 0){
				$all_end_count_free++;
			}

			if($get_route['cost'] > 0){
				$all_end_sum += $get_route['cost'];
				$all_end_count_cost++;
			}
		}

		$select_all_hints = mysqli_query($link, "SELECT * FROM in_hints_log WHERE route_id IN (SELECT route_id FROM in_routes_end WHERE client_id = '$get[id]') AND client_id = '$get[id]'");
		if(mysqli_num_rows($select_all_hints) > 0){
			$all_hints = 0;
			while($get_all_hints = mysqli_fetch_array($select_all_hints)){
				$select_route_hint = mysqli_query($link, "SELECT hint_price FROM in_routes WHERE id = '$get_all_hints[route_id]'");
				$get_route_hint = mysqli_fetch_array($select_route_hint);
				$all_hints += $get_route_hint['hint_price'];
			}
		}else{
			$all_hints = 0;
		}

		$all_price = $all_end_sum + $all_tips + $all_hints;

		if($get['banned'] == 1){
			$ban_html = "<span class='badge badge-pill badge-soft-danger'>Да</span><a class='badge badge-pill badge-soft-success delban' data-id='".$get['id']."' style='cursor:pointer;'>Снять бан</a>";
		}else{
			$ban_html = "<span class='badge badge-pill badge-soft-success'>Нет</span><a class='badge badge-pill badge-soft-danger banuser' data-id='".$get['id']."' style='cursor:pointer;'>Забанить</a>";
		}

		$actions_html = "
			<a class='btn btn-warning waves-effect waves-light btn-xs' href='?edit=".$get['id']."' style='font-size: 10px;'>Редактировать</a>
			<a class='btn btn-info waves-effect waves-light btn-xs changePhoto' data-id='".$get['id']."' style='font-size: 9px;padding: 1px 1px;margin-top: 5px;'>Поставить стандартную аватарку</a>
			<a class='btn btn-danger waves-effect waves-light btn-xs deleteuser' data-id='".$get['id']."' data-toggle='modal'  data-target='#exampleModalWarning' style='font-size: 10px;margin-top: 5px;'>Удалить</a>
		";

		$data[$while_counter][0] = $get['nikname'];
		$data[$while_counter][1] = $get['country'];
		$data[$while_counter][2] = $get['region'];
		$data[$while_counter][3] = $first_date_end;
        $data[$while_counter][4] = $get['balance'];
        $data[$while_counter][5] = $all_end_sum;
        $data[$while_counter][6] = $all_tips;
        $data[$while_counter][7] = $all_hints;
        $data[$while_counter][8] = $all_price;
        $data[$while_counter][9] = $all_end_count;
        $data[$while_counter][10] = $all_end_count_cost;
        $data[$while_counter][11] = $all_end_count_free;
        $data[$while_counter][12] = $all_end_count_no_pay;
        $data[$while_counter][13] = "0";
        $data[$while_counter][14] = number_format($avg_rate, 2, '.', '');
        $data[$while_counter][15] = $ban_html;
        $data[$while_counter][16] = $actions_html;

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