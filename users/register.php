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
                            
                                <input type="text" name="Name" class="form-control"/>
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
                            <input size="25" type="text" name="email" class="form-control"/>
                        </div>
                        <h2 class="text">Password</h2>
                        <div class="form-group">
                            
                            <input type="password" name="password" class="form-control"/>
                        </div>
                        <div class="form-group">
                           <input type="submit" name="register" id="log_but" value="Register"/>
                        </div>
                    </form>
                </div>
            </div>
    </section>
 <footer></footer>
</body>
</html>

<?php
include '../functions/reg_func.php';
    if(isset($_POST['register'])) {
        global $con;
        $u_name = $_POST['name'];
        $u_surname = $_POST['surname'];
        $u_uname = $_POST['username'];
        $u_email = $_POST['email'];
        $u_pass = hash('whirlpool', $_POST['userpass']);
        
        $sql = "INSERT INTO users (`name`, `surname`, `username`, `email`, `userpass`) values ('$u_name', '$u_surname', '$u_uname', '$u_email', '$u_pass')";
        $con->exec($sql);
    
    }
?>