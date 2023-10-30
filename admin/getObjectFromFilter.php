<?php 
	include("config/dbconnect.php"); 
	$jsonstring = $_POST['jsonstring'];
	$type = $_POST['type'];
	//$jsonstring = json_decode($jsonstring, true);
	
	$count = count($jsonstring);
	//echo $count;
	//var_dump($jsonstring[$i]['id']);
?>



<?php if ($count != 0) { ?>
	
	
	<?php if ($type == "desktop") { ?>
<script>
	$("#map").hide();
	$( ".yandex-map" ).remove();
	$( ".allmaps" ).append( "<div class='yandex-map' id='map'></div>" );
	ymaps.ready(init2);
	
	function init2(){
	
		<?php 
		for ($i = 0; $i < $count; $i++)
		{	
			$lat = $jsonstring[$i]['lat'];
			$lon = $jsonstring[$i]['lon'];
		} 
		?>
		
		// Создание карты.
		var myMap2 = new ymaps.Map("map", {
			// Координаты центра карты.
			// Порядок по умолчанию: «широта, долгота».
			// Чтобы не определять координаты центра карты вручную,
			// воспользуйтесь инструментом Определение координат.
			center: [<?php echo $lat; ?>, <?php echo $lon; ?>],
			// Уровень масштабирования. Допустимые значения:
			// от 0 (весь мир) до 19.
			zoom: 12
		});
		
		<?php 
		
		for ($i = 0; $i < $count; $i++)
		{	
			$id = $jsonstring[$i]['id'];
			$lat = $jsonstring[$i]['lat'];
			$lon = $jsonstring[$i]['lon'];
		?>
		
		var myPlacemark<?php echo $id; ?> = new ymaps.GeoObject({
			geometry: {
				type: "Point",
				coordinates: [<?php echo $lat; ?>, <?php echo $lon; ?>]
			}
		}
		, {
			// Disabling the replacement of the conventional balloon with the balloon panel.
			balloonPanelMaxMapArea: 0,
			draggable: "true",
			preset: "islands#blueStretchyIcon",
			// Making the balloon open even if there is no content.
			openEmptyBalloon: true
		});
		
		
		myPlacemark<?php echo $id; ?>.events.add('balloonopen', function (e) {
			myPlacemark<?php echo $id; ?>.properties.set('balloonContent', "Загрузка данных...");
			
			
			
			$.post( "/admin/getObjectDataOnMap.php", { id: "<?php echo $id; ?>" }).done(function( data ) {
				myPlacemark<?php echo $id; ?>.properties.set('balloonContent', data);
			});
			
			
		});
		myMap2.geoObjects.add(myPlacemark<?php echo $id; ?>);
		
		myPlacemark<?php echo $id; ?>.events.add('click', function () {
			
			//console.log(<?php echo $id; ?>);
		});
		<?php } ?>
	}
</script>
	<?php } ?>





<?php if ($type == "mobile") { ?>
<script>
	/*Mobile map*/
	$("#map").hide();
	$( ".yandex-map" ).remove();
	$( ".allmaps2" ).append( "<div class='yandex-map' id='map3'></div>" );
	ymaps.ready(init2);
	
	function init2(){
	
		<?php 
		for ($i = 0; $i < $count; $i++)
		{	
			$lat = $jsonstring[$i]['lat'];
			$lon = $jsonstring[$i]['lon'];
		} 
		?>
		
		// Создание карты.
		var myMap2 = new ymaps.Map("map3", {
			// Координаты центра карты.
			// Порядок по умолчанию: «широта, долгота».
			// Чтобы не определять координаты центра карты вручную,
			// воспользуйтесь инструментом Определение координат.
			center: [<?php echo $lat; ?>, <?php echo $lon; ?>],
			// Уровень масштабирования. Допустимые значения:
			// от 0 (весь мир) до 19.
			zoom: 12
		});
		
		<?php 
		
		for ($i = 0; $i < $count; $i++)
		{	
			$id = $jsonstring[$i]['id'];
			$lat = $jsonstring[$i]['lat'];
			$lon = $jsonstring[$i]['lon'];
		?>
		
		var myPlacemark<?php echo $id; ?> = new ymaps.GeoObject({
			geometry: {
				type: "Point",
				coordinates: [<?php echo $lat; ?>, <?php echo $lon; ?>]
			}
		}
		, {
			// Disabling the replacement of the conventional balloon with the balloon panel.
			balloonPanelMaxMapArea: 0,
			draggable: "true",
			preset: "islands#blueStretchyIcon",
			// Making the balloon open even if there is no content.
			openEmptyBalloon: true
		});
		
		
		myPlacemark<?php echo $id; ?>.events.add('balloonopen', function (e) {
			myPlacemark<?php echo $id; ?>.properties.set('balloonContent', "Загрузка данных...");
			
			
			
			$.post( "/admin/getObjectDataOnMap.php", { id: "<?php echo $id; ?>" }).done(function( data ) {
				myPlacemark<?php echo $id; ?>.properties.set('balloonContent', data);
			});
			
			
		});
		myMap2.geoObjects.add(myPlacemark<?php echo $id; ?>);
		
		myPlacemark<?php echo $id; ?>.events.add('click', function () {
			
			//console.log(<?php echo $id; ?>);
		});
		<?php } ?>
	}
</script>
<?php } ?>


<?php } ?>







<?php if ($type == "desktop") { ?>
<?php
	for ($i = 0; $i < $count; $i++)
	{
		$id = $jsonstring[$i]['id'];
		$image = $jsonstring[$i]['image'];
		$name = $jsonstring[$i]['name'];
		$address = $jsonstring[$i]['address'];
		$cost = $jsonstring[$i]['cost'];
		$lat = $jsonstring[$i]['lat'];
		$lon = $jsonstring[$i]['lon'];
	?>
	<div class="block-object objectclick<?php echo $id; ?>">
		<div class="padding-block">
			<img class="object-img" src="/admin/uploads/objects/<?php echo $image; ?>">
			<p class="object-name"><?php echo $name; ?></p>
			<p class="object-description"><?php echo $address; ?></p>
			<p class="object-price"><?php echo number_format($cost, 0, '.', ' '); ?> ₽</p>
		</div>
		<div class="line"></div>
	</div>

	<script>
		$(".objectclick<?php echo $id; ?>").click(function(){
			$("#map").hide();
			$( ".yandex-map" ).remove();
			$( ".allmaps" ).append( "<div class='yandex-map' id='map'></div>" );
			ymaps.ready(init2);
			
			function init2(){
				
				// Создание карты.
				var myMap2 = new ymaps.Map("map", {
					// Координаты центра карты.
					// Порядок по умолчанию: «широта, долгота».
					// Чтобы не определять координаты центра карты вручную,
					// воспользуйтесь инструментом Определение координат.
					center: [100.90, 38.38],
					// Уровень масштабирования. Допустимые значения:
					// от 0 (весь мир) до 19.
					zoom: 10
				});
				
				
				var myPlacemark<?php echo $id; ?> = new ymaps.GeoObject({
					geometry: {
						type: "Point",
						coordinates: [<?php echo $lat; ?>, <?php echo $lon; ?>]
					}
				}
				, {
					// Disabling the replacement of the conventional balloon with the balloon panel.
					balloonPanelMaxMapArea: 0,
					draggable: "true",
					preset: "islands#blueStretchyIcon",
					// Making the balloon open even if there is no content.
					openEmptyBalloon: true
				});
				
				
				myPlacemark<?php echo $id; ?>.events.add('balloonopen', function (e) {
					myPlacemark<?php echo $id; ?>.properties.set('balloonContent', "Загрузка данных...");
					
					
					
					$.post( "/admin/getObjectDataOnMap.php", { id: "<?php echo $id; ?>" }).done(function( data ) {
						myPlacemark<?php echo $id; ?>.properties.set('balloonContent', data);
					});
					
					
				});
				myMap2.geoObjects.add(myPlacemark<?php echo $id; ?>);
				
				myPlacemark<?php echo $id; ?>.events.add('click', function () {
					
					//console.log(<?php echo $id; ?>);
				});
				
				
				
				
				$('.sidebar').load('/invest/public/objects-single?id=<?php echo $id; ?>');
				myMap2.setCenter([<?php echo $lat; ?>, <?php echo $lon; ?>], 15, {duration: 300});
				
				$.post( "/admin/getObjectDataOnMap.php", { id: "<?php echo $id; ?>" }).done(function( data ) {
					myPlacemark<?php echo $id; ?>.properties.set('balloonContent', data);
					myMap2.setCenter([<?php echo $lat; ?>, <?php echo $lon; ?>], 15, {duration: 300});
					myMap2.balloon.open([<?php echo $lat; ?>, <?php echo $lon; ?>], data, {
					});
				});
				
				
				
			}
		});
	</script>
	<?php
		
		
	}
	
	
	
	
?>
<?php } ?>













<?php if ($type == "mobile") { ?>
<?php
	/*Mobile*/
	for ($i = 0; $i < $count; $i++)
	{
		$id = $jsonstring[$i]['id'];
		$image = $jsonstring[$i]['image'];
		$name = $jsonstring[$i]['name'];
		$address = $jsonstring[$i]['address'];
		$cost = $jsonstring[$i]['cost'];
		$lat = $jsonstring[$i]['lat'];
		$lon = $jsonstring[$i]['lon'];
	?>
	<div class="mobile-object objectclick<?php echo $id; ?>">
		<img class="object-img" src="/admin/uploads/objects/<?php echo $image; ?>">
		<p class="object-name"><?php echo $name; ?></p>
		<p class="object-description"><?php echo $address; ?></p>
		<p class="object-price"><?php echo number_format($cost, 0, '.', ' '); ?> ₽</p>
	</div>
	

	<script>
		$(".objectclick<?php echo $id; ?>").click(function(){
			$("#map").hide();
			$( ".yandex-map" ).remove();
			$( ".allmaps2" ).append( "<div class='yandex-map' id='map3'></div>" );
			ymaps.ready(init2);
			
			function init2(){
				
				// Создание карты.
				var myMap2 = new ymaps.Map("map3", {
					// Координаты центра карты.
					// Порядок по умолчанию: «широта, долгота».
					// Чтобы не определять координаты центра карты вручную,
					// воспользуйтесь инструментом Определение координат.
					center: [100.90, 38.38],
					// Уровень масштабирования. Допустимые значения:
					// от 0 (весь мир) до 19.
					zoom: 10
				});
				
				
				var myPlacemark<?php echo $id; ?> = new ymaps.GeoObject({
					geometry: {
						type: "Point",
						coordinates: [<?php echo $lat; ?>, <?php echo $lon; ?>]
					}
				}
				, {
					// Disabling the replacement of the conventional balloon with the balloon panel.
					balloonPanelMaxMapArea: 0,
					draggable: "true",
					preset: "islands#blueStretchyIcon",
					// Making the balloon open even if there is no content.
					openEmptyBalloon: true
				});
				
				
				myPlacemark<?php echo $id; ?>.events.add('balloonopen', function (e) {
					myPlacemark<?php echo $id; ?>.properties.set('balloonContent', "Загрузка данных...");
					
					
					
					$.post( "/admin/getObjectDataOnMap.php", { id: "<?php echo $id; ?>" }).done(function( data ) {
						myPlacemark<?php echo $id; ?>.properties.set('balloonContent', data);
					});
					
					
				});
				myMap2.geoObjects.add(myPlacemark<?php echo $id; ?>);
				
				myPlacemark<?php echo $id; ?>.events.add('click', function () {
					
					//console.log(<?php echo $id; ?>);
				});
				
				
				
				
				
				myMap2.setCenter([<?php echo $lat; ?>, <?php echo $lon; ?>], 15, {duration: 300});
				$('.mobile-object-single').load('/invest/public/objects-single-mobile?id=<?php echo $id; ?>');
				
				$.post( "/admin/getObjectDataOnMap.php", { id: "<?php echo $id; ?>" }).done(function( data ) {
					myPlacemark<?php echo $id; ?>.properties.set('balloonContent', data);
					myMap2.setCenter([<?php echo $lat; ?>, <?php echo $lon; ?>], 15, {duration: 300});
					myMap2.balloon.open([<?php echo $lat; ?>, <?php echo $lon; ?>], data, {
					});
				});
				
				
				
			}
		});
	</script>
	<?php
		
		
	}
	
	
	
	
?>
<?php } ?>