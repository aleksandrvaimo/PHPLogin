<?php
/**
 * Copyright © ...
 */

namespace App\Test\Model\Request;

use App\Test\Api\CustomerInterface;
use App\Test\Api\Data\SessionInterface;
use App\Test\Api\LoginInterface;

class Login implements LoginInterface
{
    private CustomerInterface $customer;

    public function __construct(CustomerInterface $customer)
    {
        $this->customer = $customer;
    }

    public function getCustomer(string $username, string $password): void
    {
        if ($this->customer->isCustomerExists($username, $password)) {
            $_SESSION[SessionInterface::KEY_CUSTOMER] = $this->customer->getCustomerByUsername($username);
        } else {
            $_SESSION[SessionInterface::KEY_MSG] = 'User does not exists. Please check username and password.';
        }
    }

    public function isPostParamsExists(): bool
    {
        foreach (self::PARAMS as $parameter) {
            if (!in_array($parameter, self::PARAMS) ||
                empty($_POST[$parameter]) ||
                !$this->isValid($parameter)
            ) {
                return false;
            }
        }

        return true;
    }

    private function isValid(string $param): bool
    {
        return $this->validate($param);
    }

    private function validate(string $param): bool
    {
        $this->sanitize($param);

        if (strlen($_POST[$param]) < 3) {
            $_SESSION[SessionInterface::KEY_MSG] = $param . ' must be at least 3 characters in length';

            return false;
        }

        if ($param == self::PARAM_USERNAME &&
            preg_match(self::PATTERN, $_POST[$param], $matches)
        ) {
            $_SESSION[SessionInterface::KEY_MSG] = $param . ' should contain characters a-zA-Z0-9-';

            return false;
        }

        return true;
    }

    private function sanitize(string $param): void
    {
        $_POST[$param] = trim(stripslashes(htmlspecialchars($_POST[$param])));
    }
}
