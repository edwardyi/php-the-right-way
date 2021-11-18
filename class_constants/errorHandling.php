<?php

use App\ErrorHandling\{Customer, Invoice};

require_once("./vendor/autoload.php");

set_exception_handler(function(\Throwable $e) {
    var_dump('error_handler:', $e->getMessage());
});

echo 'value of process:', process().PHP_EOL;

array_rand([], 1);

function foo() {
    echo "FOO ".PHP_EOL;
    return false;
}

function process()
{
    
    $customer = (new Customer(['testing info']))->setName('test customer');
    // $customer = new Customer();
    // $customer->setName('demo customer');
    
    // $invoice->setAmount(-33);
    // $invoice->setAmount(1001);
    // $invoice->setAmount(31);
    $invoice = new Invoice($customer);
    try {
        $invoice->process(11);
        // $invoice->process(3311);

        return true;
    } catch (InvalidArgumentException | App\ErrorHandling\AmountIsTooBigException $e) {
        var_dump($e->getMessage());
        return false;
    } catch (ValueError $e) {
        var_dump($e->getMessage());

        return foo();
    } catch (Exception) {
        echo 'some example';

        return false;
    } finally {
        echo 'finally'.PHP_EOL;
        return -100000;
    }
}



// var_dump($invoice);
