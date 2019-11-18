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
         <li style="display: inline; float: left; padding-right: 20px;"><a style="float:right;" href="gallery.php" style="margin-left:20px;">Gallery</a></li>
         <li style="display: inline; float: left; padding-right: 20px;"><a style="float:right;"href="upload_img.php" style="margin-left:20px;">Upload</a></li>
         <li style="display: inline; float: left;"><a href='../index.php?session_status=logout' style="margin-left:20px;">Log Out</a></li>
         </ul>
     </header>
    <section>
            <div style="text-align: center;">
             <h1 style="color: aqua; font-size:40px;">User Account</h1>
             <?PHP

            if (isset($_SESSION['user_id'])){
                include_once 'change_acc.php';
            }
            if (isset($_POST['username']) || isset($_POST['email']) || isset($_POST['updt_pass']) || isset($_POST['updt_notif'])){
                include '../functions/change_acc.php';
                update_user($_SESSION['user_id']);
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
        log_out("user_account");
    }
}
?>