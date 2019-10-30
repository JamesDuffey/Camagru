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
         <div><a style="float:right;"href="register.php">Register</a></div>
     </header>
    <section>
            <div class="reg">
                    
                    <form name="register" action="register.php" method="post" enctype="multipart/form-data">
                        <h2 class="text">Name</h2>
                        <div class="form-group">
                            
                                <input type="text" name="names" class="form-control"/>
                            </div>
                            <h2 class="text">Surname</h2>
                            <div class="form-group">
                                
                                    <input type="text" name="surname" class="form-control"/>
                                </div>
                        <h2 class="text">Username</h2>
                        <div class="form-group">
                            
                                <input type="text" name="username" class="form-control"/>
                            </div>
                        <h2 class="text">Email</h2>
                        <div class="form-group">
                            <input size="25" type="email" name="email" class="form-control"/>
                        </div>
                        <h2 class="text">Password</h2>
                        <div class="form-group">
                            
                            <input type="password" name="password" class="form-control"/>
                        </div>
                        <div class="form-group">
                           <input type="submit" name="register" id="log_but" value="Register"/>
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['register'])) {
                        include '../functions/reg_func.php';
                        register();
                     }
                    ?>
                </div>
            </div>
    </section>
 <footer></footer>
</body>
</html>