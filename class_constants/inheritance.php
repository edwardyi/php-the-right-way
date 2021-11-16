<?php

use App\Inheritance\FancyOven;
use App\Inheritance\Toast;
use App\Inheritance\ToastPro;

require_once("./vendor/autoload.php");

$toast = new ToastPro();

$toast->addSlice(bread: "Bread1");
$toast->addSlice("Bread1");
$toast->addSlice("Bread1");
$toast->addSlice("Bread1");
$toast->addSlice("Bread1");
$toast->addSlice("Bread1");
$toast->addSlice("Bread1");

$toast->toast();

$toast->toastBeagle();

bar($toast);

$toastBasic = new Toast();
$toastBasic->addSlice("Bun");
$toastBasic->addSlice("Bun2");

bar($toastBasic);

function bar(Toast $toast) {
    echo "baring typein toast:\n";
    if ($toast instanceof Toast) {
        $toast->toast();
    } else {
        $toast->toastBeagle();
    }
}


$fancyOven = new FancyOven($toast);

$fancyOven->toastBeagle();