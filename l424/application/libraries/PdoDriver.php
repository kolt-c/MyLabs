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

    /**
     * @param string $table
     * @param int $id
     * @return array
     */
    public function find($table, $id = 0)
    {
        $query = sprintf('SELECT * FROM %s', $table);
        $condition = [];
        if ($id) {
            $query .= " WHERE id = :id LIMIT 1";
            $condition[':id'] = $id;
        }

        $query = $this->getConnection()->prepare($query);
        $query->execute($condition);

        return $id ? $query->fetch(PDO::FETCH_ASSOC) : $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}