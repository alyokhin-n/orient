<?php
	include("../config/dbconnect.php"); 
	
	
	
	if(is_array($_FILES)) {
		
		/*Загружаем для первого блока*/
		if(is_uploaded_file($_FILES['block1_image']['tmp_name'])) 
		{
			$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block1_image'");
			$getImageToDel = mysqli_fetch_array($selectImageToDel);
			
			$sourcePath = $_FILES['block1_image']['tmp_name'];
			
			
			$path_parts = pathinfo($_FILES['block1_image']['name']);
			$ext = $path_parts['extension'];
			
			$rand = mt_rand(10000000, 1000000000);
			$imageName = time().$rand.".".$ext;
			
			$targetPath = "../../admin/uploads/pages/".$imageName;
			
			
			if ($getImageToDel['setting_value'] != "")
			{
				unlink("../../admin/uploads/pages/".$getImageToDel['setting_value']);
			}
			
			
			if(move_uploaded_file($sourcePath,$targetPath)) {
				
				$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block1_image'");
			?>
			<img class="img-fluid bg-light-alt selectImage1" src="<?php echo $targetPath; ?>" alt="Card image">
			<script>
				$( ".selectImage1" ).click(function() {
					$( ".newselectedimage" ).click();
				});
			</script>
			<script>
				
				
				$(".selectImage1").attr("src", "<?php echo $targetPath; ?>");
				Command: toastr["success"]("Картинка обновлена")
				
				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "1",
					"hideDuration": "1000",
					"timeOut": "2000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
			</script>
			<?php
			}
		}
		
		
		
		
		
		
		
		
		/*Загружаем для второго блока*/
		if(is_uploaded_file($_FILES['block2_image1']['tmp_name'])) 
		{
			$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block2_image1'");
			$getImageToDel = mysqli_fetch_array($selectImageToDel);
			
			$sourcePath = $_FILES['block2_image1']['tmp_name'];
			
			
			$path_parts = pathinfo($_FILES['block2_image1']['name']);
			$ext = $path_parts['extension'];
			
			$rand = mt_rand(10000000, 1000000000);
			$imageName = time().$rand.".".$ext;
			
			$targetPath = "../../admin/uploads/pages/".$imageName;
			
			
			if ($getImageToDel['setting_value'] != "")
			{
				unlink("../../admin/uploads/pages/".$getImageToDel['setting_value']);
			}
			
			
			if(move_uploaded_file($sourcePath,$targetPath)) {
				
				$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block2_image1'");
			?>
			<img class="img-fluid bg-light-alt selectImage2" src="<?php echo $targetPath; ?>" alt="Card image">
			<script>
				$( ".selectImage2" ).click(function() {
					$( ".newselectedimage2" ).click();
				});
			</script>
			<script>
				
				
				$(".selectImage2").attr("src", "<?php echo $targetPath; ?>");
				Command: toastr["success"]("Картинка обновлена")
				
				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "1",
					"hideDuration": "1000",
					"timeOut": "2000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
			</script>
			<?php
			}
		}
		
		
		/*Загружаем для второго блока 2*/
		if(is_uploaded_file($_FILES['block2_image2']['tmp_name'])) 
		{
			$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block2_image2'");
			$getImageToDel = mysqli_fetch_array($selectImageToDel);
			
			$sourcePath = $_FILES['block2_image2']['tmp_name'];
			
			
			$path_parts = pathinfo($_FILES['block2_image2']['name']);
			$ext = $path_parts['extension'];
			
			$rand = mt_rand(10000000, 1000000000);
			$imageName = time().$rand.".".$ext;
			
			$targetPath = "../../admin/uploads/pages/".$imageName;
			
			
			if ($getImageToDel['setting_value'] != "")
			{
				unlink("../../admin/uploads/pages/".$getImageToDel['setting_value']);
			}
			
			
			if(move_uploaded_file($sourcePath,$targetPath)) {
				
				$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block2_image2'");
			?>
			<img class="img-fluid bg-light-alt selectImage3" src="<?php echo $targetPath; ?>" alt="Card image">
			<script>
				$( ".selectImage3" ).click(function() {
					$( ".newselectedimage3" ).click();
				});
			</script>
			<script>
				
				
				$(".selectImage3").attr("src", "<?php echo $targetPath; ?>");
				Command: toastr["success"]("Картинка обновлена")
				
				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "1",
					"hideDuration": "1000",
					"timeOut": "2000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
			</script>
			<?php
			}
		}
		
		
		
		
		
		/*Загружаем для второго блока 3*/
		if(is_uploaded_file($_FILES['block2_image3']['tmp_name'])) 
		{
			$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block2_image3'");
			$getImageToDel = mysqli_fetch_array($selectImageToDel);
			
			$sourcePath = $_FILES['block2_image3']['tmp_name'];
			
			
			$path_parts = pathinfo($_FILES['block2_image3']['name']);
			$ext = $path_parts['extension'];
			
			$rand = mt_rand(10000000, 1000000000);
			$imageName = time().$rand.".".$ext;
			
			$targetPath = "../../admin/uploads/pages/".$imageName;
			
			
			if ($getImageToDel['setting_value'] != "")
			{
				unlink("../../admin/uploads/pages/".$getImageToDel['setting_value']);
			}
			
			
			if(move_uploaded_file($sourcePath,$targetPath)) {
				
				$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block2_image3'");
			?>
			<img class="img-fluid bg-light-alt selectImage4" src="<?php echo $targetPath; ?>" alt="Card image">
			<script>
				$( ".selectImage4" ).click(function() {
					$( ".newselectedimage4" ).click();
				});
			</script>
			<script>
				
				
				$(".selectImage4").attr("src", "<?php echo $targetPath; ?>");
				Command: toastr["success"]("Картинка обновлена")
				
				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": true,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "1",
					"hideDuration": "1000",
					"timeOut": "2000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
			</script>
			<?php
			}
		}
		
		
		
			if(is_uploaded_file($_FILES['block3_image1']['tmp_name'])) 
			{
				$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block3_image_1'");
				$getImageToDel = mysqli_fetch_array($selectImageToDel);
				
				$sourcePath = $_FILES['block3_image1']['tmp_name'];
				
				
				$path_parts = pathinfo($_FILES['block3_image1']['name']);
				$ext = $path_parts['extension'];
				
				$rand = mt_rand(10000000, 1000000000);
				$imageName = time().$rand.".".$ext;
				
				$targetPath = "../../admin/uploads/pages/".$imageName;
				
				
				if ($getImageToDel['setting_value'] != "")
				{
					unlink("../../admin/uploads/pages/".$getImageToDel['setting_value']);
				}
				
				
				if(move_uploaded_file($sourcePath,$targetPath)) {
					
					$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block3_image_1'");
				?>
				<img class="img-fluid bg-light-alt newselectedimage_third1" src="<?php echo $targetPath; ?>" alt="Card image">
				<script>
					$( ".selectImage_third1" ).click(function() {
						$( ".newselectedimage_third1" ).click();
					});
				</script>
				<script>
					
					
					$(".selectImage_third1").attr("src", "<?php echo $targetPath; ?>");
					Command: toastr["success"]("Картинка обновлена")
					
					toastr.options = {
						"closeButton": false,
						"debug": false,
						"newestOnTop": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "1",
						"hideDuration": "1000",
						"timeOut": "2000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				</script>
				<?php
				}
			}
			
			
			
			
			
			
			
			
			if(is_uploaded_file($_FILES['block3_image2']['tmp_name'])) 
			{
				$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block3_image_2'");
				$getImageToDel = mysqli_fetch_array($selectImageToDel);
				
				$sourcePath = $_FILES['block3_image2']['tmp_name'];
				
				
				$path_parts = pathinfo($_FILES['block3_image2']['name']);
				$ext = $path_parts['extension'];
				
				$rand = mt_rand(10000000, 1000000000);
				$imageName = time().$rand.".".$ext;
				
				$targetPath = "../../admin/uploads/pages/".$imageName;
				
				
				if ($getImageToDel['setting_value'] != "")
				{
					unlink("../../admin/uploads/pages/".$getImageToDel['setting_value']);
				}
				
				
				if(move_uploaded_file($sourcePath,$targetPath)) {
					
					$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block3_image_2'");
				?>
				<img class="img-fluid bg-light-alt newselectedimage_third2" src="<?php echo $targetPath; ?>" alt="Card image">
				<script>
					$( ".selectImage_third2" ).click(function() {
						$( ".newselectedimage_third2" ).click();
					});
				</script>
				<script>
					
					
					$(".selectImage_third2").attr("src", "<?php echo $targetPath; ?>");
					Command: toastr["success"]("Картинка обновлена")
					
					toastr.options = {
						"closeButton": false,
						"debug": false,
						"newestOnTop": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "1",
						"hideDuration": "1000",
						"timeOut": "2000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				</script>
				<?php
				}
			}
			
			
			
			if(is_uploaded_file($_FILES['block3_image3']['tmp_name'])) 
			{
				$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block3_image_3'");
				$getImageToDel = mysqli_fetch_array($selectImageToDel);
				
				$sourcePath = $_FILES['block3_image3']['tmp_name'];
				
				
				$path_parts = pathinfo($_FILES['block3_image3']['name']);
				$ext = $path_parts['extension'];
				
				$rand = mt_rand(10000000, 1000000000);
				$imageName = time().$rand.".".$ext;
				
				$targetPath = "../../admin/uploads/pages/".$imageName;
				
				
				if ($getImageToDel['setting_value'] != "")
				{
					unlink("../../admin/uploads/pages/".$getImageToDel['setting_value']);
				}
				
				
				if(move_uploaded_file($sourcePath,$targetPath)) {
					
					$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block3_image_3'");
				?>
				<img class="img-fluid bg-light-alt newselectedimage_third3" src="<?php echo $targetPath; ?>" alt="Card image">
				<script>
					$( ".selectImage_third3" ).click(function() {
						$( ".newselectedimage_third3" ).click();
					});
				</script>
				<script>
					
					
					$(".selectImage_third3").attr("src", "<?php echo $targetPath; ?>");
					Command: toastr["success"]("Картинка обновлена")
					
					toastr.options = {
						"closeButton": false,
						"debug": false,
						"newestOnTop": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "1",
						"hideDuration": "1000",
						"timeOut": "2000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				</script>
				<?php
				}
			}
			
			
			
			
			
			
			
			
			
		
		
		
		
		
		
		
		
		
	}
?>