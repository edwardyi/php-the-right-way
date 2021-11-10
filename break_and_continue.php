<?php

// while 

$value = 0;
while ($value <= 15) {
    while ($value % 2 == 0) {
        // return and increment value
        echo $value;
        break;
    }
    $value++;
}

echo "\n";

// for
// $length = 15;

for ($i=0, $length = 15; $i<$length; $i++) {
    if ($i % 2  == 0) {
        continue;
    }
    echo $i;
}

echo "\n";

$data = [
    'title' => 'programming language',
    'language' => ['php', 'go', 'c']
];

foreach($data as $key => $language) {
    if (is_array($language)) {
        $language = implode(',', $language);
    }

    echo $language;
}

echo "\n";

$str = "Hello World";

for($i=0, $length = strlen($str); $i<$length; $i++) {
        echo $str[$i].' ';
}