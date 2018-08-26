<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.08.2018
 * Time: 15:58
 */

class AdminPanel
{

    public static function editProduct(){
        $_POST['edit'] = 'product';
        $res = new Product();
        $id = $_POST['id'];
        $res->findId($id);
        $args = [
            "product" => $res
        ];


        if(isset($_POST['changeit'])){
            $res->name = $_POST['name'];
            $res->price = $_POST['price'];
            $res->category = $_POST['category'];
            $res->description = $_POST['description'];
            $res->image = $_POST['image'];
            $res->update();
            //var_dump($res->name);
            //var_dump($res->price);
            header("location: /shop/admin");
            unset($_POST);
        }

        return $args;
    }

    public static function editCategory(){
        $_POST['edit'] = 'category';
        $res = new Category();
        $id = $_POST['id'];
        $res->findId($id);
        $args = [
            "category" => $res
        ];


        if(isset($_POST['changeit'])){
            $res->name_category = $_POST['name'];
            $res->update();
            header("location: /shop/admin");
            unset($_POST);
        }
        return $args;
    }

    public static function addProduct(){
        if(isset($_POST['add'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $res=[
                "name" => $name,
                "price" => $price,
                "description" => $description,
                "image" => $image,
                "category" => $category
            ];
            $product = new Product($res);
            $product->create();
            header("location: /shop/admin");
            unset($_POST);
            //header("location: /shop/admin");
        }
    }

    public static function addCategory(){
        if(isset($_POST['add'])) {
        $name = $_POST['name'];
        $res=[
            "name_category" => $name,
        ];
        $category = new Category($res);
        $category->create();
        // header("location: /shop/admin");
        unset($_POST);
        header("location: /shop/admin");
    }
    }
}