<?php
use PHPMailer\PHPMailer\PHPMailer;
require '../plugins/vendor/autoload.php';

// $secretKey = '6LcZkOMUAAAAAJtOQnfvx25iDZu2VllitUQ4OFwf';
  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
  {
        $secret = '6LcZkOMUAAAAAJtOQnfvx25iDZu2VllitUQ4OFwf';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        {
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
        }
        else
        {
          header('location:../../.?feedback=1');
        }
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