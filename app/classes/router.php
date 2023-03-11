<?php

namespace App\Classes;

class Router{
    private $dir = '\App\Controllers\\';

    private $router;

    public function __construct($route=''){
        $this->router=new \Devinow\Router\Router($route);
    }

    private function callback($callback = null){
        $dir=$this->dir;

        if(is_string($callback)){
            $callback=explode('@',$callback);
            $callback[0]=$dir.$callback[0];
        }elseif(is_array($callback)){
            $callback[0]=$dir.$callback[0];
        }

        return $callback;
    }

    public function get($route, $callback = null, $injectArgs = null){
        $callback=$this->callback($callback);

        return $this->router->get($route, $callback, $injectArgs);
    }

    public function post($route, $callback = null, $injectArgs = null){
        $callback=$this->callback($callback);

        return $this->router->post($route, $callback, $injectArgs);
    }

    public function put($route, $callback = null, $injectArgs = null){
        $callback=$this->callback($callback);

        return $this->router->put($route, $callback, $injectArgs);
    }

    public function patch($route, $callback = null, $injectArgs = null){
        $callback=$this->callback($callback);

        return $this->router->patch($route, $callback, $injectArgs);
    }

    public function delete($route, $callback = null, $injectArgs = null){
        $callback=$this->callback($callback);

        return $this->router->delete($route, $callback, $injectArgs);
    }

    public function head($route, $callback = null, $injectArgs = null){
        $callback=$this->callback($callback);

        return $this->router->head($route, $callback, $injectArgs);
    }

    public function match($route, $callback = null, $injectArgs = null){
        $callback=$this->callback($callback);

        return $this->router->any([ 'GET', 'POST' ], $route, $callback, $injectArgs);
    }
}

?>