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
     <header>
         
       <h1><a href="../index.php">Camagru</a><h1>
         <ul style="list-style-type:none; margin: 0; display: inline; padding: 0;">
         <li style="display: inline; float: left; padding-right: 20px;"><a style="float:right;" href="gallery.php" style="margin-left:20px;">Gallery</a></li>
            <?PHP
                if (isset($_SESSION['user_id'])){
                    echo '<li style="display: inline; float: left; margin-right:20px;"><a style="float:right;"href="user_account.php" style="margin-left:20px;">Profile</a></li>';
                }
            ?>
            <?PHP
                if (!isset($_SESSION['user_id'])){
                    echo '<li style="display: inline; float: left;"><a style="float:right;"href="register.php" style="margin-left:20px;">Register</a></li>';
                }
            ?>
            <?PHP
                if (isset($_SESSION['user_id'])){
                    echo '<li style="display: inline; float: left;"><a style="float:right;"href="upload_img.php" style="margin-left:20px;">Upload</a></li>';
                }
            ?>
             <?PHP
             if (isset($_SESSION['user_id'])) {
                echo '<li style="display: inline; float: left;"><a href="../index.php?session_status=logout" style="margin-left:20px;">Log Out</a><li>';
              }
             ?>
        </ul>
     </header>
    <section>
            <div class="reg">
             <?PHP
                include '../functions/get_img.php';
                include '../functions/delete_img.php';

                // if (isset($_POST['like'])) {
                //     post_like($_GET['img']);
                // }
                // if (isset($_POST['apathy'])) {
                //     delete_like($_GET['img']);
                // }
                // if (isset($_POST['comment'])) {
                //     post_comment($_GET['img']);
                // }
                if (isset($_POST['delete_post'])) {
                    delete_img($_GET['img']);
                }
                get_image($_GET['img']);
            ?>
            <form method="POST">
                                <?php
                                include '../functions/like_funcs.php';
                                include '../functions/check_user_id.php';
								echo "<div class='level'>";
									if (!post_is_liked($_GET['img'])) {
										echo "<div class='level-left'><input class='button is-light' type='submit' name='like' value='Like'></div><br/>";
									} else {
										echo "<div class='level-left'><input class='button is-success' type='submit' name='apathy' value='Liked'></div><br/>";
									}
									if (check_user_id($_GET['img'])) {
										echo "<div class='level-right'><input class='button is-danger' type='submit' name='delete_post' value='Delete'></div>";
									}
								echo "</div>";
								?>
								<input class="textarea" type="text" name="cmntContent" placeholder="Leave a comment..">
								<div class="field is-grouped is-grouped-right">
                                    <br/>
									<input class="button is-success" type="submit" name="comment" value="Comment">
								</div>
							</form>
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