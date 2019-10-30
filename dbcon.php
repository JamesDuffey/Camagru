<?php

$hostname = 'localhost';
$username = 'root';
$pw = '123456';
$dsn = "mysql:host=".$db_host;
$db = 'camagru';
 
function DB()
{
    try {
        $db = new PDO($dsn.";dbname=".$db, $username, $pw);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}
?>