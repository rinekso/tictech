<?php
session_start();
$name=@$_SESSION['nameTictech'];
$company = @$_SESSION['companyTictech'];
if(@$_SESSION[$name."-".$company] == 1){
	echo "you have been download this portofolio, please use other name to download in our website, <a href='http://tictechstudio.com'>TicTech Studio</a>.";
}else{
	$_SESSION[$name."-".$company] = 1;
	header("assets/pdf/TICTECH-PORTOFOLIO.pdf");
}
