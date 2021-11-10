<?php

function sum($i, $j) {
    $k = $i + $j;

    return $k;
}

echo sum(13, 3);

function onTick() {
    echo "tick \n";
}

register_tick_function('onTick');

declare(ticks=3);

for ($i=0; $i<10; $i++) {
    echo $i;
}