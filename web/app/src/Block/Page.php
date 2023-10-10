<?php
/**
 * Copyright © ...
 */

namespace App\Test\Block;

use App\Test\Api\PageInterface;

class Page implements PageInterface
{
    public function getTitle(): string
    {
        return self::TITLE_TEXT;
    }

    public function getName(): string
    {
        return self::TITLE_TEXT;
    }

    public function getLoginUrl(): string
    {
        return self::LOGIN_URL;
    }

    public function getLogoutUrl(): string
    {
        return self::LOGOUT_URL;
    }

    public function getUpdateNumberUrl(): string
    {
        return self::UPDATE_NUMBER_URL;
    }
}
