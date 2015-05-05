<?php
require("PHPMailer/PHPMailerAutoload.php");

function sendmail($email,$username,$subject,$body){

	$mail = new PHPMailer();

	$mail->CharSet  = "UTF-8";
	$mail->Encoding = "base64";

	$mail->Subject = $subject;

	$mail->From = "submit@whitehat.lug.ustc.edu.cn";
	$mail->FromName = "白帽子大赛";

    $mail->AddAddress($email, $username);

	//$address = "staff@lug.ustc.edu.cn";
	//$mail->AddAddress($address, "staff");
	
	$address = "850978365@qq.com";
	$mail->AddAddress($address, "cty");
	$address = "903806024@qq.com";
	$mail->AddAddress($address, "zzh");

	//$mail->AddAttachment('xx.xls','我的附件.xls');
	$mail->IsHTML(true);
	$mail->Body = $body;
	$mail->Send();
}
