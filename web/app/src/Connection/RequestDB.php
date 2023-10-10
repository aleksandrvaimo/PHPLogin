<?php

namespace App\Test\Connection;

class RequestDB extends MyDB
{
    public function authenticateUser(string $username = '', string $password = ''): bool
    {
        if (!$this->isUserExists($username)) {
            $this->createUser($username, $password);
        }

        $storedPassword = $this->getUsersPassword($username);

        return password_verify($password, $storedPassword);
    }

    public function getUserByUsername(string $username): bool|array
    {
        $sql = 'SELECT username, last_number FROM user WHERE username = :username';
        $row = $this->getDbRequest($sql, [':username' => $username]);

        return $row && $row['username'] ? $row : false;
    }

    public function updateNumber(string $username, int $number = 0): void
    {
        $sql = 'UPDATE user SET last_number = :last_number WHERE username = :username';
        $this->getDbRequest($sql, [':username' => $username, ':last_number' => $number]);
    }

    public function isUserExists(string $username = ''): bool
    {
        $sql = 'SELECT COUNT(*) AS count FROM user WHERE username = :username';
        $row = $this->getDbRequest($sql, [':username' => $username]);

        return $row && $row['count'] > 0;
    }

    private function getUsersPassword(string $username): string
    {
        $sql = 'SELECT password FROM user WHERE username = :username';
        $row = $this->getDbRequest($sql, [':username' => $username]);

        return $row ? $row['password'] : '';
    }

    private function createUser(string $username, string $password): void
    {
        $sql = 'INSERT INTO user VALUES (:username, :password, :last_number)';
        $options = ['cost' => self::BCRYPT_COST];
        $derivedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

        $this->getDbRequest($sql, [':username' => $username, ':password' => $derivedPassword, ':last_number' => 0], true);
    }
}
