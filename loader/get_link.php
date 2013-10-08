<?php
/*include('include/class.htmlParser.php');

$html = file_get_contents('http://www.xnxx.com/tags/arab');
	
$dom = new DOMDocument();

$dom->loadHTML($html);

$xpath = new DOMXPath($dom);
$divContent = $xpath->query('//div[class="thumbs"]');

var_dump($divContent);*/


$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTMLFile('http://www.xnxx.com/tags/arab');
//var_dump($dom);
/*$xpath = new DOMXPath($dom);
$divContent = $xpath->query('//div[class="thumbs"]');*/

//var_dump($divContent);
$data = $dom->getElementById("_atssh906");
var_dump($data);

	
?>