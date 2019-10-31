<?php
    function register() {
        include '../includes/connection.php';
        $u_name = $_POST['names'];
        include 'validation.php';
        validate_name($u_name);
        $u_surname = $_POST['surname'];
        validate_surname($u_surname);
        $u_uname = $_POST['username'];
        $u_email = $_POST['email'];
        validate_email($u_email);
        validate_password($_POST['password']);
        $u_pass = hash('whirlpool', $_POST['password']);
        $vkey = hash('whirlpool', $username.$_POST['password']);

       
        $sql = ("INSERT INTO users (`name`, `surname`, `username`, `email`, `userpass`, `vkey`) values (:u_name,:u_surname,:u_uname,:u_email,:u_pass,:vkey)");
        $reg_data = $con->prepare($sql);
        $reg_data->execute(array(':u_name'=>$u_name, ':u_surname'=>$u_surname, ':u_uname'=>$u_uname, ':u_email'=>$u_email, ':u_pass'=>$u_pass, ':vkey'=>$vkey));
        
        echo "<script>window.alert('Registered!')</script>";
        $con = null;
    }
?>