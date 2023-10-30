<?php 
	include("config/dbconnect.php");	
	require ("mailer/PHPMailerAutoload.php");
	$mail = new PHPMailer;
	
	$mail->isSMTP();
	
	//$mail->SMTPDebug = 3;
	$mail->CharSet = 'UTF-8';
	
	$mail->addAddress("9476764@gmail.com");   
	
	$mail->Host = 'mail.adm.tools';
	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->Port = 25;
	//Whether to use SMTP authentication
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication
	$mail->Username = 'invest@web.rv.ua';
	//Password to use for SMTP authentication
	$mail->Password = '13092610Qq';
	
	$mail->SetFrom("invest@web.rv.ua", '123');
	
	$mail->isHTML(true); 
	
	$ordermessage .= "Сообщение с страницы Преподавателям<br>";
	$ordermessage .= "<br>";
	$ordermessage .= "Имя: ".$nameWr."<br/>";
	$ordermessage .= "Email: ".$emailWr."<br/>";
	$ordermessage .= "Телефон: ".$phoneWr."<br/>";
	$ordermessage .= "<br>";
	$ordermessage .= $messageWr;
	
	
	
	$mail->Subject = 'Сообщение Newschool';
	$mail->Body    = $ordermessage;
	$mail->AltBody = $ordermessage;
	
	if(!$mail->send()) {
		//echo 'Сообщение не отправлено ';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		
	}	
?>