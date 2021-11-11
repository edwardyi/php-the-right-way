<?php

$y = 6;

function foo() {
    global $y;

    echo $y;
}

echo foo();


echo "\n";

$x = 5;

include("script1.php");

echo $x;