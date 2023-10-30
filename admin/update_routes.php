<!-- <?php
	include("config/dbconnect.php");


	$select_routes = mysqli_query($link, "SELECT * FROM in_routes WHERE country IS NULL AND region IS NULL");
	while($get_routes = mysqli_fetch_array($select_routes)){
		$route_id = $get_routes['id'];

		$select_first_point = mysqli_query($link, "SELECT * FROM in_routes_points WHERE marker_id = '0' AND route_id = '$route_id'");
		$get_first_point = mysqli_fetch_array($select_first_point);

		$select_point = mysqli_query($link, "SELECT * FROM in_control_points WHERE id = '$get_first_point[point_id]'");
		$get_point = mysqli_fetch_array($select_point);

		$opts = array('http'=>array('header'=>"User-Agent: StevesCleverAddressScript 3.7.6\r\n"));
		$context = stream_context_create($opts);
		$ch = curl_init("https://nominatim.openstreetmap.org/reverse?lat=".$get_point['lat']."&lon=".$get_point['lng']."&format=json&accept-language=en&email=9476764@gmail.com");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$content = curl_exec($ch);
		curl_close($ch);
		$jsonz = json_decode($content);

		$country_name = $jsonz->address->country;
        $state_name = $jsonz->address->state;
        $city_name = $jsonz->address->city;

        echo "lat=" . $get_point['lat'] . "lon=" . $get_point['lng'] . "<br>" . $country_name . " ; " . $state_name . " ; " . $city_name . "<br>";

        if($state_name == ''){
        	$state_name = $city_name;
        }

        $update = mysqli_query($link, "UPDATE in_routes SET country = '$country_name', region = '$state_name' WHERE id = '$route_id'");
	}
?> -->