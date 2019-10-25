<?PHP
include 'db_con.php';
try {
        $con = new PDO($dsn.";dbname=".$db, $username, $passwd);
	    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "CREATE TABLE IF NOT EXISTS $table(
            `user_id` INT(100) AUTO_INCREMENT PRIMARY KEY,
            `username` VARCHAR(255) NOT NULL,
            `userpass` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `userpass` VARCHAR(255) NOT NULL,
            `user_image` VARCHAR(255),
            `vkey` VARCHAR(255) NOT NULL,
            `verified` BIT default 0 NOT NULL)";

    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
    $con = null;
?>