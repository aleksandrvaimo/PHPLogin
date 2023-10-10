<?php
/**
 * Copyright © ...
 */

namespace App\Test\Model;

use App\Test\Api\MessageInterface;
use App\Test\Api\Data\SessionInterface;

class Message implements MessageInterface
{
    private ?bool $isMessageExists = null;

    public function isMessageExists(): bool
    {
        if ($this->isMessageExists === null) {
            $this->isMessageExists = isset($_SESSION[SessionInterface::KEY_MSG]) &&
                !empty($_SESSION[SessionInterface::KEY_MSG]);
        }

        return $this->isMessageExists;
    }

    public function getMessage(): string
    {
        $message = '';

        if ($this->isMessageExists()) {
            $message = $_SESSION[SessionInterface::KEY_MSG];
            unset($_SESSION[SessionInterface::KEY_MSG]);
        }

        return $message;
    }
}
