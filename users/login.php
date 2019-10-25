<!DOCTYPE html>
<?php
include("../config/dbcon.php");
?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Camagru - Login</title>
    <link rel="stylesheet" type="text/css" href="../index.css">
</head>
<body background="../background/dark-honeycomb.png">
<header><h1><a href="../index.php">Camagru</a><h1>
         <div><a style="float:right;"href="register.php">Register</a></div>
     </header>
    <section>
            <div class="reg">
                    <form name="login" action="login.php" method="post" enctype="multipart/form-data">
                        <h2 class="text">Email</h2>
                        <div class="form-group">
                            <input size="25" type="text" name="email" class="form-control"/>
                        </div>
                        <h2 class="text">Password</h2>
                        <div class="form-group">
                            
                            <input type="password" name="password" class="form-control"/>
                        </div>
                        <div class="form-group">
                           <input type="submit" name="login" id="log_but" value="Login"/>
                        </div>
                    </form>
                </div>
            </div>
    </section>
 <footer></footer>
</body>
</html>