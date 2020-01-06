<?php
session_start();
$name = @$_SESSION['nameTictech'];
$company = @$_SESSION['companyTictech'];
if(@$_SESSION[$name."-".$company] == 2){
	echo "you have been download this portofolio, please use other name to download in our website, <a href='http://tictechstudio.com'>TicTech Studio</a>.";
}else{
	$_SESSION[$name."-".$company] = 1;
	$filepath = "./assets/pdf/TICTECH-PORTOFOLIO.pdf";

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    // echo $filepath;
    flush(); // Flush system output buffer
    readfile($filepath);
    exit;
}
function retrieve_remote_file_size($url){
     $ch = curl_init($url);

     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
     curl_setopt($ch, CURLOPT_HEADER, TRUE);
     curl_setopt($ch, CURLOPT_NOBODY, TRUE);

     $data = curl_exec($ch);
     $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

     curl_close($ch);
     return $size;
}
function addUser(){
    $nama = $path->nama();
    $val = $path->val();
    $n = $path->number();
    $a = $path->address();
    User::add($nama,$val,$n,$a);

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['company'] = $_POST['company'];
    $_SESSION[$_POST['name']."-".$_POST['company']] = 0;
    
    $mail = new PHPMailer; // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
    $mail->Subject = "example email";
    $mail->Body =  'Greetings '.$_POST['name'].' from '.$_POST['company'];
    $mail->AddAddress($_POST['email']);
    $mail->Send();

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filepath));
    flush(); // Flush system output buffer
    readfile($filepath);
    exit;
}
function deleteuser(){
    User::delete($id);
}