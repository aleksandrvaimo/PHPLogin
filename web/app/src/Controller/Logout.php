<?php
/**
 * Copyright © ...
 */

namespace App\Test\Controller;

class Logout
{
    public function execute(): void
    {
        $_SESSION = [];

        header('Location: /');
    }
}
