<?php

namespace App\Fields;

class Checkbox extends Field
{
    public function render(): string {
        return <<<HTML
            <input type='checkbox' name="{$this->name}" />
        HTML;
    }

}