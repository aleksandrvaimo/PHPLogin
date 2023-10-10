<?php
/**
 * Copyright © ...
 */

namespace App\Test\Api;

use App\Test\Api\Data\CustomerDataInterface;

interface CustomerInterface
{
    const KEY_LOGGED_IN = 'logged_in';
    const KEY_USERNAME = 'username';
    const KEY_LAST_NUMBER = 'last_number';

    public function isCustomerExists(string $username = '', string $password = ''): bool;
    public function getCustomerByUsername(string $username = ''): bool|array;
    public function updateNumber(string $username = '', int $number = 0): void;
    public function getCustomer(): CustomerDataInterface;
}
