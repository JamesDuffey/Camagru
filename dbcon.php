<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '123456');
define('DATABASE', 'camagru');
 
function DB()
{
    try {
        $db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
        return $db;
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}
?>