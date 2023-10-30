<?php
	include("../config/dbconnect.php"); 
	
	$type = $_POST['type'];
	
	if(is_array($_FILES)) {
		
		/*Загружаем для первого блока*/
		if(is_uploaded_file($_FILES['block1_image']['tmp_name'])) 
		{
			$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block1_image' AND setting_type = '$type'");
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
				
				$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block1_image' AND setting_type = '$type'");
			?>
			<img class="img-fluid bg-light-alt selectImage1" src="<?php echo $targetPath; ?>" alt="Card image">
			<script>
				$( ".selectImage1" ).click(function() {
					$( ".newselectedimage1" ).click();
				});
			</script>
			<script>
				
				
				$(".selectImage1").attr("src", "/admin/uploads/pages/<?php echo $imageName; ?>");
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
			$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block2_image1' AND setting_type = '$type'");
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
				
				$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block2_image1' AND setting_type = '$type'");
			?>
			<img class="img-fluid bg-light-alt selectImage2" src="<?php echo $targetPath; ?>" alt="Card image">
			<script>
				$( ".selectImage2" ).click(function() {
					$( ".newselectedimage2" ).click();
				});
			</script>
			<script>
				
				
				$(".selectImage2").attr("src", "/admin/uploads/pages/<?php echo $imageName; ?>");
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
			$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block2_image2' AND setting_type = '$type'");
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
				
				$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block2_image2' AND setting_type = '$type'");
			?>
			<img class="img-fluid bg-light-alt selectImage3" src="<?php echo $targetPath; ?>" alt="Card image">
			<script>
				$( ".selectImage3" ).click(function() {
					$( ".newselectedimage3" ).click();
				});
			</script>
			<script>
				
				
				$(".selectImage3").attr("src", "/admin/uploads/pages/<?php echo $imageName; ?>");
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
		if(is_uploaded_file($_FILES['block2_image3']['tmp_name'])) 
		{
			$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block2_image3' AND setting_type = '$type'");
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
				
				$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block2_image3' AND setting_type = '$type'");
			?>
			<img class="img-fluid bg-light-alt selectImage4" src="<?php echo $targetPath; ?>" alt="Card image">
			<script>
				$( ".selectImage4" ).click(function() {
					$( ".newselectedimage4" ).click();
				});
			</script>
			<script>
				
				
				$(".selectImage4").attr("src", "/admin/uploads/pages/<?php echo $imageName; ?>");
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
		
		
		
		
		
		
		
		
		/*Загружаем для Четвертый блок*/
		if(is_uploaded_file($_FILES['block4_image']['tmp_name'])) 
		{
			$selectImageToDel = mysqli_query($link, "SELECT * FROM in_pages_data WHERE setting_name = 'block4_image' AND setting_type = '$type'");
			$getImageToDel = mysqli_fetch_array($selectImageToDel);
			
			$sourcePath = $_FILES['block4_image']['tmp_name'];
			
			
			$path_parts = pathinfo($_FILES['block4_image']['name']);
			$ext = $path_parts['extension'];
			
			$rand = mt_rand(10000000, 1000000000);
			$imageName = time().$rand.".".$ext;
			
			$targetPath = "../../admin/uploads/pages/".$imageName;
			
			
			if ($getImageToDel['setting_value'] != "")
			{
				unlink("../../admin/uploads/pages/".$getImageToDel['setting_value']);
			}
			
			
			if(move_uploaded_file($sourcePath,$targetPath)) {
				
				$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block4_image' AND setting_type = '$type'");
			?>
			<img class="img-fluid bg-light-alt selectImage5" src="<?php echo $targetPath; ?>" alt="Card image">
			<script>
				$( ".selectImage5" ).click(function() {
					$( ".newselectedimage5" ).click();
				});
			</script>
			<script>
				
				
				$(".selectImage5").attr("src", "/admin/uploads/pages/<?php echo $imageName; ?>");
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		if(is_uploaded_file($_FILES['avatarEmployees']['tmp_name'])) 
		{
			$sourcePath = $_FILES['avatarEmployees']['tmp_name'];
			
			
			$path_parts = pathinfo($_FILES['avatarEmployees']['name']);
			$ext = $path_parts['extension'];
			
			$rand = mt_rand(10000000, 1000000000);
			$imageName = time().$rand.".".$ext;
			
			$targetPath = "../../admin/uploads/clients/".$imageName;
			
			
			if(move_uploaded_file($sourcePath,$targetPath)) {
				
				//$update = mysqli_query($link, "UPDATE in_pages_data SET setting_value = '$imageName' WHERE setting_name = 'block4_image' AND setting_type = '$type'");

				echo "success";
			?>
			<?php
			}
		}
		
	}
?>