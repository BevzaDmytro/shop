<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02.06.2018
 * Time: 10:45
 */

class MainController extends Controller
{
private $layout = "main";

public function run(){
    $this->view->renderAll("main","","template","main");
}
}