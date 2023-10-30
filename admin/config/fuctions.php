<?php 
	function insertLog($type, $operation, $user)
	{
		global $link;
		$insert = mysqli_query($link, "INSERT INTO logs (type, operation, user) VALUES ('$type','$operation','$user')");
	}

	function checkNickName($nickname)
	{
		global $link;
		$check_nick = mysqli_query($link, "SELECT * FROM in_clients WHERE nikname = '$nickname'");
		$num_check = mysqli_num_rows($check_nick);
		if($num_check > 0){
			return 0;
		}else{
			return 1;
		}
	}

	function createNickName($nickname)
	{
		$check = checkNickName($nickname);
		if($check == 0){
			$nickname = $nickname . "1";
			$check = checkNickName($nickname);
			if($check == 0){
				while(1){
					$get_last = substr($nickname, -1);
					$get_last++;
					$nickname = substr_replace($nickname,$get_last,-1);
					$check = checkNickName($nickname);
					if($check == 1){
						break;
					}
				}
				return $nickname;
			}else{
				return $nickname;
			}
		}else{
			return $nickname;
		}
	}

	function createNamePoint()
	{
		global $link;
		// $check_log = mysqli_query($link, "SELECT * FROM in_delete_cp_log ORDER BY id LIMIT 1");
		// if(mysqli_num_rows($check_log) > 0){
		// 	$get_log = mysqli_fetch_array($check_log);
		// 	return $get_log['name'];
		// }else{
			$check_name = mysqli_query($link, "SELECT * FROM in_control_points ORDER BY id DESC LIMIT 1");
			$num_check = mysqli_num_rows($check_name);
			if($num_check > 0){
				$get_name = mysqli_fetch_array($check_name);
				$name = $get_name['name'];
				$letters = substr($name, 0, 2);
				$numbers = substr($name, 2);

				$letter_one = $letters[0];
				$letter_two = $letters[1];

				$number_one = $numbers[0];
				$number_two = $numbers[1];
				$number_three = $numbers[2];
				$number_four = $numbers[3];
				if($numbers != 9999){

					if($number_one == 0 && $number_two == 0 && $number_three == 0 && $number_four == 0 || ($number_four != 0 && $number_four != 9)){
						$number_four = $number_four + 1;
					}elseif($number_one == 0 && $number_two == 0 && $number_three == 0 && $number_four == 9){
						$number_three = $number_three + 1;
						$number_four = 0;
					}elseif($number_one == 0 && $number_two == 0 && $number_three != 0 && $number_three != 9 && $number_four != 9){
						$number_four = $number_four + 1;
					}elseif($number_one == 0 && $number_two == 0 && $number_three != 0 && $number_three != 9 && $number_four == 9){
						$number_three = $number_three + 1;
						$number_four = 0;
					}elseif($number_one == 0 && $number_two == 0 || ($number_two != 0 && $number_two != 9) && $number_three == 9 && $number_four == 9){
						$number_two = $number_two + 1;
						$number_three = 0;
						$number_four = 0;
					}elseif($number_one == 0 && $number_two != 0 && $number_two != 9 && $number_three == 0 && $number_four == 0 || ($number_four != 0 && $number_four != 9)){
						$number_four = $number_four + 1;
					}elseif($number_one == 0 && $number_two != 0 && $number_two != 9 && $number_three == 0 || ($number_three != 0  && $number_three != 9) && $number_four == 9){
						$number_three = $number_three + 1;
						$number_four = 0;
					}elseif($number_one == 0 && $number_two != 0 && $number_two != 9 && $number_three != 0  && $number_three != 9 && $number_four != 0 && $number_four != 9){
						$number_four = $number_four + 1;
					}elseif($number_one == 0 && $number_two != 0 && $number_two != 9 && $number_three == 9 && $number_four == 0 || ($number_four != 0 && $number_four != 9)){
						$number_four = $number_four + 1;
					}elseif($number_one == 0 && $number_two == 9 && $number_three == 9 && $number_four == 9){
						$number_one = $number_one + 1;
						$number_two = 0;
						$number_three = 0;
						$number_four = 0;
					}elseif($number_one != 0 && $number_one != 9){
						$numbers2 = substr($name, 2);
						$numbers2 = $numbers2 + 1;
						$numbers2 = (string)$numbers2;
						$number_one = $numbers2[0];
						$number_two = $numbers2[1];
						$number_three = $numbers2[2];
						$number_four = $numbers2[3];
					}

				}else{
					$alphas = range('A', 'Z');
					
					if($letter_two != 'Z' && $letter_one != 'Z'){
						$key = array_search($letter_two, $alphas);
						$key = $key + 1;
						$letter_two = $alphas[$key];
						$number_one = 0;
						$number_two = 0;
						$number_three = 0;
						$number_four = 0;
					}elseif($letter_two == 'Z' && $letter_one != 'Z'){
						$key = array_search($letter_one, $alphas);
						$key = $key + 1;
						$letter_one = $alphas[$key];
						$letter_two = $alphas[0];
						$number_one = 0;
						$number_two = 0;
						$number_three = 0;
						$number_four = 0;
					}elseif($letter_two != 'Z' && $letter_one == 'Z'){
						$key = array_search($letter_two, $alphas);
						$key = $key + 1;
						$letter_two = $alphas[$key];
						$number_one = 0;
						$number_two = 0;
						$number_three = 0;
						$number_four = 0;
					}elseif($letter_two == 'Z' && $letter_one == 'Z'){
						return "No free titles";
					}
				}
				return $letter_one . $letter_two . $number_one . $number_two . $number_three . $number_four;
			}else{
				return "AA0000";
			}
		//}
	}
?>