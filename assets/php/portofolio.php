<?php
use PHPMailer\PHPMailer\PHPMailer;
require '../plugins/vendor/autoload.php';

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
          $mail->Subject = "Portfolio of Tictech";
          $mail->Body =  'Greetings '.$_POST['name'].' from '.$_POST['company'].' !<br>Here is link to download our portfolio: <a href="http://tictechstudio.com/download.php">Download Portfolio</a>. Whoever you are, we hope to collaborate in creating a masterpiece project with you in the future. You can check our contact list in our portfolio, so, please feel free to consult with us. We look forward to hearing from you in the future!<br>
          <br>
          Fandi Alfiansah<br>
          Head of Production<br>
          TicTech Studio<br>';
          $mail->AddAddress($_POST['email']);
          $mail->Send();
          header('location:../../.?feedback=3');
        }else{
          header('location:../../.?feedback=1');
        }
        echo "Sorry, There is some mistake in our server. We on progress to fix it. <br> Contact us : info@tictechstudio.com | +62 85257104594 | instagram : tictechstudio | twitter : tictech_studio<br>linkedin : tictech-studio | facebook : tictech.studio | Lanius Lab, Jl. Dr. Ir. Soekarno No. 487 Penjaringan Sari, Rungkut, Kota Surabaya, Jawa Timur, 60115";
  }
echo "Sorry, There is some mistake in our server. We on progress to fix it. <br> Contact us : info@tictechstudio.com | +62 85257104594 | instagram : tictechstudio | twitter : tictech_studio<br>linkedin : tictech-studio | facebook : tictech.studio | Lanius Lab, Jl. Dr. Ir. Soekarno No. 487 Penjaringan Sari, Rungkut, Kota Surabaya, Jawa Timur, 60115";
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