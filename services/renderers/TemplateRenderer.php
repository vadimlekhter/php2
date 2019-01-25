<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 17.01.2019
 * Time: 15:46
 */

namespace app\services\renderers;


use app\base\App;
use app\interfaces\IRenderer;

class TemplateRenderer implements IRenderer
{
    public function render($template, $params = [])
    {
        ob_start();
        $templatePath = App::call()->config['templatesDir'] . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }
}