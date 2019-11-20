<!DOCTYPE html>
<?php
include("../config/dbcon.php");
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Camagru - Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="../index.css">
</head>
<body background="../background/rubber_grip.png">
     <header><h1><a href="../index.php">Camagru</a><h1>
     </header>
    <section>
    <div class="reg">
                    <form action="" method="post">
                        <h2 class="text">Email</h2>
                        <div class="form-group">
                            <input size="25" type="text" name="email" class="form-control"/>
                        </div>
                        <h2 class="text">New Password</h2>
                        <div class="form-group">
                            
                            <input type="password" name="new_pass" class="form-control"/>
                        </div>
                        <div class="form-pass">
                            <br/>
                           <input type="submit" name="reset_pass" style="background: transparent; color:aqua; border-color: aqua; font-size:17px; margin-top: 1%;" value="Change Password"/>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['reset_pass'])){
                       include '../functions/reset_pass_func.php';
                       include '../functions/validation.php';
                       $ver_key = $_GET['ver_key'];
                       $u_email = $_POST['email'];
                       $new_pass = hash('whirlpool', $_POST['new_pass']);
                       reset_pass($new_pass, $ver_key, $u_email);
					}
				    ?>
                </div>
            </div>
    </section>
 <footer></footer>
</body>
</html>