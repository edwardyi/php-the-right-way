<?php

use App\Fields\{Button, Checkbox, Input, RadioButton};

require_once("./vendor/autoload.php");

$fields = [
    new Button('button-demo'),
    new Input('input-demo'),
    new RadioButton('radio-demo'),
    new Checkbox('checkbox-demo')
];

foreach ($fields as $field) {
    echo $field->render().'<br/>';
}


/**
$fields = [
    Button::class => 'button-demo',
    Input::class => 'input-demo',
    RadioButton::class => 'radio-demo'
];

$htmlStr = '';

foreach ($fields as $field => $name) {
    $htmlStr .= (new $field($name))->render()."<br/>";
}

echo $htmlStr; */
// var_dump($fields);