<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09.05.2018
 * Time: 14:05
 */
require_once '.\app\controllers\AdminController.php';
require_once '.\app\controllers\LoginController.php';
require_once '.\app\controllers\ProductsController.php';
require_once '.\app\controllers\ProductController.php';
require_once '.\app\controllers\RegistrationController.php';
require_once '.\app\controllers\MainController.php';
require_once '.\app\controllers\CartController.php';
require_once '.\app\controllers\AboutController.php';

class Router
{

    public static $routes = [];
    private static $path;
    private static $controller;
    private static $method;
    private static $params;
    private static $nameMiddleware;


    public static function addRoute($path, $func)
    {
        self::$routes[$path] = preg_split("/\\@/", $func); // [class,func,args]

        $args = self::$routes[$path][2] ?? null;
        if ($args) {
            $args = preg_replace("/(\\(|\\))/", "", $args);
            self::$routes[$path][2] = preg_split("/,/", $args);
        }


    }


    public static function run()
    {

        if(self::matchRoute()){

            $cont = new self::$controller;
            if(!empty($cont->getMiddleware())) {
                self::$nameMiddleware = $cont->getMiddleware();
                $middleware = new self::$nameMiddleware;
                //var_dump(self::$nameMiddleware);
                //var_dump($middleware);
                if ($middleware->handle() == false) {
                    echo "403 Forbidden";
                    return;
                }
            }

            $action = self::$method;

            if(method_exists($cont, $action))
            {
                $cont->$action(self::$params);
            }
            else
            {

                echo "Нет такого метода, "."$action";
            }
        }
        else{
            echo "Не совпали пути";
        }
    }

    public static function matchRoute()
    {
        self::$path = $_SERVER["REQUEST_URI"];
        foreach (self::$routes as $path => $view) {

            if (preg_match("@$path@i", self::$path, $values_from_uri) === 1) {
                if(!empty($values_from_uri[1])) self::$params = $values_from_uri[1];
                self::$controller = $view[0];
                self::$method = $view[1];

                return true;
            }

        }
        return false;


    }
}