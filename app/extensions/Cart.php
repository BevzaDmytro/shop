<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03.06.2018
 * Time: 12:30
 */

class Cart
{

    private $products = [];

    public function __construct()
    {
        if(isset($_SESSION['cart'])) {
            $this->products = $_SESSION['cart'];
            }
    }

    public function deleteItem($id){
        //var_dump($this->products);
        foreach ($this->products as $key => $p){
            if($p == $id) {unset($this->products[$key]);sort($this->products);break;}
        }
        foreach ($_SESSION['cart'] as $key => $p){
            if($p == $id) {unset($_SESSION['cart'][$key]);sort($_SESSION['cart']);break;}
        }
       // var_dump($this->products);
    }

    public function getProducts(){
        if(!empty($this->products))
            return $this->products;
    }
    public function addProduct($id){
        $this->products[] = $id;
        array_push($_SESSION['cart'],$id);
    }
    public function delete(){
        unset($_SESSION['cart']);
        unset($this->products);
    }

    public function newOrder(){
        $identificators = $this->getProducts();
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
            $this->delete();

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
            $this->delete();
            unset($_POST);

            $args = [
                "done" => true
            ];
        }

        return $args;
    }
}