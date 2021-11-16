<?php

namespace App\Fields;

use App\Fields\Field;

class RadioButton extends Field
{
    public function render(): string {
        return <<<HTML
            <input type="radio" name="{$this->name}" />
            HTML;
    }
}