<?php

namespace application\libraries;

use Exception;
use mysqli;

/**
 * Class MySQLiDriver
 */
class MySQLiDriver implements IDriver
{
    /**
     * @var mysqli|null
     */
    private $connect = null;

    /**
     * MySQLiDriver constructor.
     * @param string $server
     * @param string $database
     * @param string $user
     * @param string $password
     * @throws Exception
     */
    public function __construct($server, $database, $user, $password)
    {
        $this->connect = @new mysqli($server, $user, $password, $database);
        if ($this->connect->connect_errno) {
            $error = sprintf('MySQLi error %s: %s', $this->connect->connect_errno, $this->connect->connect_error);
            throw new Exception($error);
        }
    }

    /**
     * @return mysqli|null
     */
    public function getConnection()
    {
        return $this->connect;
    }

    public function __destruct()
    {
        $this->getConnection()->close();
    }
}