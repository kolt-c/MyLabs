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

    /**
     * @param string $table
     * @param int $id
     * @return array
     */
    public function find($table, $id = 0);

    /**
     * @param string $table
     * @param string $model
     * @param int $id
     * @return object|array
     */
    public function findAndMap($table, $model, $id = 0);

    /**
     * @param string $table
     * @param array $data
     * @return bool
     */
    public function insert($table, array $data);

    /**
     * @param string $table
     * @param array $data
     * @param array $conditions
     * @param string $comparator
     * @return bool
     */
    public function update($table, array $data, array $conditions, $comparator = 'AND');

    public function __destruct();
}