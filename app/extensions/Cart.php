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
}