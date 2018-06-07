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

    /**
     * @var null|mixed
     */
    private $layout = 'index';

    /**
     * @return mixed|null
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @param $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @var null|mixed
     */
    private $template = 'index';

    /**
     * @return mixed|null
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
}