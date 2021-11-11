<?php

var_dump(foo(null));

function foo($val): ?int {
    return $val;
}