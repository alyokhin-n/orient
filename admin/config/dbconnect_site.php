<?php 
	$link = mysqli_connect("localhost", "Dima2357Liatsevych_database", "qJwaQyZOn1PHrVk5", "Dima2357Liatsevych_orienteering", 3306);	
	
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$link->set_charset("utf8");
	
	session_start();	
	if ($_SESSION['session'] == "")
	{
		$mt_rand = mt_rand(100000, 1000000000);
		$_SESSION['session'] = $mt_rand;
	}
	
	if ($_SESSION['client'] != "")
	{
		global $user_name;
		global $user_id;
		global $user_email;
		global $user_role;
		$selectClient = "SELECT * FROM in_clients WHERE id = '$_SESSION[user]'";
		$selectClient = mysqli_query($link, $selectClient);
		$getClient = mysqli_fetch_array($selectClient);

		$user_id = $getClient['id'];
	}
	
	if ($_GET['logout'] == 1)
	{
		session_destroy();
		$_SESSION['client'] = '';
		header('Location: /');
		exit;
	}
	
	function rus2translit($string) {
		$converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        'і' => 'i', 'ь' => '',
		
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
		);
		return strtr($string, $converter);
	}
	function str2url($str) {
		// переводим в транслит
		$str = rus2translit($str);
		// в нижний регистр
		$str = strtolower($str);
		// заменям все ненужное нам на "-"
		$str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
		// удаляем начальные и конечные '-'
		$str = trim($str, "-");
		return $str;
	}	
	
	function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
	
	function send($method, $data) {
		$url = "https://api.telegram.org/bot1636502098:AAEdwD37aP50E4hmStHz77Prdcyota_7yPM" . "/" . $method;
		
		if (!$curld = curl_init()) {
			exit;
		}
		curl_setopt($curld, CURLOPT_POST, true);
		curl_setopt($curld, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curld, CURLOPT_URL, $url);
		curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($curld);
		curl_close($curld);
		return $output;
	}
	
	$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
	$uri_parts = $uri_parts[0];
	
	$sitename = "Спорт Ориентирование";
?>