<?php 
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");

	//$val = $_POST['val'];
	$route_id = $_POST['id'];

	$select_first_point = mysqli_query($link, "SELECT * FROM in_routes_points WHERE route_id = '$route_id' AND marker_id = '0'");
	$get_fisrt_point = mysqli_fetch_array($select_first_point);

	$selectMarkers = mysqli_query($link, "SELECT * FROM in_control_points WHERE id = '$get_fisrt_point[point_id]'");
	$getMarkers = mysqli_fetch_array($selectMarkers);
	$firstMarkerLat = $getMarkers['lat'];
	$firstMarkerLng = $getMarkers['lng'];

?>

<div id="map-show" style="height: 80vh;margin-bottom: 20px;"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAApIdDi7CvnuqeGZIjf7oyBRY8T3SpePI&callback=initMap" async></script>

<script>
	let map;
	var markersArray = [];

	function initMap() {
		map = new google.maps.Map(document.getElementById("map-show"), {
			<?php 
			if ($firstMarkerLat != '')
			{
				$lat = $firstMarkerLat;
				$lng = $firstMarkerLng;
			}
			else
			{
				$lat = "-34.397";
				$lng = "150.644";
			}
			?>
			center: { lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?> },
			zoom: 8,
		});

		// google.maps.event.addListener(map, "click", function(event)
		// {

		// 	placeMarker(event.latLng);


		// 	document.getElementById("latFld").value = event.latLng.lat();
		// 	document.getElementById("lngFld").value = event.latLng.lng();
		// });
		function placeMarker(location) {

			deleteOverlays();

			var marker = new google.maps.Marker({
				position: location, 
				map: map
			});


			markersArray.push(marker);


		}
		var incrementId = 0;

		function placeMarkerExist(lat, lng, markerincrement) {
			incrementId++;
			var marker2 = new google.maps.Marker({
				position: new google.maps.LatLng(lat, lng), 
				map: map,
				draggable: true,
				icon: 'images/markers/number_'+incrementId+'.png'
			});
			marker2.set("id", markerincrement);
			var mlat = marker2.getPosition().lat();
			var mlng = marker2.getPosition().lng();
			var markerId = marker2.get("id");
			console.log(mlat+" "+mlng+" "+markerId);
		}

		<?php 
		if ($firstMarkerLat != '')
		{
			$select_points = mysqli_query($link, "SELECT * FROM in_routes_points WHERE route_id = '$route_id' ORDER BY marker_id");
			while($get_points = mysqli_fetch_array($select_points)){
				$selectMarkers = mysqli_query($link, "SELECT * FROM in_control_points WHERE id = '$get_points[point_id]'");
				$getMarkers = mysqli_fetch_array($selectMarkers);
				?>
				placeMarkerExist(<?php echo $getMarkers['lat'] ?>, <?php echo $getMarkers['lng'] ?>, <?php echo $getMarkers['id'] ?>);
				<?php
			}
		}
		?>

		const flightPlanCoordinates = [
		<?php 
		if ($firstMarkerLat != '')
		{
			$select_points = mysqli_query($link, "SELECT * FROM in_routes_points WHERE route_id = '$route_id' ORDER BY marker_id");
			while($get_points = mysqli_fetch_array($select_points)){
				$selectMarkers = mysqli_query($link, "SELECT * FROM in_control_points WHERE id = '$get_points[point_id]'");
				$getMarkers = mysqli_fetch_array($selectMarkers);
					?>
						{ lat: <?php echo $getMarkers['lat'] ?>, lng: <?php echo $getMarkers['lng'] ?> },
					<?php
			}
		}
		?>
		];



			const flightPath = new google.maps.Polyline({
				path: flightPlanCoordinates,
				geodesic: true,
				strokeColor: "#00FFFF",
				strokeOpacity: 1.0,
				strokeWeight: 2,



			});
			flightPath.setMap(map);
	}
	

	


	function deleteOverlays() {
		if (markersArray) {
			for (i in markersArray) {
				markersArray[i].setMap(null);
			}
			markersArray.length = 0;
		}
	}

</script>