<?php

class Router
{
    /**
     * @var null|string
     */
    private $controller = null;

    /**
     * @var array
     */
    private $pathParts = [];

    public function __construct()
    {
        $this->pathParts = explode('/', trim($_SERVER['REQUEST_URI'], " \t\n\r\0\x0B/"));
    }

    /**
     * @return null|string
     */
    public function getController()
    {
        if (null === $this->controller) {
            $this->prepareController();
        }

        return $this->controller;
    }

    private function prepareController()
    {
        $this->controller = array_shift($this->pathParts) ?: 'index';
        $parts = array_merge(explode('-', $this->controller), ['Controller']);

        $this->controller = '\application\controllers\\';
        foreach ($parts as $part) {
            $this->controller .= ucfirst(strtolower($part));
        }
    }

    /**
     * @var null|string
     */
    private $action = null;

    /**
     * @return null|string
     */
    public function getAction()
    {
        if (null === $this->action) {
            $this->prepareAction();
        }

        return $this->action;
    }

    private function prepareAction()
    {
        $this->action = array_shift($this->pathParts) ?: 'index';
        $parts = explode('-', $this->action);

        $this->action = 'action';
        foreach ($parts as $part) {
            $this->action .= ucfirst(strtolower($part));
        }
    }
}