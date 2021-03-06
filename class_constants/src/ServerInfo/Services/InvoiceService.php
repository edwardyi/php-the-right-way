<?php

declare(strict_types=1);

namespace App\ServerInfo\Services;

class InvoiceService
{
    public function __construct(
        protected SalesTaxService $salesTaxService,
        protected PaymentGatewayInterface $gatewayService,
        protected EmailService $emailService
    ) {

    }

    public function process(array $customer, float $amount): bool
    {
        // $salesTaxService = new SalesTaxService();
        // $gatewayService = new PaymentGatewayService();
        // $emailService = new EmailService();

        // 1. calculate sales tax
        $tax = $this->salesTaxService->calculate($amount, $customer);

        echo 'Invoice has been process <br/>';

        // 2. process invoice
        if (!$this->gatewayService->charge($customer, $amount, $tax)) {
            return false;
        }

        // 3. send receipt
        $this->emailService->send($customer, 'receipt');

        return true;
    }
}