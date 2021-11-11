<?php

function process() {
    static $val = null;
    
    if ($val == null) {
        $val = longProcessCommand();
    }
    return $val;
}

function longProcessCommand() {
    sleep(2);
    echo 'processing';

    return 14;
}


echo process();
echo "\n";
echo process();
echo "\n";
echo process();