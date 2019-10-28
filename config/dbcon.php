<?php
include "database.php";
try {
	$con = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection Error:".$e->getMessage();
}

?>