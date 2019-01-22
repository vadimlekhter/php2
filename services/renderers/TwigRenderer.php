<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 17.01.2019
 * Time: 17:00
 */

namespace app\services\renderers;


use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{
    protected $templater;

    public function __construct()
    {
        $this->templater = new \Twig_Environment(
            new \Twig_Loader_Filesystem(TEMPLATES_DIR),
            ['autoescape' => false]
        );
    }

    public function render($template, $params = [])
    {
        $template .= '.twig';
        return $this->templater->render($template, $params);
    }
}

