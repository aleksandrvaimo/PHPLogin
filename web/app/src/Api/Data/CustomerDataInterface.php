<?php
/**
 * Copyright © ...
 */

namespace App\Test\Api\Data;

interface CustomerDataInterface
{
    public function isLoggedIn(): bool;
    public function getUsername(): ?string;
    public function getLastNumber(): int;
    public function prepareCustomerData(array $customerData = []): void;
}
