<?php
    include '../config/dbcon.php';

    function register() {
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