<?php
$base = "localhost/tictechTemplate";
$request = $_SERVER['REQUEST_URI'].$base;
$params = split("/", $request);
echo count($params);
$i=0;
while(count($params) <= $i){
	echo $params[$i];
	$i++;
}
if(count($params)>0){

}
