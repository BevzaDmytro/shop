<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.05.2018
 * Time: 20:33
 */

require_once "./app/Category.php";
require_once "./app/Product.php";
require_once "./app/extensions/Pagination.php";

class ProductsController extends Controller
{
    private $layout = "products";
    private $filter = "";
    private $param = "";

    public function run(){
       // session_start();

        if(empty($_GET['page'])){
            $page = 1;
        }
        else $page = $_GET['page'];


        $products = $this->filtration();

        if(isset($_GET['category'])){
            $products = Product::select()->where("category","=",$_GET['category'])->get();
        }
        $pagination = new Pagination();
        $pages = $pagination->getLastPage($products);
        $currentProducts = $pagination->showPage($page,$products);
        $categories = Category::select()->get();

        $args = [
            "products" => $currentProducts,
            "categories" => $categories,
            "pagination" => $pages
        ];

        $this->view->renderAll("products",$args,"template","products");

    }

    public function filtration(){
        if(!empty($_GET['filter'])){
            $_SESSION['filter'] = $_GET['filter'];
            if(!empty($_GET['param'])) $_SESSION['param'] = $_GET['param'];

            unset($_GET);
        }

        if(!empty($_SESSION['filter']))
        {

            if( $_SESSION['param'] != "desc"){
//                var_dump($_SESSION['param']);
                return  Product::select()->orderBy($_SESSION['filter'])->get();
            }
            else  return  Product::select()->orderBy($_SESSION['filter'])->desc()->get();
        }
        else
            return  Product::select()->get();

    }
}