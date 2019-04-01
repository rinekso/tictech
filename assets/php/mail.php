<?php
use PHPMailer\PHPMailer\PHPMailer;
require '../plugins/vendor/autoload.php';

$mail = new PHPMailer; // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->SMTPOptions = array(
   'ssl' => array(
     'verify_peer' => false,
     'verify_peer_name' => false,
     'allow_self_signed' => true
    )
);
$mail->Host = "tls://smtp.gmail.com:587";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "lanius.agni@gmail.com";
$mail->Password = "onestepahead";
$mail->SetFrom("no-reply@tictechstudio.com");
$mail->Subject = "Anda mendapat message melalui website Tictechstudio.com";
$mail->Body =   	'Nama : '.$_POST['name'].'<br>'.
  	'Email : '.$_POST['email'].'<br>'.
  	'Pesan : '.$_POST['comment'].'<br>';
$mail->AddAddress("reyno33333@gmail.com");
$mail->Send();
 if(!$mail->Send()) {
  echo $mail->Body;
    echo "<br> Mailer Error: " . $mail->ErrorInfo;
 } else {
    header('location:../../.');
 }
 /*
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('reyno33333@gmail.com')
  ->setPassword('kristusku');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Anda mendapat message kepada pesan melalui website Tictechstudio.com')
  ->setFrom(array('reyno33333@gmail.com' => 'Admin Tictech Studio'))
  ->setTo(array('simsonthewolfer@gmail.com'))
  ->setBody(
  	'Nama : '.$_POST['name'].'<br>'.
  	'Email : '.$_POST['email'].'<br>'.
  	'Pesan : '.$_POST['comment'].'<br>'
  );

$result = $mailer->send($message);
*/
?>