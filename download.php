<?php
session_start();
$name=$_SESSION['nameTictech'];
$company = $_SESSION['companyTictech'];
if(@$_SESSION[$name."-".$company] == 0){
	echo "you have been download this portofolio, please use other name to download in our website, TicTech Studio."
}else{
	$_SESSION[$name."-".$company] = 1;
	header("assets/pdf/TICTECH-PORTOFOLIO.pdf");
}
