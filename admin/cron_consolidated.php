<?php 
	$link = mysqli_connect("dncompany.fun", "admin_dncompany", "C(CWS7AH*n9R", "admin_dncompany", 3306);	
	
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$link->set_charset("utf8");

	$selectStatus = mysqli_query($link,"SELECT * FROM cron_status WHERE id = '4'");
	$getStatus = mysqli_fetch_array($selectStatus);

	if ($getStatus['status'] == 1)
	{
		$updStatus = mysqli_query($link,"UPDATE cron_status SET date_start = NOW(), status = '0' WHERE id = '4'");

		$select_percent_coach = mysqli_query($link, "SELECT * FROM in_constants WHERE name = 'coach_percent'");
		$get_percent_coach = mysqli_fetch_array($select_percent_coach);

		$percent_coach = $get_percent_coach['value'];

		$delete = mysqli_query($link, "DELETE FROM in_consolidated");


		$select = mysqli_query($link, "SELECT * FROM in_routes GROUP BY country, region");
		while($get = mysqli_fetch_array($select)){
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

			$select_routes = mysqli_query($link, "SELECT * FROM in_routes WHERE country = '$country' AND region = '$region'");
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

				$select_all_hints = mysqli_query($link, "SELECT * FROM in_hints_log WHERE route_id = '$get_routes[id]'");
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

			$select_count_coachs = mysqli_query($link, "SELECT * FROM in_routes WHERE country = '$country' AND region = '$region' GROUP BY client_id");
			$count_create_route = mysqli_num_rows($select_count_coachs);

			$select_count_athletes = mysqli_query($link, "SELECT * FROM in_routes_end WHERE route_id IN (SELECT id FROM in_routes WHERE country = '$country' AND region = '$region') GROUP BY client_id");
			$count_route_end = mysqli_num_rows($select_count_athletes);

			$all_sum = $route_sum + $tips_sum + $hints_sum;

			$procent_tips = $tips_sum / $route_sum * 100;

			$coach_sum = ($route_sum + $tips_sum) * $percent_coach / 100;

			$profit_sum = $all_sum - $coach_sum;

			$select_clients = mysqli_query($link, "SELECT SUM(balance) as sum FROM in_clients WHERE country = '$country' AND region = '$region'");
			$get_clients = mysqli_fetch_array($select_clients);

			if($get_clients['sum'] > 0){
				$balance = $get_clients['sum'];
			}

			$query = "
			INSERT INTO in_consolidated
			(
				country,
				region,
				profit_sum,
				route_sum,
				tips_sum,
				procent_tips,
				hints_sum,
				all_sum,
				coach_sum,
				balance,
				count_route_end,
				count_create_route,
				count_free_route,
				count_paid_route,
				count_route_end_free,
				count_paid_route_cost,
				count_no_paid_route,
				bad_route,
				update_date 
			)
			VALUES
			(
				'$country',
				'$region',
				'$profit_sum',
				'$route_sum',
				'$tips_sum',
				'$procent_tips',
				'$hints_sum',
				'$all_sum',
				'$coach_sum',
				'$balance',
				'$count_route_end',
				'$count_create_route',
				'$count_free_route',
				'$count_paid_route',
				'$count_route_end_free',
				'$count_paid_route_cost',
				'$count_no_paid_route',
				'$bad_route',
				NOW()
			)
			";

			$insert = mysqli_query($link, $query);

			echo $query . "<br>";
		}

		$cronNow2 = date("Y-m-d H:i:s");
		$updStatus = mysqli_query($link,"UPDATE cron_status SET date_end = NOW(), status = '1' WHERE id = '4'");
	}

	mysqli_close($link);
?>