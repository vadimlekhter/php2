<?php

namespace app\controllers;


use app\interfaces\IController;
use app\interfaces\IRenderer;
use app\interfaces\IContentRenderer;
use app\services\renderers\ContentRenderer;
use app\services\renderers\TemplateRenderer;

abstract class Controller implements IController

{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = 'main';
    protected $useLayout = true;

    protected $templateRenderer;
    protected $contentRenderer;

    /**
     * Controller constructor.
     * @param $renderer
     */
    public function __construct(IRenderer $templateRenderer)
    {
        $this->templateRenderer = $templateRenderer;
    }

    public function setContentRenderer (IContentRenderer $contentRenderer) {
        $this->contentRenderer = $contentRenderer;
    }


    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo '404';
        }
    }

    protected function render($template, $params = [])
    {
        if ($this->useLayout) {
            return $this->renderTemplate(
                "layouts/{$this->layout}", ['content' => $this->renderTemplate($template, $params)]
            );
        }
        return $this->renderTemplate($template, $params);
    }

    protected function renderTemplate($template, $params = [])
    {
        return $this->templateRenderer->render($template, $params);
    }
}