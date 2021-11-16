<?php

namespace App\PaymentGateway\Paddle;

use App\Enum\Status;
use InvalidArgumentException;

class Transaction
{
    private string $status = Status::PENDING;

    /**
     * set default status using construct
     */
    public function __construct()
    {
        $this->setStatus(Status::PENDING);
    }

    public function setStatus(string $status): self
    {
        if (!isset(Status::ALL_STATUSES[$status])) {
            throw new InvalidArgumentException("Invalid status");
        }
        $this->status = $status;

        return $this;
    }
    
}