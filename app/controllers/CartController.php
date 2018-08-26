<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02.06.2018
 * Time: 10:46
 */

require_once "./app/extensions/Cart.php";
require_once "./app/Order.php";

class CartController extends Controller
{
    private $layout = "cart";

    public function run(){
        $cart = new Cart();
        if(isset($_GET['action']) && $_GET['action'] == 'clear'){
            $cart->delete();
        }
        if(isset($_GET['action']) && $_GET['action'] == 'delete'){
            $id = $_POST['id'];
            $cart->deleteItem($id);
        }
        $this->view->renderAll("cart",$this->showProducts($cart),"template","cart");
    }

    private function showProducts($cart){
        $price = 0;
        $identificators = $cart->getProducts();

        $productsInCart = [];
        if(!empty($identificators)) {
            foreach ($identificators as $id) {

                $currentProduct = Product::select()->where("id_product", "=", $id)->get();
                $productsInCart[] = $currentProduct[0];
            }
            foreach ($productsInCart as $p) {
                $price += $p->price;
            }
        }
        $args=[
            "products" => $productsInCart,
            "price" => $price
        ];
        return $args;
    }


    public function makeOrder(){
        $cart = new Cart();
        $identificators = $cart->getProducts();
        $args = [
            "done" => false
        ];

        if(isset($_SESSION['user'])){
            foreach ($identificators as $id){
                $currentProduct = Product::select()->where("id_product","=",$id)->get();
                $attrs = [
                    "login" => $_SESSION['user'],
                    "product" => $currentProduct[0]->name,
                    "cost" => $currentProduct[0]->price
                ];
                $order = new Order($attrs);
                $order->create();
            }
            $cart->delete();

            $args = [
                "done" => true
            ];
        }

        if (isset($_POST['email'])){
            foreach ($identificators as $id){

                $currentProduct = Product::select()->where("id_product","=",$id)->get();
                $attrs = [
                    "login" => $_POST['email'],
                    "product" => $currentProduct[0]->name,
                    "cost" => $currentProduct[0]->price
                ];
                $order = new Order($attrs);
                $order->create();
            }
            $cart->delete();
            unset($_POST);

            $args = [
                "done" => true
            ];
        }
        //if(isset($_POST['']))

        $this->view->renderAll("makeorder",$args,"template","makeorder");
    }
}