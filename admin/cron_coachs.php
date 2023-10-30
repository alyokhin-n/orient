<?php 
	$link = mysqli_connect("dncompany.fun", "admin_dncompany", "C(CWS7AH*n9R", "admin_dncompany", 3306);	
	
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$link->set_charset("utf8");

	$selectStatus = mysqli_query($link,"SELECT * FROM cron_status WHERE id = '1'");
	$getStatus = mysqli_fetch_array($selectStatus);

	if ($getStatus['status'] == 1)
	{
		$updStatus = mysqli_query($link,"UPDATE cron_status SET date_start = NOW(), status = '0' WHERE id = '1'");

		$select_percent_coach = mysqli_query($link, "SELECT * FROM in_constants WHERE name = 'coach_percent'");
		$get_percent_coach = mysqli_fetch_array($select_percent_coach);

		$percent_coach = $get_percent_coach['value'];

		$delete = mysqli_query($link, "DELETE FROM in_coachs");

		$sql = "SELECT * FROM in_clients WHERE id IN (SELECT client_id FROM in_routes)";

		$select = mysqli_query($link, $sql);
		$data = array();
		while ($get = mysqli_fetch_array($select)){

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
				$paysera_address = $get['paysera_address'];
			}
			
			$select_first_route = mysqli_query($link, "SELECT MIN(created_date) as min_date FROM in_routes WHERE client_id = '$get[id]'");
			$get_first_route = mysqli_fetch_array($select_first_route);

			if($get_first_route['min_date'] != ''){
				$first_date_route = $get_first_route['min_date'];
			}else{
				$first_date_route = "";
			}

			$select_cost_not_null = mysqli_query($link, "SELECT * FROM in_routes WHERE client_id = '$get[id]' AND cost > 0");
			$count_cost_not_null = mysqli_num_rows($select_cost_not_null);

			$select_cost_null = mysqli_query($link, "SELECT * FROM in_routes WHERE client_id = '$get[id]' AND cost = 0");
			$count_cost_null = mysqli_num_rows($select_cost_null);

			$all_route_price = 0;
			$all_route_tips = 0;
			$all_route_hints = 0;

			$select_routes = mysqli_query($link, "SELECT * FROM in_routes WHERE client_id = '$get[id]'");
			while($get_routes = mysqli_fetch_array($select_routes)){
				$select_route_end = mysqli_query($link, "SELECT * FROM in_routes_end WHERE route_id = '$get_routes[id]' AND paid = 'true'");
				$count_route_end = mysqli_num_rows($select_route_end);

				$all_route_price += $get_routes['cost'] * $count_route_end;

				if($count_route_end > 0){
					while($get_route_end = mysqli_fetch_array($select_route_end)){
						if($get_route_end['tips'] > 0){
							$all_route_tips += $get_route_end['tips'];
						}
					}
				}

				$select_all_hints = mysqli_query($link, "SELECT * FROM in_hints_log WHERE route_id = '$get_routes[id]'");
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

			$procent_tips = $all_route_tips / $all_route_price * 100;

			$select_avg_rate = mysqli_query($link, "SELECT AVG(rate) as avg_rate FROM in_routes_end WHERE route_id IN (SELECT id FROM in_routes WHERE client_id = '$get[id]')");
			if(mysqli_num_rows($select_avg_rate) > 0){
				$get_avg_rate = mysqli_fetch_array($select_avg_rate);

				$avg_rate = $get_avg_rate['avg_rate'];
			}else{
				$avg_rate = 0;
			}

			$profit_sum = ($all_route_price + $all_route_tips) * $percent_coach / 100 + $all_route_hints;

			$client_id = mysqli_real_escape_string($link, $get['id']);
			$nikname = mysqli_real_escape_string($link, $get['nikname']);
			$country = mysqli_real_escape_string($link, $get['country']);
			$region = mysqli_real_escape_string($link, $get['region']);
			$first_date_route = mysqli_real_escape_string($link, $first_date_route);
			$count_cost_not_null = mysqli_real_escape_string($link, $count_cost_not_null);
			$count_cost_null = mysqli_real_escape_string($link, $count_cost_null);
			$all_route_price = mysqli_real_escape_string($link, $all_route_price);
			$all_route_tips = mysqli_real_escape_string($link, $all_route_tips);
			$all_route_hints = mysqli_real_escape_string($link, $all_route_hints);
			$all_route_sum = mysqli_real_escape_string($link, $all_route_sum);
			$procent_tips = mysqli_real_escape_string($link, $procent_tips);
			$pay_sum = mysqli_real_escape_string($link, $pay_sum);
			$no_pay_sum = mysqli_real_escape_string($link, $no_pay_sum);
			// $last_pay_date = mysqli_real_escape_string($link, $last_pay_date);
			$all_sum = mysqli_real_escape_string($link, $all_sum);
			$route_bad = mysqli_real_escape_string($link, $route_bad);
			$avg_rate = mysqli_real_escape_string($link, $avg_rate);
			$profit_sum = mysqli_real_escape_string($link, $profit_sum);

			$update_coach = mysqli_query($link, "UPDATE in_clients SET no_pay_sum = '$no_pay_sum' WHERE id = '$client_id'");

			echo "INSERT INTO in_coachs (client_id,nikname,country,region,first_date_route,count_cost_not_null,count_cost_null,all_route_price,all_route_tips,all_route_hints,all_route_sum,procent_tips,pay_sum,no_pay_sum,last_pay_date,all_sum,route_bad,avg_rate,profit_sum,update_date) VALUES ('$client_id','$nikname','$country','$region','$first_date_route','$count_cost_not_null','$count_cost_null','$all_route_price','$all_route_tips','$all_route_hints','$all_route_sum','$procent_tips','$pay_sum','$no_pay_sum','$last_pay_date','$all_sum','$route_bad','$avg_rate','$profit_sum',NOW())<br>";

			$insert = mysqli_query($link, "INSERT INTO in_coachs (client_id,nikname,country,region,first_date_route,count_cost_not_null,count_cost_null,all_route_price,all_route_tips,all_route_hints,all_route_sum,procent_tips,pay_sum,no_pay_sum,last_pay_date,all_sum,route_bad,avg_rate,profit_sum,paysera_address,update_date) VALUES ('$client_id','$nikname','$country','$region','$first_date_route','$count_cost_not_null','$count_cost_null','$all_route_price','$all_route_tips','$all_route_hints','$all_route_sum','$procent_tips','$pay_sum','$no_pay_sum','$last_pay_date','$all_sum','$route_bad','$avg_rate','$profit_sum','$paysera_address',NOW())");
		}

		$cronNow2 = date("Y-m-d H:i:s");
		$updStatus = mysqli_query($link,"UPDATE cron_status SET date_end = NOW(), status = '1' WHERE id = '1'");
	}

	mysqli_close($link);
?>