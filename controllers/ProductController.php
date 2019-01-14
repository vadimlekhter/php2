<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 12.01.2019
 * Time: 19:49
 */

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    /*protected $action;
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
    }*/

    public function actionIndex()
    {
        $product = Product::getAll();
        $this->useLayout = false;
        $content ='';
        foreach ($product as $item) {
            $content .= $this->render('product/catalog', ['product' => $item]);
        }
        $this->renderContent($content);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render($_GET['c'].'/card', ['product' => $product]);
    }

    /*protected function render($template, $params = [])
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
    }*/
}