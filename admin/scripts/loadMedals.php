<div class="row">
	<?php 
		include("../config/dbconnect.php"); 
		
		$selectPartners = mysqli_query($link, "SELECT * FROM in_images WHERE type = 'medal'");
		while ($getPartner = mysqli_fetch_array($selectPartners))
		{
		?>
		<div class="col-lg-4">                            
			<div class="card">
				<div class="card-header">
					<button type="button" class="btn btn-secondary btn-xs float-right delete<?php echo $getPartner['id'] ?>">Удалить картинку</button>
				</div><!--end card-header-->
				<div class="card-body"> 
					<div class="media">
						<img src="/admin/uploads/medals/<?php echo $getPartner['image'] ?>" alt="" class="img-thumbnail">
					</div>
				</div><!--end card-body-->
			</div><!--end card-->
		</div>
		
		<script>
		$('.delete<?php echo $getPartner['id'] ?>').click(function(){
			$.post( "/admin/scripts/deletePhoto.php", { id: "<?php echo $getPartner['id'] ?>" }).done(function( data ) {
			$( ".preview_images" ).load( "scripts/loadMedals.php" );
		  });
		});
		</script>
	<?php } ?>
</div>