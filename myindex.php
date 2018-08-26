<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.05.2018
 * Time: 15:41
 */

require_once "core/View.php";
require_once "core/Router.php";
require_once "app/web/routes.php";


session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
//else var_dump($_SESSION['cart']);

define("ROOT", dirname(__DIR__)."/shop");

//echo $_SERVER['HTTP_HOST'];
Router::run();