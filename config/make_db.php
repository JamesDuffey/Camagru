<?php
include 'database.php';

try {
	$dbh = new PDO($db_dsn, $db_user, $db_pass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $dbh->query("CREATE DATABASE IF NOT EXISTS $db_name");
	$dbh->exec($query);
}
catch(PDOException $e) {
	echo "Database ERROR: ".$e->getMessage();
	exit(2);
}
$dbh = null;
?>