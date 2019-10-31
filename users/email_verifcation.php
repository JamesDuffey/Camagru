<!DOCTYPE html>
<?php
include("../config/dbcon.php");
session_start();
?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Camagru - Login</title>
    <link rel="stylesheet" type="text/css" href="../index.css">
</head>
<body background="../background/dark-honeycomb.png">
<header><h1><a href="../index.php">Camagru</a><h1>
         <div><a style="float:right;"href="register.php">Register</a></div>
     </header>
    <section>
            <div class="reg">
                    
                    <?php
					if (isset($_POST['login'])) {
                        include("../functions/log_func.php");
                        log_in();
                        echo "<script>window.location.replace('localhost:8080/Camagru/users/login.php')</script>";
					}
				    ?>
                </div>
            </div>
    </section>
 <footer></footer>
</body>
</html>
<?PHP
if (isset($_GET['session_status'])) {
	log_out("index");
}
?>