<?php

$arr = [1, 2, 3, 4, 5, 6, 7];

// Chunk an array into a list of smaller chunks of arrays - array_chunk
var_dump(array_chunk($arr, 3));


// Combine arrays to form a new array - array_combine
$a = ["apple", "banana", "cherry"];
$b = [3, 4, 6];

$fruitStores = array_combine($a, $b);
var_dump($fruitStores);


 // search key position

var_dump(array_keys($arr, 7));

// Filter array - array_filter
$filterData = array_filter($arr, fn($number, $key)=> $number % 2 == 0, ARRAY_FILTER_USE_BOTH);


// Re-index array - array_values
$even = array_values($filterData);

var_dump($even);

// Filter array with no callback - array_filter
$filterNoCallback = [1, 3, "", [], "gg"];

var_dump("no callback:", array_filter($filterNoCallback));

//  Get keys of an array - array_keys

var_dump(array_keys($fruitStores));

// Iterate over array elements & apply callback - array_map

$doubleData = array_map(fn($number) => $number * 2, $fruitStores);

var_dump($doubleData);

// Merge arrays - array_merge

$c = ["1", "b" => 3, 6];
$d = [33, "b" => 66, 44];

$mergeData = array_merge($c, $d);

var_dump($mergeData);

// Search for a value in an array & find its key - array_search

$found = array_search("1", $mergeData);
if ($found === false) {
    echo "no found";
}

var_dump("found in array_search:", $found);

//  Find the difference between arrays by comparing values - array_diff
$e = [1, 2, 3, "g" => 4, 5];
$f = [1, 3, 8, 9, 10];
$g = [11, 12, 13, 14, 15];


//  Find the difference between arrays by comparing both keys & values - array_diff_assoc, array_diff_keys
var_dump(array_diff($e, $f, $g), array_diff_assoc($e, $f, $g), array_diff_key($e, $f, $g));


// Sort array by values - asort

$h = [3, 1, 3, 6, 8 ,2, 4];

var_dump($h);
// Sort array by values - asort
asort($h);

var_dump($h);

// Sort array by using custom function
usort($h, fn($a, $b) => $a <=> $b);

var_dump($h);

// Array destructuring
$arrResult = [2, 3, 5, [3, "GG"]];

[$x, $y, $z, [$xx, $yy]]= $arrResult;

var_dump($x, $y, $z ,$xx, $yy);




