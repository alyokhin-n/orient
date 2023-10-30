<?php 
	$link = mysqli_connect("dncompany.fun", "admin_dncompany", "C(CWS7AH*n9R", "admin_dncompany", 3306);	
	
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$link->set_charset("utf8");

	$selectStatus = mysqli_query($link,"SELECT * FROM cron_status WHERE id = '2'");
	$getStatus = mysqli_fetch_array($selectStatus);

	if ($getStatus['status'] == 1)
	{
		$updStatus = mysqli_query($link,"UPDATE cron_status SET date_start = NOW(), status = '0' WHERE id = '2'");

		$select_percent_coach = mysqli_query($link, "SELECT * FROM in_constants WHERE name = 'coach_percent'");
		$get_percent_coach = mysqli_fetch_array($select_percent_coach);

		$percent_coach = $get_percent_coach['value'];

		$delete = mysqli_query($link, "DELETE FROM in_atheletes");

		$sql = "SELECT * FROM in_clients WHERE id IN (SELECT client_id FROM in_routes_end)";
		$select = mysqli_query($link, $sql);

		while ($get = mysqli_fetch_array($select)){
			$procent_tips = 0;
			$route_bad = 0;
			$avg_rate = 0;
			$profit_sum = 0;

			$select_first_end = mysqli_query($link, "SELECT MIN(create_time) as first_date, SUM(tips) as tips, COUNT(*) as count, AVG(rate) as avg_rate FROM in_routes_end WHERE client_id = '$get[id]'");
			$get_first_end = mysqli_fetch_array($select_first_end);

			if($get_first_end['first_date'] != ''){
				$first_date_route = date("d.m.Y H:i:s", strtotime($get_first_end['first_date']));
			}else{
				$first_date_route = '';
			}

			if($get_first_end['tips'] != ''){
				$all_wasted_tips = $get_first_end['tips'];
			}else{
				$all_wasted_tips = 0;
			}

			if($get_first_end['count'] != ''){
				$count_route_end = $get_first_end['count'];
			}else{
				$count_route_end = 0;
			}

			if($get_first_end['avg_rate'] != ''){
				$avg_rate = $get_first_end['avg_rate'];
			}else{
				$avg_rate = 0;
			}

			$count_route_no_paid = 0;
			$count_route_free = 0;
			$all_wasted_route = 0;
			$count_route_paid = 0;

			$select_end_routes = mysqli_query($link, "SELECT * FROM in_routes_end WHERE client_id = '$get[id]'");
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
			}

			$select_all_hints = mysqli_query($link, "SELECT * FROM in_hints_log WHERE route_id IN (SELECT route_id FROM in_routes_end WHERE client_id = '$get[id]') AND client_id = '$get[id]'");
			if(mysqli_num_rows($select_all_hints) > 0){
				$all_wasted_hints = 0;
				while($get_all_hints = mysqli_fetch_array($select_all_hints)){
					$select_route_hint = mysqli_query($link, "SELECT hint_price FROM in_routes WHERE id = '$get_all_hints[route_id]'");
					$get_route_hint = mysqli_fetch_array($select_route_hint);
					$all_wasted_hints += $get_route_hint['hint_price'];
				}
			}else{
				$all_wasted_hints = 0;
			}

			$procent_tips = $all_wasted_tips / $all_wasted_route * 100;

			$all_wasted_sum = $all_wasted_route + $all_wasted_tips + $all_wasted_hints;

			$profit_sum = ($all_wasted_route + $all_wasted_tips) * $percent_coach / 100 + $all_wasted_hints;

			$client_id = mysqli_real_escape_string($link, $get['id']);
			$nikname = mysqli_real_escape_string($link, $get['nikname']);
			$country = mysqli_real_escape_string($link, $get['country']);
			$region = mysqli_real_escape_string($link, $get['region']);
			$first_date_route = mysqli_real_escape_string($link, $first_date_route);
			$balance = mysqli_real_escape_string($link, $get['balance']);
			$all_wasted_route = mysqli_real_escape_string($link, $all_wasted_route);
			$all_wasted_tips = mysqli_real_escape_string($link, $all_wasted_tips);
			$all_wasted_hints = mysqli_real_escape_string($link, $all_wasted_hints);
			$all_wasted_sum = mysqli_real_escape_string($link, $all_wasted_sum);
			$procent_tips = mysqli_real_escape_string($link, $procent_tips);
			$count_route_end = mysqli_real_escape_string($link, $count_route_end);
			$count_route_paid = mysqli_real_escape_string($link, $count_route_paid);
			$count_route_free = mysqli_real_escape_string($link, $count_route_free);
			$count_route_no_paid = mysqli_real_escape_string($link, $count_route_no_paid);
			$route_bad = mysqli_real_escape_string($link, $route_bad);
			$avg_rate = mysqli_real_escape_string($link, $avg_rate);
			$profit_sum = mysqli_real_escape_string($link, $profit_sum);

			$query = "
			INSERT INTO in_atheletes
			(
				client_id,
				nikname,
				country,
				region,
				first_date_route,
				balance,
				all_wasted_route,
				all_wasted_tips,
				all_wasted_hints,
				all_wasted_sum,
				procent_tips,
				count_route_end,
				count_route_paid,
				count_route_free,
				count_route_no_paid,
				route_bad,
				avg_rate,
				profit_sum,
				update_date 
			)
			VALUES
			(
				'$client_id',
				'$nikname',
				'$country',
				'$region',
				'$first_date_route',
				'$balance',
				'$all_wasted_route',
				'$all_wasted_tips',
				'$all_wasted_hints',
				'$all_wasted_sum',
				'$procent_tips',
				'$count_route_end',
				'$count_route_paid',
				'$count_route_free',
				'$count_route_no_paid',
				'$route_bad',
				'$avg_rate',
				'$profit_sum',
				NOW()
			)
			";

			$insert = mysqli_query($link, $query);

			echo $query . "<br>";
		}

		$cronNow2 = date("Y-m-d H:i:s");
		$updStatus = mysqli_query($link,"UPDATE cron_status SET date_end = NOW(), status = '1' WHERE id = '2'");
	}

	mysqli_close($link);
?>