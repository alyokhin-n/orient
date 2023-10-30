<?php
	//error_reporting(E_ERROR | E_PARSE);
	include("../config/dbconnect.php"); 
	include("../config/checkAdmin.php");
	require('../template/plugins/xlsreader/php-excel-reader/excel_reader2.php');
	require('../template/plugins/xlsreader/SpreadsheetReader.php');

	if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    } else {
		$location = "../uploads/parserfiles/".$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $location);

        $error = 0;
		
		$Reader = new SpreadsheetReader($location);

		foreach ($Reader as $Row)
		{
			$client_id = $Row[1];
			$pay_sum = $Row[5];
			$paid = $Row[7];
			
			if($paid == 'true'){
				$select_client = mysqli_query($link, "SELECT * FROM in_clients WHERE id = '$client_id'");
				$get_client = mysqli_fetch_array($select_client);

				$no_pay_sum = $get_client['no_pay_sum'];
				if($pay_sum > 0 && $no_pay_sum > 0){
					$no_pay_sum -= $pay_sum;
					$error .= "UPDATE in_clients SET pay_sum = '$pay_sum', no_pay_sum = '$no_pay_sum', last_pay_date = NOW() WHERE id = '$client_id'";
					$update = mysqli_query($link, "UPDATE in_clients SET pay_sum = '$pay_sum', no_pay_sum = '$no_pay_sum', last_pay_date = NOW() WHERE id = '$client_id'");
					if($update == TRUE){
						$insert_log = mysqli_query($link, "INSERT INTO in_payments_log (client_id,sum,create_date) VALUES ('$client_id','$pay_sum',NOW())");
					}else{
						$error = 1;
					}
				}
			}
		}

		echo $error;
	}
?>