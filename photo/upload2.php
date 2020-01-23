<?php
if(!empty(@$_FILES['file']['name'])){
	$file = $_FILES['file'];
	$name = $file['name'];
	$path_parts = pathinfo($name);
	$ext = $path_parts['extension'];
	$rand = rand(10000,99999);
	$name = $rand.".".$ext;

	// Opens directory
	$myDirectory=opendir("storage/");

	// Gets each entry
	while($entryName=readdir($myDirectory)) {
	   $dirArray[]=$entryName;
	}

	// Closes directory
	closedir($myDirectory);

	// Counts elements in array
	$indexCount=count($dirArray);

	// Sorts files
	sort($dirArray);

	if($indexCount == 0)
		$name = "NyayataXTictechPhotobooth-0.jpg";
	else
		$name = "NyayataXTictechPhotobooth-".($indexCount-7).".jpg";
	$r = move_uploaded_file($_FILES['file']['tmp_name'], 'storage2/'.$name);
	if($r)
		echo "https://".$_SERVER['SERVER_NAME']."/photo/storage2/";
	else
		echo "nope, somethings wrong";
}else{
	// phpinfo();
	echo "there is no file to upload";
}

?>