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
        $this->view->renderAll("makeorder",$cart->newOrder(),"template","makeorder");
    }
}