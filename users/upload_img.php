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
            <h1 style="color: aqua; font-size:40px;">Upload Image</h1>
        </div>
        <div class="reg">
        <form action="" method="POST" enctype=multipart/form-data>
			<input name="upl_image" id="upl_image" type="file" style="background: transparent; color:aqua; border-color: aqua; font-size:17px; margin-top: 1%;">
			<input class="button" name="upload" type="submit" value="Upload Picture" style="background: transparent; color:aqua; border-color: aqua; font-size:17px; margin-top: 1%;">
	    </form>
        </div>
    </section>
 <footer></footer>
</body>
</html>
<?php
if (isset($_POST['upload'])){
    if (isset($_FILES['upl_image']['name'])){
        include '../functions/upload.php';
        upload_image($_SESSION['user_id']);
    }
}
?>
}