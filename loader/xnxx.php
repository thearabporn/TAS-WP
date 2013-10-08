<?php

ini_set('max_execution_time', 300);
require('INC/xnxx_func.php');

$xnxxUrl = 'http://www.xnxx.com/video';
$doc = LoadHTML('http://www.xnxx.com/tags/arab/');
$videoElems = GetVideoElements($doc);

$max = sizeof($videoElems);
//change later 
$max = 1;
for($i=0; $i<$max; $i++) {
	//$videourl = GetHferURL($videoElems[$i]);
	//$video['xnxxurl'] = GetHferURL($videoElems[$i]);
	//$video['url'] = GetURL($videodoc);
	$video['id'] = GetID($videoElems[$i]);
	$video['img'] = GetImg($videoElems[$i]);
	$video['descEN'] = GetName($videoElems[$i]);
	$video['descAR'] = EngToArabic($video['descEN']);
	$videodoc = LoadHTML($xnxxUrl.$video['id'].'/');
	$video['tag'] = GetTags($videodoc);
	$videos[$i] = $video;
	sleep(1);
} 
echo "<pre>";
var_dump($videos);
echo "</pre>";
?>