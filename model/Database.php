<!--
Author:    Artem Nahornyi; n01261269;
-->
<?php

class Database
{
    // my properties
    private static $user = '';
    private static $pass = '';
    private static $db = '';
    private static $dsn = 'mysql:host=; dbname=';
    private static $dbcon;
    private function __construct()
    {
        
    }
    
    // get PDO connection
    public static function getDb(){
        if(!isset(self::$dbcon)){
            try{
                self::$dbcon = new PDO(self::$dsn, self::$user, self::$pass);
                // Display an error
                self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e){
                $msg = $e->getMessage();
                include '../customerror.php';
                exit();
            }
        }
        return self::$dbcon;
    } // end getDb function
} // end Database class

/*  
NOTES
PDO - PHP data object
dsn - data source name
 */