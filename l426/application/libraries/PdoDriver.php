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

    /**
     * @param string $table
     * @param string $model
     * @param int $id
     * @return array|object
     */
    public function findAndMap($table, $model, $id = 0)
    {
        $query = sprintf('SELECT * FROM %s', $table);
        $condition = [];
        if ($id) {
            $query .= " WHERE id = :id LIMIT 1";
            $condition[':id'] = $id;
        }

        $query = $this->getConnection()->prepare($query);
        $query->execute($condition);
        $query->setFetchMode(PDO::FETCH_CLASS, $model);

        return $id ? $query->fetch() : $query->fetchAll();
    }

    /**
     * @param string $table
     * @param array $data
     * @return bool|string
     */
    public function insert($table, array $data)
    {
        $result = false;
        if ($data) {
            $fields = array_keys($data);
            $labels = array_map(function ($item) { return ":{$item}"; }, $fields);

            $query = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, implode(', ', $fields), implode(', ', $labels));
            $query = $this->getConnection()->prepare($query);
            if ($query->execute(array_combine($labels, array_values($data)))) {
                $result = $this->getConnection()->lastInsertId();
            }
        }

        return $result;
    }

    /**
     * @param string $table
     * @param array $data
     * @param array $conditions
     * @param string $comparator
     * @return bool
     */
    public function update($table, array $data, array $conditions, $comparator = 'AND')
    {
        $result = false;

        $keys = array_keys($data);
        if ($keys) {
            $dataMap = array_map(function ($key) { return "{$key} = :{$key}"; }, $keys);
            $comparator = ' ' . strtoupper(trim($comparator)) . ' ';

            $conditionsMap = [];
            foreach ($conditions as $key => $value) {
                array_push($conditionsMap, "{$key} = '{$value}'");
            }
            $query = sprintf(
                'UPDATE %s SET %s WHERE %s',
                $table,
                implode(', ', $dataMap),
                implode($comparator, $conditionsMap)
            );
            $query = $this->getConnection()->prepare($query);

            $data = array_combine(array_map(function ($key) { return ":{$key}"; }, $keys), array_values($data));
            $result = $query->execute($data);
        }

        return $result;
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}