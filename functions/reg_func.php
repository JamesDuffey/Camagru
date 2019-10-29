<?php
    function register() {
        include '../includes/connection.php';
        $u_name = $_POST['names'];
        $u_surname = $_POST['surname'];
        $u_uname = $_POST['username'];
        $u_email = $_POST['email'];
        $u_pass = hash('whirlpool', $_POST['userpass']);

        $sql = $con->prepare("INSERT INTO users ('name', surname, username, email, userpass) values (?,?,?,?,?)");
        // $stmt = $con->prepare($sql);
        $sql = $con->execute($u_name, $u_surname, $u_uname, $u_email, $u_pass);
        
        // if ($stmt);
        echo "<script>window.alert('Registered!')</script>";
    }
    $con = null;
?>