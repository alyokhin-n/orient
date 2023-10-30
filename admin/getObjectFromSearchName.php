<?php 
	include("config/dbconnect.php"); 
	$jsonstring = $_POST['jsonstring'];
	$type = $_POST['type'];
	//$jsonstring = json_decode($jsonstring, true);
	
	$count = count($jsonstring);
	//echo $count;
	//var_dump($jsonstring[$i]['id']);
	
	
	for ($i = 0; $i < $count; $i++)
	{
		$j++;
		$city = $jsonstring[$i]['city'];
	?>
	<div class="citynameblock clickcity<?php echo $j ?>"><?php echo $city; ?></div>
	<script>
		$(".clickcity<?php echo $j ?>").click(function(event){
			event.preventDefault();
			let objectType = "<?php echo $type ?>";
			
			let city = $('.clickcity<?php echo $j ?>').html();
			let _token = $('meta[name="csrf-token"]').attr('content');
			
			$.ajax({
				url: "/searchObjects",
				type: "POST",
				data:{
					city:city,
					_token: _token
				},
				success:function(response){
					
					if(response) {
						
						console.log(response.success);
						
						
						$.post( "/admin/getObjectFromFilter.php", { jsonstring: response.success, type: objectType }).done(function( data ) {
							if (objectType == "desktop")
							{
								$('.objects-list').html(data);
								$('.find-address').val(city);
								$('.search-block-data').hide();
							}
							else
							{
								$('.objects-list-mobile').html(data);
								$('.find-address2').val(city);
								$('.search-block-data2').hide();
								let elements = document.querySelectorAll('.objects-list-mobile .mobile-object');
								var i = 0;
								for (let elem of elements) {
									i++;
									if(i == 2){
										i = 0;
										elem.style.cssFloat = "right";
									}
								}
							}
							
							
						});
						
						
					}
				},
			});
		});
	</script>
	<?php
	}
	
	
	
	
?>
