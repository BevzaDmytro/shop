<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.08.2018
 * Time: 18:39
 */

class MailSender
{
    private $token;

    public function activate($token){
        $res = TempClient::select()->where("token","=",$this->token)->get();

        $tempUser = new TempClient();
        $tempUser->findId($res[0]->id_tempclient);

        Client::insert('login', 'email', 'password')->values($tempUser->login, $tempUser->email, $tempUser->password)->run();

        $_SESSION["user"] = $tempUser->login;
        $tempUser->delete();
        header("location: /shop/products");
    }

    public function sendMail($login, $password, $email){
        $this->token = $this->generateToken();
        $to      = $email;
        $subject = 'the subject';
        $message = 'hello, link to activate your account: http://localhost/shop/registration?token='.$this->token;
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        TempClient::insert('login', 'email', 'password','token')->values($login, $email, $password,$this->token)->run();
        mail($to, $subject, $message, $headers);
        return true;
    }

    private function generateToken($length = 10){
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    public function recover(){
        $args = [
            "email" => false
        ];
        $email = "";
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $_SESSION['email'] = $_POST['email'];
            $to = $email;
            $subject = 'the subject';
            $message = 'hello, link to recover your password: http://localhost/shop/login?forgot=true&recover=true';
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);

        }
        if(isset($_GET['recover']) && $_GET['recover'] == "true"){
            $args = [
                "email" => true
            ];
        }
        if(isset($_POST['password']) && $_POST['password']!= null)
        {
            $email = $_SESSION['email'];
            $tempClient = Client::select()->where("email","=",$email)->get();
            $id = $tempClient[0]->id_client;
            $client = new Client();
            $client->findId($id);
            $client->password = $_POST['password'];
            //$client[0]->password = $_POST['password'];
            $client->update();
            unset($_POST);
            $_SESSION["user"] = $client->login;
            header("location: /shop/products");
        }

        return $args;
    }
}