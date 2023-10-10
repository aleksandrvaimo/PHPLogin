<?php
/**
 * Copyright © ...
 */

namespace App\Test\Api;

interface PageInterface
{
    const LOGIN_URL = './page/login/';
    const LOGOUT_URL = './page/logout/';
    const UPDATE_NUMBER_URL = './page/update-number/';
    const TITLE_TEXT = 'Counter web application';

    public function getTitle(): string;
    public function getName(): string;
    public function getLoginUrl(): string;
    public function getLogoutUrl(): string;
    public function getUpdateNumberUrl(): string;
}
