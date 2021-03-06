<?php
function sendOTP($email,$otp) 
{
		require 'phpmailer/PHPMailerAutoload.php';
		require('phpmailer/class.phpmailer.php');
		require('phpmailer/class.smtp.php');
	
		$message_body = "Hi there!<br/>Your One Time Password for registration at Academic Publication Management System is:<br/><br/><strong>". $otp."</strong>";
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Mailer   = "smtp";
		$mail->Host     = "smtp.gmail.com";
		$mail->Port     = 587;
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = 'tls'; // tls or ssl
		$mail->Username = ""; //enter email id from which otp will be sent
		$mail->Password = ""; //the password of email id

		$mail->SMTPDebug = 0;
		$mail->SetFrom("noreply.apms@gmail.com", "CMS Admin");
		$mail->AddAddress($email);//email of receiver
		
		$mail->IsHTML(true);
		$mail->Subject = "Verify email- OTP";
		$mail->MsgHTML($message_body);
		if(!$mail->Send())
			{
				return 0;
			}
		else
		{
			return 1;
		}	
}
?>