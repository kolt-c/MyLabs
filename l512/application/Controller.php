<?php

namespace application;

/**
 * Class Controller
 * @package application
 */
class Controller
{
    /**
     * @var Model
     */
    private $model;

    /**
     * Controller constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model
     */
    protected function getModel()
    {
        return $this->model;
    }
}
