<?php

$currentTime = time();

var_dump($currentTime);

$fiveDayLater = time() + 24 * 60 * 60 * 5;

var_dump($fiveDayLater);

var_dump(date("Y/m/d g:ia", $currentTime));
var_dump(date("Y/m/d g:ia", $fiveDayLater));

date_default_timezone_set("UTC");


var_dump(date("Y/m/d g:ia", $currentTime));
var_dump(date("Y/m/d g:ia", $fiveDayLater));


echo date("Y/m/d g:ia", mktime(0, 0 , 0, 11, 12, 2021));

echo "\n";

$decemberDay = date("Y/m/d g:ia", strtotime("first day of December"));

var_dump(date_parse($decemberDay));

var_dump(date_parse_from_format('Y/m/d g:ia', $decemberDay));


