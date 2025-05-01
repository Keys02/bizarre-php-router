<?php
    require_once "models/Router.php";
    $router = new Router();
    $path =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //Remove query string from the route

    $router->route("/", function() {
        include "controllers/index.php";
    });

    $router->route("/about", function() {
        include "controllers/about.php";
    });
    
    $router->route("/contact", function() {
        include "controllers/contact.php";
    });
    
    $router->route("/product/{id}", function($id){
        include "controllers/product.php";
    });

    $router->route("/product/{id}/order/{order_id}", function($id, $order_id) {
       include "controllers/order.php";
    });

    $router->route("/team", function() {
        include "controllers/team.php";
    });
    

    $router->dispatch($path);
?>