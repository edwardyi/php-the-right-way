<?php

$x = true;

$y = false;

$z = $x and $y;

var_dump('$z value', $z);

$z = $x && $y;

var_dump('$z value', $z);

$z = ($x and $y);

var_dump('$z value', $z);
