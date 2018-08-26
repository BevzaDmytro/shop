<?php
require_once "./core/Controller.php";
require_once "./app/Product.php";
require_once "./app/middlewares/Auth.php";
require_once "./app/extensions/AdminPanel.php";


class AdminController extends Controller
{
    private $layout = "admin";
    private $edit = "edit";
    private $add = "add";
    protected $middleware = "Auth";

    private $data = ['table' => 'products'];

    public function run()
    {
        if(isset($_POST['table'])) {
            $this->data['table'] = $_POST['table'];
        }

        if($this->data['table']=='products') {

            $products = Product::select()->get();
            $args = ["products" => $products];
            $this->view->renderAll("admin/admin_index", $args, "admin","adminpanel");
        }

        if($this->data['table'] == 'categories') {
            $categories = Category::select()->get();
            $args = ["categories" => $categories];
            $this->view->renderAll("admin/admin_categories", $args, "admin","adminpanel");
        }

        if(isset($_POST['deleteproduct'])){
            $this->deleteProduct($_POST['deleteproduct']);
            header("location: /shop/admin");
        }
        if(isset($_POST['deletecategory'])){
            $this->deleteCategory($_POST['deletecategory']);
            header("location: /shop/admin");
        }
    }

    public function deleteProduct($id){
        $product = new Product();
        $product->findId($id);
        $product->delete();
    }
    public function deleteCategory($id){
        $category = new Category();
        $category->findId($id);
        $category->delete();
    }

//    public function create($name, $price){
//        $res=[
//            "name" => $name,
//            "price" => $price
//        ];
//        $product = new Product($res);
//        $product->create();
//    }

    public function editProduct($id){
//        $_POST['edit'] = 'product';
//        $res = new Product();
//        $id = $_POST['id'];
//        $res->findId($id);
//        $args = [
//            "product" => $res
//        ];
//
//
//        if(isset($_POST['changeit'])){
//            $res->name = $_POST['name'];
//            $res->price = $_POST['price'];
//            $res->category = $_POST['category'];
//            $res->description = $_POST['description'];
//            $res->image = $_POST['image'];
//            $res->update();
//            //var_dump($res->name);
//            //var_dump($res->price);
//            header("location: /shop/admin");
//            unset($_POST);
//        }
        $this->view->renderAll("admin/edit",AdminPanel::editProduct(),"admin","adminpanel");
    }

    public function editCategory(){
//        $_POST['edit'] = 'category';
//        $res = new Category();
//        $id = $_POST['id'];
//        $res->findId($id);
//        $args = [
//            "category" => $res
//        ];
//
//
//        if(isset($_POST['changeit'])){
//            $res->name_category = $_POST['name'];
//            $res->update();
//            header("location: /shop/admin");
//            unset($_POST);
//        }
        $this->view->renderAll("admin/edit",AdminPanel::editCategory(),"admin","adminpanel");
    }

    public function addProduct(){


//        if(isset($_POST['add'])) {
//            $name = $_POST['name'];
//            $price = $_POST['price'];
//            $category = $_POST['category'];
//            $description = $_POST['description'];
//            $image = $_POST['image'];
//            $res=[
//                "name" => $name,
//                "price" => $price,
//                "description" => $description,
//                "image" => $image,
//                "category" => $category
//            ];
//            $product = new Product($res);
//            $product->create();
//             header("location: /shop/admin");
//            unset($_POST);
//            //header("location: /shop/admin");
//        }
        AdminPanel::addProduct();
        $this->view->renderAll("admin/addProduct","","admin","adminpanel");
    }

    public function addCategory(){
        //$this->view->renderAll("admin/addProduct","","template","adminpanel");

//        if(isset($_POST['add'])) {
//            $name = $_POST['name'];
//            $res=[
//                "name_category" => $name,
//            ];
//            $category = new Category($res);
//            $category->create();
//            // header("location: /shop/admin");
//            unset($_POST);
//            header("location: /shop/admin");
//        }
        AdminPanel::addCategory();
        $this->view->renderAll("admin/addProduct","","admin","adminpanel");
    }
}