<?php 

class Database
{
    private static $connection = NULL;
    private function __construct()
    {

    }
    public static function getConnection(){
        if (is_null(self::$connection))
        {
            self::$connection = new PDO('mysql:host=localhost;dbname=pisa statistics', 'root', '');
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$connection;
    }    
}


?>