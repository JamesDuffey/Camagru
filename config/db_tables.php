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
      `vkey` VARCHAR(255) default 0 NOT NULL,
      `verified` BIT default 0 NOT NULL,
      `notif` BIT default 0 NOT NULL)";
      $con->exec($sql);


    $img = "CREATE TABLE IF NOT EXISTS images(
		`img_id` INT(100) AUTO_INCREMENT PRIMARY KEY,
		`u_id` INT(100) NULL REFERENCES users(user_id),
		`img_name` LONGTEXT,
		`date_created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
    $con->exec($img);

    $comments = "CREATE TABLE IF NOT EXISTS comments(
      `c_id` INT(100) AUTO_INCREMENT PRIMARY KEY,
      `c_img_id` INT(100) NOT NULL REFERENCES images(img_id),
      `c_uid` INT(100) NOT NULL REFERENCES users(user_id),
      `comment` TEXT(255) NOT NULL)";
    $con->exec($comments);

    $likes = "CREATE TABLE IF NOT EXISTS likes(
      `l_id` INT(100) AUTO_INCREMENT PRIMARY KEY,
      `l_img_id` INT(100) NOT NULL REFERENCES images(img_id),
      `l_uid` INT(100) NOT NULL REFERENCES users(user_id))";
    $con->exec($likes);

    }
    catch (PDOException $e) {
        return "Tables Error:" . $e->getMessage();
    }
    $con = null;
?>