<?php
require_once(dirname(__FILE__) . '/' . './class/CsvToXmlConverter.php');

$timeStart = microtime(true);

$converterObj = new CsvToXmlConverter();
$converterObj->convert($argc, $argv);

$timeEnd = microtime(true);
$time    = $timeEnd - $timeStart;

echo '.....finish (' . $time . ' sec)' , PHP_EOL;
