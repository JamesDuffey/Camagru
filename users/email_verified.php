<!DOCTYPE html>
<?php
include("../config/dbcon.php");
session_start();
?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Camagru - Verified</title>
    <link rel="stylesheet" type="text/css" href="../index.css">
</head>
<body background="../background/dark-honeycomb.png">
<header><h1><a href="../index.php">Camagru</a><h1>
     </header>
    <section>
            <div class="reg">
            <?PHP
            include '../functions/verified_func.php';
            verify();
            ?>
                </div>
            </div>
    </section>
 <footer></footer>
</body>
</html>
