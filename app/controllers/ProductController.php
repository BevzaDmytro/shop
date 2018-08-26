<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.06.2018
 * Time: 11:46
 */

require_once "./app/extensions/Cart.php";
require_once "./app/Comment.php";

class ProductController extends Controller
{

    public function run($id){
        //session_start();

        $cart = new Cart();

        $product = new Product();
        $product->findId($id);
        if(isset($_GET['action']) && $_GET['action'] == 'comment'){
            $this->addComment($id);
        }
        if(isset($_POST['action']) && $_POST['action'] == 'add'){
            if(isset($_POST['count']))
                for($i=0;$i<$_POST['count'];$i++) {
                    $cart->addProduct($id);
                }
                else
                    $cart->addProduct($id);
            unset($_POST);
            //header("location: /shop/product/".$id);
        }

        $categories = Category::select()->get();
        $comments = Comment::select()->where("id_product","=",$id)->get();
        $args = [
            "product" => $product,
            "categories" => $categories,
            "comments" => $comments
        ];
        $this->view->renderAll("product",$args,"template","product");
    }

    public function addComment($id){
        $text = $_POST['comment'];
        if(!isset($_SESSION['user']))
        $user = $_POST['user'];
        else
            $user = $_SESSION['user'];
         $attrs = [
             "id_product" => $id,
             "text" => $text,
             "login_user" => $user
         ];
         unset($_POST);
         $comment = new Comment($attrs);
         $comment->create();
         header("location: /shop/product/".$id);
    }
}