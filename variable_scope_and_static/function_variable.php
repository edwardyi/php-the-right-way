<?php

function sum(int | float $x, $y, int | float  ...$data) {
    return $x + $y + array_sum($data);
}

$fun = 'sum';

if (is_callable($fun)) {
    echo sum(1, 3, 5, 6);
} else {
    echo 'not callable';
}

echo "\n";

$local = 10;

$total = function (int|float ...$numbers) use (&$local): int|float {
    $local = $local + 11;
    return array_sum($numbers) + $local;
};

echo $total(3, 3, 6, 7);

echo "\n";

echo $local;


$arr = [1, 2, 3, 5];

$arr1 = array_map(function($row) {
    return $row * 2;
}, $arr);

var_dump($arr);
var_dump($arr1);

echo "\n";

echo "closure map test:";

$callbackInstance = function (Closure $callback, int|float ...$numbers): int|float {
    return $callback(array_sum($numbers));
};

echo $callbackInstance(function($row) {
  return $row * 2;
}, 1, 3, 5, 7);


$localY = 10;
// arrow function
$data = array_map(fn($number) => $number * $number * ++$localY, [1, 2, 3, 4]);

var_dump($data);

echo $localY;

echo "\n";