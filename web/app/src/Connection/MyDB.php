<?php

namespace App\Test\Connection;

use SQLite3;

class MyDB extends SQLite3
{
    const DATABASE_PATH = '/db/users.db';
    const BCRYPT_COST = 14;

    function __construct()
    {
        $this->open($_SERVER['PWD'] . self::DATABASE_PATH);
    }

    protected function getDbRequest(string $sql, array $params, bool $isNull = false): bool|array
    {
        $statement = $this->prepare($sql);

        foreach ($params as $column => $value) {
            $statement->bindValue($column, $value);
        }

        $result = $statement->execute();
        $row = !$result || $isNull ? false : $result->fetchArray();

        $statement->close();

        return $row;
    }

    /**
     * Left this method to show how table was created
     *
     * @return void
     */
    private function initialize(): void
    {
        $sql = 'CREATE TABLE IF NOT EXISTS user (
            username STRING UNIQUE NOT NULL,
            password STRING NOT NULL,
            last_number SMALLINT NOT NULL DEFAULT 0
        )';

        $this->exec($sql);
    }
}
