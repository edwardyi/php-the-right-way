<?php

$status = false;

switch ($status) {
    case false:
    case 1:
        echo 'paid';
    break;
    case 2:
        echo 'declined';
    break;
    case 3:
        echo 'accepted';
    break;
    default:
        echo 'pending';
    break;
}

match($status) {
    1 > 2 => print 'paid',
    2 => print 'declined',
    3 => print 'accepted',
    default => print 'pending'
};