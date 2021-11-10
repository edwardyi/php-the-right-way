<?php

require_once "file.php"; // load file and x equals 5

$x++;

echo $x; // 6

require_once "file.php"; // the file is not loaded

$x++;

echo $x; // 7

echo "Hello world \n";

require "file.php"; //  x has been override by 5

$x++;

echo $x; // 6

require "file.php"; //  x has been override by 5

$x++;  

echo $x; // 6

echo "Hello world \n";