<?php
/**
 * Copyright © ...
 */

namespace App\Test\Api;

interface MessageInterface
{
    public function isMessageExists(): bool;
    public function getMessage(): string;
}
