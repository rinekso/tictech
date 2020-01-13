<?php
echo $_FILES['file']['name'];
/*
if(!empty(@$_FILES['file']['name'])){
	$file = $_FILES['file'];
	$name = $file['name'];
	$path_parts = pathinfo($name);
	$ext = $path_parts['extension'];
	$rand = rand(10000,99999);
	$name = $rand.".".$ext;
	$r = move_uploaded_file($_FILES['file']['tmp_name'], 'storage/'.$name);
	if($r)
		echo $_SERVER['SERVER_NAME']."/photo/storage/".$name;
	else
		echo "nope, somethings wrong";
}else{
	// phpinfo();
	echo "there is no file to upload";
}
*/
?>