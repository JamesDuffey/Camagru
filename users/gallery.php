<!DOCTYPE html>
<?php
include("../config/dbcon.php");
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Camagru - Home</title>
    <link rel="stylesheet" type="text/css" href="../index.css">
</head>
<body background="../background/dark-honeycomb.png">
<div>
     <header>
         
       <h1><a href="../index.php">Camagru</a><h1>
         <ul style="list-style-type:none; margin: 0; display: inline; padding: 0;">
            <?PHP
                if (isset($_SESSION['user_id'])){
                    echo '<li style="display: inline; float: left; margin-right:20px;"><a href="user_account.php" style="margin-left:20px;">Profile</a></li>';
                }
            
                if (!isset($_SESSION['user_id'])){
                    echo '<li style="display: inline; float: left;"><a shref="register.php" style="margin-left:20px;">Register</a></li>';
                }
            
                if (isset($_SESSION['user_id'])){
                    echo '<li style="display: inline; float: left;"><a href="upload_img.php" style="margin-left:20px;">Upload</a></li>';
                }
            
                if (isset($_SESSION['user_id'])) {
                    echo '<li style="display: inline; float: left;"><a href="../index.php?session_status=logout" style="margin-left:20px;">Log Out</a><li>';
                }
             ?>
        </ul>
        
     </header>
     </div>
    <section>
            <div class="reg">
             
                <?PHP
                    include "../functions/get_gallery.php";
                    get_gallery();
                ?>
                </div>
    </section>
 <footer></footer>
</body>
</html>
<?PHP
if (isset($_GET['session_status'])) {
    if($_GET['session_status'] == 'logout') {
        include '../functions/logout_func.php';
        log_out("index");
    }
}
?>