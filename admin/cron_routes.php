<?php
	$link = mysqli_connect("dncompany.fun", "admin_dncompany", "C(CWS7AH*n9R", "admin_dncompany", 3306);	
	
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$link->set_charset("utf8");

	$selectStatus = mysqli_query($link,"SELECT * FROM cron_status WHERE id = '3'");
	$getStatus = mysqli_fetch_array($selectStatus);

	if ($getStatus['status'] == 1)
	{
		$updStatus = mysqli_query($link,"UPDATE cron_status SET date_start = NOW(), status = '0' WHERE id = '3'");

		$select_percent_coach = mysqli_query($link, "SELECT * FROM in_constants WHERE name = 'coach_percent'");
		$get_percent_coach = mysqli_fetch_array($select_percent_coach);

		$percent_coach = $get_percent_coach['value'];

		$delete = mysqli_query($link, "DELETE FROM in_routes_report");

		$sql = "SELECT * FROM in_routes";

		$select = mysqli_query($link, $sql);
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

			$select_points = mysqli_query($link, "SELECT * FROM in_routes_points WHERE route_id = '$route_id' GROUP BY point_id");
			$count_cp = mysqli_num_rows($select_points);

			$select_last_route = mysqli_query($link, "SELECT MAX(create_time) as max_date, COUNT(*) as count, SUM(tips) as tips, AVG(rate) as rate FROM in_routes_end WHERE route_id = '$route_id'");
			$get_last_route = mysqli_fetch_array($select_last_route);

			if($get_last_route['max_date'] != ''){
				$last_date_end = $get_last_route['max_date'];
			}else{
				$last_date_end = "";
			}

			$rate = $get_last_route['rate'];
			$route_sum = $cost * $get_last_route['count'];
			$route_tips = $get_last_route['tips'];
			$count_athletes_end = $get_last_route['count'];

			if($route_tips > 0){
				$procent_tips = $route_tips / $route_sum * 100;
			}

			$select_all_hints = mysqli_query($link, "SELECT * FROM in_hints_log WHERE route_id = '$route_id'");
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

			$route_id = mysqli_real_escape_string($link, $route_id);
			$name = mysqli_real_escape_string($link, $route_name);
			$country = mysqli_real_escape_string($link, $country);
			$region = mysqli_real_escape_string($link, $region);
			$profit_sum = mysqli_real_escape_string($link, $profit_sum);
			$count_athletes_end = mysqli_real_escape_string($link, $count_athletes_end);
			$rate = mysqli_real_escape_string($link, $rate);
			$cost = mysqli_real_escape_string($link, $cost);
			$type = mysqli_real_escape_string($link, $type);
			$theme = mysqli_real_escape_string($link, $theme);
			$count_cp = mysqli_real_escape_string($link, $count_cp);
			$method = mysqli_real_escape_string($link, $method);
			$terra = mysqli_real_escape_string($link, $terra);
			$route_sum = mysqli_real_escape_string($link, $route_sum);
			$route_tips = mysqli_real_escape_string($link, $route_tips);
			$procent_tips = mysqli_real_escape_string($link, $procent_tips);
			$route_hints = mysqli_real_escape_string($link, $route_hints);
			$route_all_sum = mysqli_real_escape_string($link, $route_all_sum);
			$coach_sum = mysqli_real_escape_string($link, $coach_sum);
			$coach_id = mysqli_real_escape_string($link, $coach_id);
			$coach_nikname = mysqli_real_escape_string($link, $coach_nikname);
			$last_date_end = mysqli_real_escape_string($link, $last_date_end);
			$create_date_route = mysqli_real_escape_string($link, $create_date_route);

			$query = "
			INSERT INTO in_routes_report
			(
				route_id,
				name,
				country,
				region,
				profit_sum,
				count_athletes_end,
				rate,
				cost,
				type,
				theme,
				count_cp,
				method,
				terra,
				route_sum,
				route_tips,
				procent_tips,
				route_hints,
				route_all_sum,
				coach_sum,
				coach_id,
				coach_nikname,
				last_date_end,
				create_date_route,
				update_date
			)
			VALUES
			(
				'$route_id',
				'$name',
				'$country',
				'$region',
				'$profit_sum',
				'$count_athletes_end',
				'$rate',
				'$cost',
				'$type',
				'$theme',
				'$count_cp',
				'$method',
				'$terra',
				'$route_sum',
				'$route_tips',
				'$procent_tips',
				'$route_hints',
				'$route_all_sum',
				'$coach_sum',
				'$coach_id',
				'$coach_nikname',
				'$last_date_end',
				'$create_date_route',
				NOW()
			)
			";

			$insert = mysqli_query($link, $query);

			echo $query . "<br>";
		}

		$cronNow2 = date("Y-m-d H:i:s");
		$updStatus = mysqli_query($link,"UPDATE cron_status SET date_end = NOW(), status = '1' WHERE id = '3'");
	}

	mysqli_close($link);
?>