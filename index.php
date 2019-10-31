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
     <header>
         
       <h1><a href="index.php">Camagru</a><h1>
         <ul style="list-style-type:none; margin: 0; display: inline; padding: 0;">
         <li style="display: inline; float: left;"><a style="float:right;"href="users/register.php" style="margin-left:20px;">Register</a></li>
         <script>
             if ($_SESSION) {
                <li style="display: inline; float: left;"><a href='index.php?session_status=logout' style="margin-left:20px;">Log Out</a><li>
             }
         </script>
        </ul>
     </header>
    <section>
            <div class="reg">
             <h1 style="color: aqua; font-size:40px;">Welcome To Camagru</h1>
                <?PHP
                if ($_SESSION){
                 echo '<script><a href="users/login.php" id="login_but">Login</a></script>';
                }
             ?>
                </div>
    </section>
 <footer></footer>
</body>
</html>
<?PHP
if (isset($_GET['session_status'])) {
    if($_GET['session_status'] == 'logout') {
        include 'functions/logout_func.php';
        log_out("index");
    }
}
?>