<?php

namespace App\Fields;

class Input extends Field
{
    public function render(): string {
        return <<<HTML
            <input type="input" name="{$this->name}" />
        HTML;
    }
}