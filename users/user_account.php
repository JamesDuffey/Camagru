<!DOCTYPE html>
<?php
include("config/dbcon.php");
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Camagru - Home</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body background="background/dark-honeycomb.png">
     <header><h1><a href="index.php">Camagru</a><h1>
         <!-- <div><a style="float:right;"href="users/register.php">Register</a></div> -->
         <div><a style="float:left" href='index.php?session_status=logout'>Log Out</a></div>
     </header>
    <section>
            <div class="reg">
             <h1 style="color: aqua; font-size:40px;">User Account</h1>
            </div>
    </section>
 <footer></footer>
</body>
</html>