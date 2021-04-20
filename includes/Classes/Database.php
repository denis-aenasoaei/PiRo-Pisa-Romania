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
            self::$connection = new PDO('mysql:host=myserver12.mysql.database.azure.com;dbname=pisa statistics', 'ciuz99best@myserver12', 'Parola123!');
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$connection;
    }    
}


?>