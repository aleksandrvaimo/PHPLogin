<?php
/**
 * Copyright © ...
 */

namespace App\Test\Model;

use App\Test\Api\CustomerInterface;
use App\Test\Connection\RequestDB;
use App\Test\Api\Data\CustomerDataInterface;
use App\Test\Api\Data\SessionInterface;

class Customer implements CustomerInterface
{
    private RequestDB $db;
    private CustomerDataInterface $customer;

    public function __construct(RequestDB $db, CustomerDataInterface $customer)
    {
        $this->db = $db;
        $this->customer = $customer;
    }

    public function isCustomerExists(string $username = '', string $password = ''): bool
    {
        return $this->db->authenticateUser($username, $password);
    }

    public function getCustomerByUsername(string $username = ''): bool|array
    {
        $customer = $this->db->getUserByUsername($username);

        return $customer
            ? [self::KEY_LOGGED_IN => true,
                self::KEY_USERNAME => $customer[SessionInterface::KEY_USERNAME],
                self::KEY_LAST_NUMBER => $customer[SessionInterface::KEY_LAST_NUMBER]]
            : false;
    }

    public function updateNumber(string $username = '', int $number = 0): void
    {
        $this->db->updateNumber($username, $number);
    }

    public function getCustomer(): CustomerDataInterface
    {
        $username = $this->customer->getUsername();

        if ($username) {
            $customer = $this->db->getUserByUsername($username);
            $this->customer->prepareCustomerData($customer);
        }

        return $this->customer;
    }
}
