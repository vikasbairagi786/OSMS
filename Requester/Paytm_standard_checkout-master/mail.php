<?php
error_reporting(0);
$email=$email;
//$res=mysqli_query($con,"select * from admin where email='$email'");
//$count=mysqli_num_rows($res);
{
	$otp=rand(11111,99999);
	//mysqli_query($con,"update admin set otp='$otp' where email='$email'");
	$html="Your Payment has sucessfully done";
	$_SESSION['EMAIL']=$email;
	smtp_mailer($email,'OSMS payment Sucessfull',$html);
	echo "yes";
}

function smtp_mailer($to,$subject, $msg){
	require_once("smtp/class.phpmailer.php");
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'SSL'; 
	$mail->Host = "ssl://smtp.gmail.com";
	$mail->Port = 465; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "fitnesshub.otp@gmail.com";
	$mail->Password ="poiuytrewq1234567890";
	$mail->SetFrom("fitnesshub.otp@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}
?>