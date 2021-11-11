<?php

declare(strict_types=1);

function foo(int $x, int $y): int {

    if ($y % $x == 1) {
        $x = 2;
    }

    return $x * $y;
}

$x = 6;
$y = 7;

var_dump(foo(y: $y, x: $x));

echo "\n";

var_dump($x, $y);

// unpacking
$arr = ["x" => 6, "y" => 7];

var_dump(foo(...$arr));