<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.05.2018
 * Time: 15:47
 */
class Controller{
protected $view;
protected $middleware;

    public function getMiddleware(){
        return $this->middleware;
    }

public function __construct(){
    $this->view = new View();
}


public function action(){

}


}