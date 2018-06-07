<?php

namespace application;

/**
 * Class View
 * @package application
 */
class View
{
    /**
     * @var Model
     */
    private $model;

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * View constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function render()
    {
        return $this->getModel()->getData();
    }
}