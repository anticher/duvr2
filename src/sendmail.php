<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//От кого письмо
	$mail->setFrom('info@anticherq.online', 'DUVR electro');
	//Кому отправить
	$mail->addAddress('anticherq@gmail.com');
	//Тема письма
	$mail->Subject = 'Mail from site';

	//Тело письма
	$body = '<h1>New message</h1>';
	
	if(trim(!empty($_POST['user_name']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['user_name'].'</p>';
	}
		if(trim(!empty($_POST['user_tel']))){
		$body.='<p><strong>Телефон:</strong> '.$_POST['user_tel'].'</p>';
	}
	if(trim(!empty($_POST['user_Email']))){
		$body.='<p><strong>E-mail:</strong> '.$_POST['user_Email'].'</p>';
	}
	if(trim(!empty($_POST['textarea']))){
		$body.='<p><strong>Сообщение:</strong> '.$_POST['textarea'].'</p>';
	}
	

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Сообщение отправлено!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>