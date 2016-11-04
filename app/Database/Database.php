<?php

namespace App\Database;

class Database
{
    /**
     * @var string $host
     */
    protected $host;
    /**
     * @var string $name
     */
    protected $name;
    /**
     * @var string $username
     */
    protected $username;
    /**
     * @var string $password
     */
    protected $password;

    /**
     * Database constructor.
     *
     * @param string $host
     * @param string $name
     * @param string $username
     * @param string $password
     */
    public function __construct(string $host, string $name, string $username, string $password)
    {
        $this->host = $host;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return \PDO
     */
    public function connect()
    {
        try {
            return new \PDO("mysql:host={$this->host};dbname={$this->name}", $this->username, $this->password);
        } catch (\PDOException $e) {
            die('db error');
        }
    }
}