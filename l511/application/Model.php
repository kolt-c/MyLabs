<?php

namespace application;

/**
 * Class Model
 * @package application
 */
class Model
{
    /**
     * @var null|mixed
     */
    private $data = null;

    /**
     * @return mixed|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}