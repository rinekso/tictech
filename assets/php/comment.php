<?php
use PHPMailer\PHPMailer\PHPMailer;
require '../plugins/vendor/autoload.php';

$secretKey = '6Le2jqEUAAAAAGLL4CxwX8BTZ-_OlSn6SKfOl2x0';
require_once('../plugins/recaptcha-php-1.11/recaptchalib.php');
  $privatekey = $secretKey;
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
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
  $mail->Username = "info@tictechstudio.com";
  $mail->Password = "Sebatdulu1";
  $mail->SetFrom("no-reply@tictechstudio.com");
  $mail->Subject = "you had a message";
  $mail->Body =
      'Nama : '.$_POST['name'].'<br>'.
      'Email : '.$_POST['email'].'<br>'.
      'Pesan : '.$_POST['comment'].'<br>';
  $mail->AddAddress("agammail95@gmail.com");
  $mail->Send();
  header('location:../../.?feedback=2');
} else {
  header('location:../../.?feedback=1');
}
// }
 /*
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")

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