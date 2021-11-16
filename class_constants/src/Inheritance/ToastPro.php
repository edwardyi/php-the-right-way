<?php

namespace App\Inheritance;

class ToastPro extends Toast
{
    public int $size;

    public function __construct()
    {
        parent::__construct();
        $this->size = 4;
    }

    // can not override final
    // public function addSlice(string $bread): void
    // {
    //     if (count($this->slices) < $this->size) {
    //         $this->slices[] = $bread;
    //     }
    // }


    public function toast()
    {
        foreach($this->slices as $i => $slice) {
            echo ($i + 1)." : Toasting ". $slice. PHP_EOL;
        }
    }

    public function toastBeagle()
    {
        foreach($this->slices as $i => $slice) {
            echo ($i + 1)." : Beagle Toasting " .$slice. PHP_EOL;
        }
    }
}