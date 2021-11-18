<?php

namespace App\Comparison;

class Invoice
{
    public ?Invoice $linkInvoice = null;
    
    public function __construct(
        public float $amount, 
        public string $description, 
        public ?CustomInvoice $custom = null, 
        public ?Customer $customer = null)
    {
        
    }
}