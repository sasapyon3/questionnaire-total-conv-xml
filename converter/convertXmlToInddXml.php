<?php
require_once(dirname(__FILE__) . '/' . './class/XmlToInddXmlConverter.php');

$timeStart = microtime(true);

$converterObj = new XmlToInddXmlConverter();
$converterObj->convert($argc, $argv);

$timeEnd = microtime(true);
$time    = $timeEnd - $timeStart;

echo '.....finish (' . $time . ' sec)' , PHP_EOL;
