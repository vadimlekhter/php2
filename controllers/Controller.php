<?php

namespace app\controllers;


use app\interfaces\IController;

abstract class Controller implements IController
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = 'main';
    protected $useLayout = true;

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
        ob_start();
        $templatePath = TEMPLATES_DIR . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }

    protected function renderContent ($content) {
        $templatePath = TEMPLATES_DIR. 'layouts/'.$this->layout.'.php';
        include $templatePath;
    }
}