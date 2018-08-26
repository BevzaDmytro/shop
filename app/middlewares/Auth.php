<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.05.2018
 * Time: 9:09
 */
require_once "./core/Middleware.php";
require_once "./app/Client.php";

class Auth extends Middleware
{
    public function handle()
    {
        //session_start();
        if(isset($_SESSION["user"]) && $_SESSION["user"] == "admin") {
            //var_dump($_SESSION["user"]);
            return true;
        }
        return false;

    }

}