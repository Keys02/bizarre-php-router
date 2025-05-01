<?php
    require_once "models/Router.php";
    $router = new Router();
    $path =  parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $router->route("/bizzare-router/", function() {
        echo "Homepage";
    });

    $router->route("/bizzare-router/about", function() {
        require "controllers/about.php";
    });
    
    $router->route("/bizzare-router/contact", function() {
        require "controllers/contact.php";
    });
    
    $router->route("/bizzare-router/product/{id}", function($id){
        require "controllers/product.php";
    });

    $router->route("/bizzare-router/product/{id}/order/{order_id}", function($id, $order_id) {
       require "controllers/order.php";
    });

    $router->route("/bizzare-router/team", function() {
        require "controllers/team.php";
    });
    
    $router->dispatch($path);
?>