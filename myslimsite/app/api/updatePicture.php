<?php

$path = $_POST['path'];



// Check file exist or not
if( file_exists($path) ){

// Remove file 
 unlink($path);
}

?>