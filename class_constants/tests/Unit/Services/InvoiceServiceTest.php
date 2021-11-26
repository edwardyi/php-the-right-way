<?php

namespace Tests\Unit\Services;

use App\Mocking\EmailService;
use App\Mocking\InvoiceService;
use App\Mocking\PaymentGatewayService;
use App\Mocking\SalesTaxService;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{
    /** @test */
    public function it_processes_invoice(): void
    {
        // create mock for class
        $mockSalesTaxService = $this->createMock(SalesTaxService::class);
        $mockGatewayService = $this->createMock(PaymentGatewayService::class);
        $mockEmailService = $this->createMock(EmailService::class);

        // stubs method for charge(specify return value)
        $mockGatewayService->method('charge')->willReturn(true);
        
        // given invoice service
        $invoiceService = new InvoiceService($mockSalesTaxService, $mockGatewayService, $mockEmailService);

        $customer = ["name" => 'test'];
        $amount = 150;

        // when process is called
        $result = $invoiceService->process($customer, $amount);

        $this->assertTrue($result);
    }


    /** @test */
    public function it_sends_receipt_email_when_invoice_is_processed(): void
    {
        // create mock for class
        $mockSalesTaxService = $this->createMock(SalesTaxService::class);
        $mockGatewayService = $this->createMock(PaymentGatewayService::class);
        $mockEmailService = $this->createMock(EmailService::class);

        // stubs method for charge(specify return value)
        $mockGatewayService->method('charge')->willReturn(true);

        // mocking passing name parameter with the value demo
        // if passing different value will fail the test
        $mockEmailService
            ->expects($this->once())
            ->method('send')
            ->with(['name' => 'demo'], 'receipt');

        // given invoice service
        $invoiceService = new InvoiceService($mockSalesTaxService, $mockGatewayService, $mockEmailService);

        $customer = ["name" => 'demo'];
        $amount = 150;

        // when process is called
        $result = $invoiceService->process($customer, $amount);

        $this->assertTrue($result);

    }
}