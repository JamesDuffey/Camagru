<?php
    function register() {
        include '../includes/connection.php';
        $u_name = $_POST['names'];
        $u_surname = $_POST['surname'];
        $u_uname = $_POST['username'];
        $u_email = $_POST['email'];
        $u_pass = hash('whirlpool', $_POST['userpass']);
       
        $sql = ("INSERT INTO users (`name`, `surname`, `username`, `email`, `userpass`) values (:u_name,:u_surname,:u_uname,:u_email,:u_pass)");
        $reg_data = $con->prepare($sql);
        $reg_data->execute(array(':u_name'=>$u_name, ':u_surname'=>$u_surname, ':u_uname'=>$u_uname, ':u_email'=>$u_email, ':u_pass'=>$u_pass));
        mail($u_email, "pew", "pew", "pew");
        echo "<script>window.alert('Registered!')</script>";
    }
    $con = null;
?>