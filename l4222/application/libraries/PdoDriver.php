<?php

namespace application\libraries;

use PDO;

/**
 * Class PdoDriver
 */
class PdoDriver implements IDriver
{
    /**
     * @var null|PDO
     */
    private $connection = null;

    /**
     * @param string $server
     * @param string $database
     * @param string $user
     * @param string $password
     * @return mixed
     */
    public function __construct($server, $database, $user, $password)
    {
        $this->connection = new PDO("mysql:host={$server};dbname={$database}", $user, $password);
    }

    /**
     * @return null|PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}