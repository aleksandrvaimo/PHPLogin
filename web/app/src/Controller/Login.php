<?php
/**
 * Copyright © ...
 */

namespace App\Test\Controller;

use App\Test\Api\LoginInterface;
use App\Test\Api\Data\SessionInterface;

class Login
{
    const KEY_USERNAME = 'username';
    const KEY_PASSWORD = 'password';
    const MSG_FAIL = 'Something is not correct with parameters';

    private LoginInterface $login;

    public function __construct(LoginInterface $login)
    {
        $this->login = $login;
    }

    public function execute(): void
    {
        if (!$this->login->isPostParamsExists()) {
            $_SESSION[SessionInterface::KEY_MSG] = $_SESSION[SessionInterface::KEY_MSG] ?? self::MSG_FAIL;
        } else {
            try {
                $this->login->getCustomer($_POST[self::KEY_USERNAME] ?? null, $_POST[self::KEY_PASSWORD] ?? null);
            } catch (\Exception $ex) {
                $_SESSION[SessionInterface::KEY_MSG] = $ex->getMessage();
            }
        }

        header('Location: /');
    }
}
