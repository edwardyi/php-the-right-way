<?php

class customer
{
    public ?PaymentProfile $paymentProfile = null;

    public function getPaymentProfile(): ?PaymentProfile {
        return $this->paymentProfile;
    }
}