<?php
    class Router {
        private array $routes = array();


        public function route(string $path, Closure $handler) : void {
            $this->routes[$path] = $handler;
        }

        //Matching routes to a specific URL, termed as dispatching.
        public function dispatch($path) : void 
        {
            foreach($this->routes as $route => $handler) {
                
                $pattern = preg_replace("#\{\w+\}#", "([^\/]+)+", $route);
                // $pattern = preg_replace("#\{\w+\}#", "([^\/]+)\d+", $route); // Matches routes with numcerical ids

                /* e.g product/123 gets replaced with product/({^\/]+) in order to be used to perform the actual matching.
                The purpose of the parenthesis() in regular expressions is to define subpatterns within the complete pattern. When a regular expression is succesfully matched against any particular parenthesized subpattern. This makes the pattern return two elements when it finds a match */

                if(preg_match("#^$pattern$#", $path, $matches)) {
                    array_shift($matches); // Remove the first redundant full matched path from the array

                    call_user_func_array($handler, $matches);

                    return;
                }
            }
            echo "404: Page cannot be found😭";
        }
    }
?>