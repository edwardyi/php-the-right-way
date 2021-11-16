<?php

namespace App\Fields;

use App\Fields\Field;

class Button extends Field
{

    public function render(): string {
        return <<<HTML
            <button value="{$this->name}">"{$this->name}"</button>
        HTML;
    }

}