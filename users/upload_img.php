<!DOCTYPE html>
<?php
include("config/dbcon.php");
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Camagru - User Account</title>
    <link rel="stylesheet" type="text/css" href="../index.css">
</head>
<body background="../background/dark-honeycomb.png">
     <header style="width: 100%; height: 10%;"><h1><a href="../index.php">Camagru</a><h1>
         <!-- <div><a style="float:right;"href="users/register.php">Register</a></div> -->
         <ul style="list-style-type:none; margin: 0; display: inline; padding: 0;">
         <li style="display: inline; float: left;"><a href="user_account.php" style="margin-left:20px;">Profile</a></li>
         <li style="display: inline; float: left;"><a href='../index.php?session_status=logout' style="margin-left:20px;">Log Out</a></li>
         </ul>
     </header>
    <section>
            <div style="text-align: center;">
             <h1 style="color: aqua; font-size:40px;">Update Profile</h1>
            </div>
    </section>
 <footer></footer>
</body>
</html>
<?PHP
if (isset($_GET['session_status'])) {
    if($_GET['session_status'] == 'logout') {
        include 'functions/logout_func.php';
        log_out("user_account");
    }
}
?>