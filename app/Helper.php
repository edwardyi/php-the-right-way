<?php

function getFormattedPrice($price) {
    return ($price > 0  ? "" : "-")."$".abs($price);
}