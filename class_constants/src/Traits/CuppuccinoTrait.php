<?php

namespace App\Traits;

trait CuppuccinoTrait
{
    protected string $milkType = 'whole_wheat';

    private function makeCappuccino() 
    {
        echo static::class." make cappuccino with ".$this->getMilkType().PHP_EOL;
        echo static::class." make cappuccino with ".$this->milkType.PHP_EOL;
    }

    // static binding at runtime
    public function setMilkType(string $milkType): static 
    {
        $this->milkType = $milkType;

        return $this;
    }

    public function makeLatte()
    {
        echo __CLASS__. " make latte using cuppuccino ".PHP_EOL;
    }

    public abstract function getMilkType(): string;

    /**
     * not prefer this way 
     *public function getMilkType(): string 
    {

        if (property_exists($this, 'milkType')) {
            return $this->milkType;
        }
        return '';
    } 
     */
    
}