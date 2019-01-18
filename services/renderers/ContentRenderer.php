<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 17.01.2019
 * Time: 16:23
 */

namespace app\services\renderers;


use app\interfaces\IContentRenderer;

class ContentRenderer implements IContentRenderer
{
    public function renderContent ($content, $layout) {
        $templatePath = TEMPLATES_DIR. 'layouts/'.$layout.'.php';
        include $templatePath;
    }
}