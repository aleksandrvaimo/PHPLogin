<?php
/**
 * Copyright © ...
 */

namespace App\Test\Model\Customer;

use App\Test\Api\Data\CustomerDataInterface;
use App\Test\Api\Data\SessionInterface;

class Data implements CustomerDataInterface
{
    private ?string $username;
    private int $lastNumber = 0;
    private bool $isLoggedIn = false;

    public function __construct()
    {
        $this->setUsername($_SESSION[SessionInterface::KEY_CUSTOMER][SessionInterface::KEY_USERNAME] ?? null);
    }

    public function isLoggedIn(): bool
    {
        return $this->isLoggedIn;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getLastNumber(): int
    {
        return $this->lastNumber;
    }

    public function prepareCustomerData(array $customerData = []): void
    {
        $this->setLastNumber($customerData[SessionInterface::KEY_LAST_NUMBER] ?? 0);
        $this->isLoggedIn = isset($customerData[SessionInterface::KEY_USERNAME], $customerData[SessionInterface::KEY_LAST_NUMBER]);
    }

    private function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    private function setLastNumber(int $lastNumber): void
    {
        $this->lastNumber = $lastNumber;
    }
}
