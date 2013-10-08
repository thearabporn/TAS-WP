<?php
$server = $_SERVER['SERVER_ADDR'];
$remote = $_SERVER['REMOTE_ADDR'];
if (!trim($_SERVER['SERVER_ADDR']) == trim($_SERVER['REMOTE_ADDR'])){
	echo "hello1";
    header('HTTP/1.0 403 Forbidden');
    echo "<h1>403 Forbidden</h1>";
    echo "The server understood the request, but is refusing to fulfill it.";
	exit;
}
if (strcmp($server,$remote)){
    header('HTTP/1.0 403 Forbidden');
    echo "<h1>403 Forbidden</h1>";
    echo "The server understood the request, but is refusing to fulfill it.";
	exit;
}
try {

	if (! @include_once( '/INC/xnxx_func.php' )){
		echo "<h1>400 Bad Request</h1>";
		echo "The request could not be understood by the server due to malformed syntax.";
		exit;
	}	
	
	//Code Start	
	if (!isset( $_GET['p'])){
		header('HTTP/1.0 400 Not Found');
		echo "<h1>400 Bad Request</h1>";
		echo "The request could not be understood by the server due to malformed syntax.";
		exit;
	}	
	
	$videoId = $_GET['p'];
	$videodoc = LoadHTML('http://www.xnxx.com/video'.$videoId.'/');
	$flv = GetURL($videodoc);
	
	echo $flv;
	exit;
	
}
catch(Exception $e) {    
    echo "<h1>400 Bad Request</h1>";
    echo "The request could not be understood by the server due to malformed syntax.";
	exit;
}

?>