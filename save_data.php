<?php
// set a path to the directory 'data'
$dir = 'data';
// check if the directory exists
If (!is_dir($dir)) {
	// create the directory if it does not exist
	mkdir($dir);
}
// the $_POST[] array will contain the passed in filename and data
// the directory "data" is writable by the server (chmod 777)
$filename = "data/".$_POST['filename'];
$num = 1;
while(file_exists($filename)) {
	$filename = "data/".$_POST['filename'];
	$num++;
}
$data = $_POST['filedata'];
// write the file to disk
file_put_contents($filename, $data);
?>