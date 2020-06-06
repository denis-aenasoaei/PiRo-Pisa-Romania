<?php

class Route
{
    public static $validRoutes = array();
    public static $functions = array();
    
    public static function add($route, $function){
        if(!in_array($route,self::$validRoutes))
            array_push(self::$validRoutes, $route);
            array_push(self::$functions, $function);
    }

    public static function run($route = '')
    {
        if(in_array($route, self::$validRoutes))
        {
            self::$functions[array_search($route, self::$validRoutes)]->__invoke();
        }
        else
        {
            self::$functions[array_search("index.php", self::$validRoutes)]->__invoke();
        }
    }
    
    public static function getUsedRoute($route)
    { 
        if(in_array($route, self::$validRoutes))
        {
            return self::$validRoutes[array_search($route, self::$validRoutes)];
        }
        else
        {
            return self::$validRoutes[array_search("index.php", self::$validRoutes)];
        }
    }
}