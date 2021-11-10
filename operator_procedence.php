<?php

$x = true;

$y = false;

$z = $x and $y;

var_dump('$z value', $z); // true

$z = $x && $y;

var_dump('$z value', $z); // false

$z = ($x and $y);

var_dump('$z value', $z); // false
