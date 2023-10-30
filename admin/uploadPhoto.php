<?php
	header('Content-type: application/json');
	
	$ds = DIRECTORY_SEPARATOR;

	if ($_GET['mainphoto2'] == 1)
	{
		$storeFolder = 'uploads/wishlist/temp'; // Указываем папку для загрузки
		
		if (!empty($_FILES)) { // Проверяем пришли ли файлы от клиента
			
			$tempFile = $_FILES['file']['tmp_name']; //Получаем загруженные файлы из временного хранилища
			
			$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
			
			
			$rand = mt_rand(100000, 100000000);
			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$newFileName = $rand.time().".".$ext;
			$targetFile =  $targetPath. $newFileName;
			
			move_uploaded_file($tempFile,$targetFile); // Перемещаем загруженные файлы из временного хранилища в нашу папку uploads
			echo json_encode(['target_file' => $newFileName]);
		}
	}
	
?>