<?php

// php -i check ini configuration
// error_reporting, error_log, display_errors
var_dump(ini_get('error_reporting'));

// everything will be reported including warning
var_dump(E_ALL, E_WARNING);
// ~E_WARNING => display_errors=0
// ini_set("error_reporting", E_ALL & ~E_WARNING);

var_dump(ini_get("display_errors"));
// ini_set("display_errors", 0);

$arr = [333];
// $arr[1];

ini_set("max_execution_time", 2);

var_dump(ini_get("max_execution_time"));

sleep(5);

echo "Hello world";

var_dump(ini_get('file_uploads'), ini_get('upload_tmp_dir'), ini_get('max_file_uploads'));

echo 'datetime';

var_dump(ini_get('date.timezone'), ini_get('include_path'));


var_dump(ini_get("memory_limit"));

$x = 'x';

for ($i=0; $i<1000; $i++) {
    $x.=$x;
}

echo $x;

