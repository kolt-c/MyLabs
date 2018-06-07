<?php

namespace application\libraries;

/**
 * Interface IDriver
 */
interface IDriver
{
    /**
     * @param string $server
     * @param string $database
     * @param string $user
     * @param string $password
     * @return mixed
     */
    public function __construct($server, $database, $user, $password);

    /**
     * @return \PDO|\mysqli
     */
    public function getConnection();

    public function __destruct();
}