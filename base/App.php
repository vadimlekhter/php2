<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 24.01.2019
 * Time: 17:22
 */

namespace app\base;

use app\services\Session;
use app\traits\TSingltone;
use app\services\Db;
use app\services\Request;
use app\interfaces\IRenderer;


/**
 * Class App
 * @package app\base;
 * @property Db $db;
 * @property Request $request;
 * @property Irenderer $renderer;
 */
class App
{
    use TSingltone;

    public $config;

    /** @var Storage */
    public $components;

    public static function call()
    {
        return static::getInstance();
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    protected function runController()
    {
        $controllerName = App::call()->request->getControllerName() ?: $this->config['defaultController'];
        $actionName = App::call()->request->getActionName();
        $controllerClass = $this->config['controllerNamespace'] . ucfirst($controllerName) . 'Controller';

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(
                new \app\services\renderers\TemplateRenderer()
            );

            /*$controller = new $controllerClass(
                new \app\services\renderers\TwigRenderer()
            );*/

            $controller->runAction($actionName);
        } else {
            header('Location: http:/error_404.php');
        }
    }

    public function CreateComponent($name)
    {
        if ($params = $this->config['components'][$name]) {
            $class = $params['class'];
            if (class_exists($class)) {
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
            throw new\Exception ("Не определен класс компонента");
        }
        throw new\Exception ("Компонент {$name} не найден");
    }

    public function __get($name)
    {
        return $this->components->get($name);
    }


}