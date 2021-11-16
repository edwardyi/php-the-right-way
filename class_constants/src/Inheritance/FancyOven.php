<?php

namespace App\Inheritance;

class FancyOven
{
    // composition toastpro promotion
    public function __construct(private ToastPro $toast)
    {
        echo 'fancy oven';
        echo "\n";  
    }

    public function toast()
    {
        $this->toast->toast();
    }

    public function toastBeagle()
    {
        $this->toast->toastBeagle();
    }
}