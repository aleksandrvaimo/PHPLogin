<?php
/**
 * Copyright © ...
 */

namespace App\Test\Api;

interface LoginInterface
{
    const PATTERN = '/[^a-zA-Z0-9-]+/';
    const PARAM_USERNAME = 'username';
    const PARAMS = ['username', 'password'];

    public function authenticate(string $username, string $password): void;
    public function isPostParamsExists(): bool;
}
