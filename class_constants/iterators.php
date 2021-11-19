<?php

use App\Iterator\Invoice;
use App\Iterator\InvoiceAggragate;
use App\Iterator\InvoiceCollection;

require_once('./vendor/autoload.php');

foreach ([1, 3, 5, "b", "d"] as $key => $value) {
    echo $key, '=>', $value.PHP_EOL;
}

class NonIterateObject {
    public int $id;
    public function __construct(public int $value)
    {
        
    }
}

foreach(new NonIterateObject(33) as $key => $value) {
    echo $key.'=>'.$value.PHP_EOL;
}

// $invoices = new Invoice(3);
// $invoices = new Invoice(4);
// $invoices = new Invoice(5);

$invoiceCollection = new InvoiceCollection([new Invoice(33), new Invoice(34), new Invoice(99)]);

foreach ($invoiceCollection as $invoice) {
    // var_dump($invoice);

    echo $invoice->id . '-'. $invoice->amount.PHP_EOL;

    // var_dump($key, $value);
}


$invoiceAggragations = new InvoiceAggragate([new Invoice(343), new Invoice(23), new Invoice(2313)]);

foreach ($invoiceAggragations as  $invoice) {
    echo $invoice->id. '=>'. $invoice->amount.PHP_EOL;
}

foo($invoiceCollection);
foo([3, 34]);

function foo(InvoiceCollection|array $items)
{
    foreach ($items as $item) {
        echo 'inside foo'.PHP_EOL;
        var_dump($item);
    }
}

bar($invoiceAggragations);
bar([123, 556, 888]);

// IteratorAggregate
function bar(iterable $items) {
    foreach ($items as $item) {
        echo 'bar'.PHP_EOL;
        var_dump($item);
    }
}