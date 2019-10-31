<!DOCTYPE html>
<?php
include("../config/dbcon.php");
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Camagru - Register</title>
    <link rel="stylesheet" type="text/css" href="../index.css">
</head>
<body background="../background/dark-honeycomb.png">
     <header><h1><a href="../index.php">Camagru</a><h1>
     </header>
    <section>
            <div class="reg">
                    
                    <form name="register" action="forgot_pass.php" method="post" enctype="multipart/form-data">
                        <h2 class="text">Email</h2>
                        <div class="form-group">
                            <input size="25" type="text" name="email" class="form-control"/>
                        </div>
                        <h2 class="text">Password</h2>
                        <div class="form-group">
                            
                            <input type="password" name="password" class="form-control"/>
                        </div>
                        <div class="form-group">
                           <input type="submit" name="forgot_pass" id="log_but" value="Register"/>
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['forgot_pass'])) {
                        include '../functions/forgot_pass_func.php';
                        register();
                        //echo '<script>window.location.href="email_verifcation.php";</script>';
                     }
                    ?>
                </div>
            </div>
    </section>
 <footer></footer>
</body>
</html>