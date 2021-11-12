<?php

function errorHandler (
    int $number,
    string $msg,
    ?string $file = null,
    ?int $line = null
) {

    echo "error no: ".$number." message:". $msg. " file:".$file." of line number:".$line;


    return ;
}

// get all error message except user warning and warning
error_reporting(E_ALL & ~E_WARNING & ~E_USER_WARNING);

// handle all error except user warning, warning and user notice
set_error_handler("errorHandler", E_ALL & ~E_USER_WARNING & ~E_WARNING & ~E_USER_NOTICE);

echo $x;
// trigger_error("Testing trigger error", E_WARNING);
trigger_error("User Testing trigger error", E_USER_WARNING);

echo "after trigger error print 1";

error_reporting(E_ALL & ~E_WARNING);


ini_set("display_errors", 1);

ini_set("error_reporting", 0);
var_dump(ini_get('error_reporting'));

$x[0];
trigger_error("[trigger testing]");