<?php

function LoadHTML($url) {

	$html = file_get_contents($url);
	$doc = new DOMDocument();
	libxml_use_internal_errors(true);
	$doc->loadHTML($html);
	$doc->saveHTML();	
	
	return $doc;
}

function GetVideoElements($doc)
{
	$i = 0;
	$tags = $doc->getElementsByTagName('li');
	
	foreach($tags as $tag) {
		$elements[$i] = $tag->getElementsByTagName('a')->item(0);
		$i++;
	}
	
	return $elements;
}

function GetHferURL($videoElement) {
	return $videoElement->getAttribute('href');
}

function GetImg($videoElement) {
	return $videoElement->getElementsByTagName('img')->item(0)->getAttribute('src');
}

function GetID($videoElement) {
	return str_replace('pic_','',$videoElement->getElementsByTagName('img')->item(0)->getAttribute('id'));
}

function GetName($videoElement) {
	return $videoElement->getElementsByTagName('span')->item(0)->nodeValue;
}

function GetURL($videodoc) {
	$str = $videodoc->getElementsByTagName('embed')->item(0)->getAttribute('flashvars');
	parse_str($str,$output);			
	return $output['flv_url'];
}

function GetTags($videodoc) {
	$i = 0;
	$tags = $videodoc->getElementsByTagName('a');
	
	foreach($tags as $tag) {
		if (is_null($tag->getAttribute('href')) == false ) {
			if ((strpos($tag->getAttribute('href'),'/tags/') !== false) && ($tag->nodeValue !== 'Tags')) {
				$tagArr[$i] = $tag->nodeValue;
				$i++;
			}
		}
	}
	
	return $tagArr;
}

function EngToArabic($text) { 

    require_once('MicrosoftTranslator.class.php');	
	$toLanguage = "ar";
	$fromLanguage = "en";
	$key = '{MYACCOUNTCODE}';
	$msTranslator = new MicrosoftTranslator($key);
	$msTranslator->translate($fromLanguage, $toLanguage, $text);
	$result =objectToArray($msTranslator->response);

	If($result['status'] == "SUCCESS"){
		libxml_use_internal_errors(true);
		$xml = simplexml_load_string($result['translation']);
		if (!$xml) {
			return $result['translation'];
		} else {
			return (string)$xml;
		}
			
	} else {
		return $text;
	}
}

function objectToArray($d) {
	if (is_object($d)) {
		$d = get_object_vars($d);
	}

	if (is_array($d)) {
		return array_map(__FUNCTION__, $d);
	}
	else {
		return $d;
	}
}
?>