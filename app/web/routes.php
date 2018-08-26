<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27.05.2018
 * Time: 10:13
 */
Router::addRoute("/admin","AdminController@run");
//Router::addRoute("/edit","AdminController@edit");

Router::addRoute("/addproduct","AdminController@addProduct");
Router::addRoute("/addcategory","AdminController@addCategory");

Router::addRoute("/editproduct","AdminController@editProduct");
Router::addRoute("/editcategory","AdminController@editCategory");


Router::addRoute("/login","LoginController@run");
Router::addRoute("/registration","RegistrationController@run");
Router::addRoute("/exit","LoginController@goOut");
Router::addRoute("/products","ProductsController@run");
Router::addRoute("/product/([0-9]+)","ProductController@run");
Router::addRoute("/main","MainController@run");
//Router::addRoute("/","MainController@run");
Router::addRoute("/cart","CartController@run");
Router::addRoute("/makeorder","CartController@makeorder");

//var_dump(Router::$routes);
//unset(Router::$routes["/edit"]);