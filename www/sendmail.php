<?php
require("PHPMailer/PHPMailerAutoload.php");

function sendmail($email,$username,$subject,$body){

    $mail = new PHPMailer();

		$mail->isSMTP();
		$mail->Host = 'blog.ustc.edu.cn';
		$mail->SMTPAuth = false;
		$mail->Port = 25;

    $mail->CharSet  = "UTF-8";
    $mail->Encoding = "base64";

    $mail->Subject = $subject;

    $mail->From = "whitehat@ustclug.org";
    $mail->FromName = "白帽子大赛";

    $mail->AddAddress($email, $username);

    $address = "staff@lug.ustc.edu.cn";
    $mail->AddAddress($address, "staff");

    //$mail->AddAttachment('xx.xls','我的附件.xls');
    $mail->IsHTML(true);
    $mail->Body = $body;
    $mail->Send();
}
