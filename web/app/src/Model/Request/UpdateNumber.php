<?php
/**
 * Copyright © ...
 */

namespace App\Test\Model\Request;

use App\Test\Api\CustomerInterface;
use App\Test\Api\UpdateNumberInterface;

class UpdateNumber implements UpdateNumberInterface
{
    private CustomerInterface $customer;

    public function __construct(CustomerInterface $customer)
    {
        $this->customer = $customer;
    }

    public function getUpdatedNumber(): int
    {
        $customer = $this->customer->getCustomer();
        $username = $customer->getUsername();
        $number = $customer->getLastNumber() + 1;

        if (!empty($username)) {
            $this->customer->updateNumber($username, $number);
        }

        return $number;
    }

    public function getLastNumber(): int
    {
        $customer = $this->customer->getCustomer();

        return $customer->getLastNumber();
    }
}
