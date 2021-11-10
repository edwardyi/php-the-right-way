<?php

$data = [3, 2, 1, 5, 4];

foreach ($data as $val) {
    switch($val) {
        case 1:
            echo 'accepted';
            continue 2;
        case 2:
        case 3:
            echo 'rejected';
        break;
        case 4:
            echo 'other';
        break;
        default:
            echo 'unknown';
        break;
    }

    echo "\n";
}

function x() {
    sleep(3);

    echo "Done \n";

    return 3;
}

$x = x();

if ($x == 1) {
    echo 1;
} elseif ($x == 2) {
    echo 2;
} elseif ($x == 3) {
    echo 3;
} else {
    echo 4;
}

switch (x()) {
    case 1:
        echo 1;
    break;
    case 2:
        echo 2;
    break;
    case 3:
        echo 3;
    break;
    case 4:
        echo 4;
    break;
    default:
        echo 5;
    break;
}