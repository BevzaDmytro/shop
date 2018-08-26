<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.05.2018
 * Time: 9:20
 */
require_once "./app/middlewares/Auth.php";
require_once "./app/Client.php";

class LoginController extends Controller
{
    private $layout = "login";

    public function run(){

        if(isset($_GET['forgot']) && $_GET['forgot'] == 'true'){

            $mail = new MailSender();
//            $mail->recover();
            $this->view->renderAll("recover",$mail->recover(),"template","login");

        }
        else {
            if (isset($_POST['login'])) {
                $login = $_POST['login'];
                $password = $_POST['password'];
            }
            if (!empty($login)) {
                $res = Client::select()->where("login", "=", $login)->and()->where("password", "=", $password)->get();
                if (!empty($res)) {
                    $_SESSION["user"] = $_POST['login'];
                    unset($_POST);
                }
                else{
                    echo "Пользователя с таким именем нету";
                    header("location: /shop/login");
                }
                // else echo "Пользователя с таким именем нету";
                header("location: /shop/products");
            }

            $this->view->renderAll($this->layout, "", "template", "login");
        }
    }

//    public function recover(){
//        $args = [
//            "email" => false
//        ];
//        $email = "";
//        if (isset($_POST['email'])) {
//            $email = $_POST['email'];
//            $_SESSION['email'] = $_POST['email'];
//            $to = $email;
//            $subject = 'the subject';
//            $message = 'hello, link to recover your password: http://localhost/shop/login?forgot=true&recover=true';
//            $headers = 'From: webmaster@example.com' . "\r\n" .
//                'Reply-To: webmaster@example.com' . "\r\n" .
//                'X-Mailer: PHP/' . phpversion();
//            mail($to, $subject, $message, $headers);
//
//        }
//        if(isset($_GET['recover']) && $_GET['recover'] == "true"){
//            $args = [
//                "email" => true
//            ];
//        }
//        if(isset($_POST['password']) && $_POST['password']!= null)
//        {
//            $email = $_SESSION['email'];
//            $tempClient = Client::select()->where("email","=",$email)->get();
//            $id = $tempClient[0]->id_client;
//            $client = new Client();
//            $client->findId($id);
//            $client->password = $_POST['password'];
//            //$client[0]->password = $_POST['password'];
//            $client->update();
//            unset($_POST);
//            $_SESSION["user"] = $client->login;
//            header("location: /shop/products");
//        }
//
//        $this->view->renderAll("recover",$args,"template","login");
//    }

    public function goOut(){
            unset($_SESSION["user"]);
            session_start();
        session_destroy();
        echo "Выход прошел успешно"."<br>";
        var_dump($_SESSION["user"]);
        header("location: /shop/login");
    }



}