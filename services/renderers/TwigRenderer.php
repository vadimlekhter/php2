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
    public function render($template, $params = [])
    {
        ob_start();
        extract($params);
        foreach ($params as $key=>$value) {
            $loader = new \Twig_Loader_Filesystem(TEMPLATES_DIR);
            $twig = new \Twig_Environment($loader, array(
                'auto_reload' => true));

            if ($key == 'product') {
                echo $twig->render($template, ['name' => ${$key}->name, 'price' => ${$key}->price,
                    'description' => ${$key}->description]);
            } elseif ($key == 'user') {
                echo $twig->render($template, ['name' => ${$key}->name, 'login' => ${$key}->login,
                    'email'=> ${$key}->email, 'phone'=> ${$key}->phone, 'address' => ${$key}->address]);
            }
        }
        return ob_get_clean();
    }
}
