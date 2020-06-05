<?php

class Route
{
    public static $validRoutes = array();
    
    public static function set($route, $function){
        if(!in_array($route,self::$validRoutes))
            array_push(self::$validRoutes, $route);
            
        if(isset($_GET['url']) && $_GET['url'] == $route)
            $function->__invoke();
        
    }
}