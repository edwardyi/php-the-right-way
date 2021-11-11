<?php

function sum_all(int $i, int $j, $rest) {

    return $i + $j + array_sum($rest);
}

$arr = [4444, 33];

echo sum_all(1, 3, $arr);

echo "\n";

// 將參數組成一個rest陣列
function sum_args(int $i, int $j, ...$rest) {
    return $i + $j + array_sum($rest);
}

echo sum_args(1,3 ,3 ,4, 6,8);