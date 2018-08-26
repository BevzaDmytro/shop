<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31.05.2018
 * Time: 20:58
 */

require_once "./app/TempClient.php";
require_once "./app/extensions/MailSender.php";

class RegistrationController extends Controller
{
    private $layout="registration";
    public $registered = false;

    public function run(){

        $mailSender = new MailSender();
        if(isset($_GET['token'])){
            $mailSender->activate($_GET['token']);
        }

        if (isset($_POST['norobot']) && md5($_POST['norobot']) == $_SESSION['randomnr2']) {

            if (isset($_POST['login'])) $login = $_POST['login'];
            if (isset($_POST['email'])) $email = $_POST['email'];
            if (isset($_POST['password'])) $password = $_POST['password'];
            unset($_POST['norobot']);
        }
        else{
            unset($_POST['norobot']);
        }

        if(isset($login) && isset($password) && isset($email)) {

            $this->registered = $mailSender->sendMail($login, $password, $email);
        }
        $args = [
            "registered" => $this->registered
        ];
        $this->view->renderAll($this->layout,$args,"template","registration");
    }

}