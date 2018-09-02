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



    public function editProduct($id){

        $this->view->renderAll("admin/edit",AdminPanel::editProduct(),"admin","adminpanel");
    }

    public function editCategory(){

        $this->view->renderAll("admin/edit",AdminPanel::editCategory(),"admin","adminpanel");
    }

    public function addProduct(){

        AdminPanel::addProduct();
        $this->view->renderAll("admin/addProduct","","admin","adminpanel");
    }

    public function addCategory(){
        AdminPanel::addCategory();
        $this->view->renderAll("admin/addProduct","","admin","adminpanel");
    }
}