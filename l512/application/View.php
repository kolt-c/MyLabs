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
     * @var string
     */
    private $templatesPath = __DIR__ . '/views';

    /**
     * @var string
     */
    private $layoutsPath = __DIR__ . '/views/layouts';

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
        $layout = sprintf('%s/%s.php', $this->layoutsPath, $this->model->getLayout());
        $template = sprintf('%s/%s.php', $this->templatesPath, $this->model->getTemplate());

        if (!file_exists($layout)) {
            throw new \Exception("Template '{$layout}' is not exists");
        } elseif (!file_exists($template)) {
            throw new \Exception("Template '{$template}' is not exists");
        }

        ob_start();
        require_once($template);
        $content = ob_get_clean();

        require_once($layout);
    }
}