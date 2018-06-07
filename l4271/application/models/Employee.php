<?php

namespace application\models;

/**
 * Class Employee
 * @package application\models
 */
class Employee
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $firstname;

    /**
     * @var string
     */
    public $lastname;

    /**
     * @var string
     */
    public $title;

    /**
     * @var int
     */
    public $age;

    /**
     * @var double
     */
    public $salary;

    /**
     * @return string
     */
    public function getSummary()
    {
        return vsprintf('#%s %s %s as %s (%d years old) $%d', get_object_vars($this));
    }
}
