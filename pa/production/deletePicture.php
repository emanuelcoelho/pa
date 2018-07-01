<?php

$path = $_POST['path'];



// Check file exist or not
if( file_exists($path) ){
	echo "file exist";

// Remove file 
 unlink($path);
}

?>