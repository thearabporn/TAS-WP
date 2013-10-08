<?php

header('Content-Type: text/html; charset=UTF-8');
try{

	
	$inputStr = "kiss my ass";
	$toLanguage = "ar";
	$fromLanguage = "en";
	$key = 'gy5DFtM5SBKW9EOzKd7Dly6bJcRExh0WE0mq8olau6w';
	require_once('MicrosoftTranslator.class.php');
	
	$msTranslator = new MicrosoftTranslator($key);
	$msTranslator->translate($fromLanguage, $toLanguage, $inputStr);
	$result =objectToArray($msTranslator->response);
	echo "<pre>";
	var_dump( $result);
	echo "</pre>";
	$msTranslator->translate("ar", "he", $result['translation']);
	$result =objectToArray($msTranslator->response);
	echo "<pre>";
	var_dump( $result);	
	echo "<pre>";
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage() . PHP_EOL;
}	


	function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(__FUNCTION__, $d);
		}
		else {
			// Return array
			return $d;
		}
	}

?>