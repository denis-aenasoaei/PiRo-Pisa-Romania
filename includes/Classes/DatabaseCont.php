<?php 

class DatabaseCont
{
    private static $connection2 = NULL;
    private function __construct()
    {

    }
    public static function getConnection2(){
        if (is_null(self::$connection2))
        {
            self::$connection2 = new PDO('mysql:host=localhost;dbname=contactus', 'root', '');
            self::$connection2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$connection2;
    }    
}


?>