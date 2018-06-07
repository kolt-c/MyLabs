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

    /**
     * @param string $table
     * @param int $id
     * @return array
     */
    public function find($table, $id = 0)
    {
        if ($id) {
            $query = $this->getConnection()->prepare("SELECT * FROM {$table} WHERE id = ? LIMIT 1");
            $query->bind_param('i', $id);
            $query->execute();

            $data = $query->get_result();
            $result = $data->fetch_assoc();
        } else {
            $query = $this->getConnection()->query("SELECT * FROM {$table}");
            $result = [];
            while ($row = $query->fetch_assoc()) {
                $result[] = $row;
            }
        }

        return $result;
    }

    /**
     * @param string $table
     * @param string $model
     * @param int $id
     * @return object|array
     */
    public function findAndMap($table, $model, $id = 0)
    {
        if ($id) {
            $query = $this->getConnection()->prepare("SELECT * FROM {$table} WHERE id = ? LIMIT 1");
            $query->bind_param('i', $id);
            $query->execute();

            $data = $query->get_result();
            $result = $data->fetch_object($model);
        } else {
            $query = $this->getConnection()->query("SELECT * FROM {$table}");
            $result = [];
            while ($row = $query->fetch_object($model)) {
                $result[] = $row;
            }
        }

        return $result;
    }

    /**
     * @param string $table
     * @param array $data
     * @return bool|mixed
     */
    public function insert($table, array $data)
    {
        $result = false;
        $keys = array_keys($data);
        $values = array_values($data);

        if ($keys && $values) {
            $query = sprintf(
                'INSERT INTO %s (%s) VALUES ("%s")',
                $table,
                implode(', ', $keys),
                implode('", "', $values)
            );
            if ($this->getConnection()->query($query)) {
                $result = $this->getConnection()->insert_id;
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
        if ($data) {
            $dataMap = [];
            foreach ($data as $key => $value) {
                array_push($dataMap, "{$key} = '{$value}'");
            }
            $conditionsMap = [];
            foreach ($conditions as $key => $value) {
                array_push($conditionsMap, "{$key} = '{$value}'");
            }

            $comparator = ' ' . strtoupper(trim($comparator)) . ' ';
            $query = sprintf(
                'UPDATE %s SET %s WHERE %s',
                $table,
                implode(', ', $dataMap),
                implode($comparator, $conditionsMap)
            );

            $result = $this->getConnection()->query($query);
        }

        return $result;
    }
    
    public function __destruct()
    {
        $this->getConnection()->close();
    }
}