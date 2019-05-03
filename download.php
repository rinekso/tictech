<?php
session_start();
$name=@$_SESSION['nameTictech'];
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
    flush(); // Flush system output buffer
    readfile($filepath);
    exit;
}
