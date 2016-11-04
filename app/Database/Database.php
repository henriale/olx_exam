<?php

namespace App\Database;

class Database
{
    protected $host;
    protected $name;
    protected $username;
    protected $password;

    public function __construct(string $host, string $name, string $username, string $password)
    {
        $this->host = $host;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            return new \PDO("mysql:host={$this->host};dbname={$this->name}", $this->username, $this->password);
        } catch (\PDOException $e) {
            die('db error');
        }
    }
}