<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 14.01.2019
 * Time: 14:04
 */

namespace app\controllers;

use app\models\User;

class UserController extends Controller
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
        $product = User::getAll();
        $this->useLayout = false;
        $content ='';
        foreach ($product as $item) {
            $content .= $this->render($_GET['c'].'/allusers', ['user' => $item]);
        }
        $this->renderContent($content);
    }

    public function actionOneuser()
    {
        $id = $_GET['id'];
        $user = User::getOne($id);
        echo $this->render($_GET['c'].'/oneuser', ['user' => $user]);
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