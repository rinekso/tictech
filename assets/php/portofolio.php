<?php
use PHPMailer\PHPMailer\PHPMailer;
require '../plugins/vendor/autoload.php';

$secretKey = '6Le2jqEUAAAAAGLL4CxwX8BTZ-_OlSn6SKfOl2x0';
$captcha = $_POST['g-recaptcha-response'];
$ip = $_SERVER['REMOTE_ADDR'];
$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
$responseKeys = json_decode($response,true);

if(intval($responseKeys["success"]) !== 1) {
  echo '<p class="alert alert-warning">Please check the the captcha form.</p>';
} else {
  session_start();
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['company'] = $_POST['company'];
  $_SESSION[$_POST['name']."-".$_POST['company']] = 0;

  $mail = new PHPMailer; // create a new object
  $mail->IsSMTP(); // enable SMTP
  $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
  $mail->SMTPAuth = true; // authentication enabled
  $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
  // $mail->SMTPOptions = array(
  //    'ssl' => array(
  //      'verify_peer' => false,
  //      'verify_peer_name' => false,
  //      'allow_self_signed' => true
  //     )
  // );
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 587; // or 587
  $mail->IsHTML(true);
  $mail->Username = "lanius.agni@gmail.com";
  $mail->Password = "Onestepahead1212";
  $mail->SetFrom("no-reply@tictechstudio.com");
  $mail->Subject = "Portfolio of Tictech";
  $mail->Body =  'Greetings '.$_POST['name'].' from '.$_POST['company'].' ! Here is link to download our portfolio: <a href="http://tictechstudio.com/download.php">Download Portfolio</a>. Whoever you are, we hope to collaborate in creating a masterpiece project with you in the future. You can check our contact list in our portfolio, so, please feel free to consult with us. we look forward to hearing from you in the future!<br>
  <br>
  Fandi Alfiansah<br>
  Head of Production<br>
  TicTech Studio<br>';
  $mail->AddAddress($_POST['email']);
  $mail->Send();
  header('location:../../.?feedback=2');
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