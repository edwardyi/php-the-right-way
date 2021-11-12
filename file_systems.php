<?php

// List of all files & directories - scandir

// $dir = scandir('./');
$dir = scandir(__DIR__);

var_dump($dir);

// Check if file is a directory or a file - is_dir / is_file

var_dump(is_dir('./apache'), is_file('./apache'));

// Create & delete directories - mkdir / rmdir

$testDir = './test-dir';
$testFile = $testDir.'/test.txt';

mkdir($testDir);

// add test.txt to test directory
file_put_contents($testFile, "hello-world-testing");

file_put_contents($testFile, "\n another world", FILE_APPEND);

echo 'filesize:'.filesize($testFile);
sleep(10);
// Clear cached values of functions like filesize - clearstatcache
clearstatcache();

echo 'filesize:'.filesize($testFile);
echo "\n";

if (!file_exists($testFile)) {
    echo $testFile.' not found!';
    return;
}

$handle = fopen($testFile, "r");

var_dump('test assign value:', ($test = fgets($handle)));

// Read files line by line - fgets / fclose
while (($line = fgets($handle)) !== false) {
    echo $line;
}

fclose($handle);


// Check if file or directory exists & print filesize - file_exists / filesize

if (file_exists($testDir)) {
    unlink($testFile);
    rmdir($testDir);
}

echo 'done!';

