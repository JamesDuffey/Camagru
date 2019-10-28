<?PHP
include 'dbcon.php';

$table = "users";

try {
        $con = new PDO($db_dsn.";dbname=".$db_name, $db_user, $db_pass);
	    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "CREATE TABLE IF NOT EXISTS $table(
            `user_id` INT(100) AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(255) NOT NULL,
            `surname` VARCHAR(255) NOT NULL,
            `username` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `userpass` VARCHAR(255) NOT NULL,
            `user_image` VARCHAR(255),
            `vkey` VARCHAR(255) NOT NULL,
            `verified` BIT default 0 NOT NULL)";
            $con->exec($sql);

    } catch (PDOException $e) {
        return " Tables Error:" . $e->getMessage();
        die();
    }
    $con = null;
?>