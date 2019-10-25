<?php
    $db_host = "localhost";
	$db_user = "root";
	$db_pass = "123456";
	$dsn = 'mysql:host='.$db_host;
	$db_name = "camagru";

try {
	$con = new PDO("mysql:host=$host;dbname=$db_name", $db_user, $db_pass);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "ERROR: ".$e->getMessage();
}

?>