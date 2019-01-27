<?php

namespace app\controllers;


use app\interfaces\IController;
use app\interfaces\IRenderer;
use app\interfaces\IContentRenderer;
use app\models\repositories\RecordException;
use app\services\renderers\ContentRenderer;
use app\services\renderers\TemplateRenderer;

class GetOneException extends \Exception {}

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

    protected function getclass () {
        $str = get_class($this);
        $class_name = strtolower(str_replace('Controller', '', end(explode('\\', $str))));
        return $class_name;
    }


    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            try {
                $this->$method();
            } catch (\PDOException $e) {
                header('Refresh: 3; URL=http:/error_404.php');
                echo "Произошла ошибка базы данных. ";
                echo $e->getMessage();
                //exit();
            }

            catch (RecordException $e) {
                header('Refresh: 3; URL=http:/error_404.php');
                echo "Произошла ошибка подключения к БД. ";
                echo $e->getMessage();
                //exit();
            }

            catch (GetOneException $e) {
                header('Refresh: 3; URL=http:/error_404.php');
                echo "Произошла ошибка подключения к БД, нет id. ";
                echo $e->getMessage();
                //exit();
            }

            catch (\Exception $e) {
                header('Refresh: 3; URL=http:/error_404.php');
                echo "Произошла ошибка. ";
                echo $e->getMessage();
                //exit();
            }
        } else {
            header('Location: http:/error_404.php');
        }
    }

    protected function render($template, $params = [])
    {
        //var_dump($params);
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