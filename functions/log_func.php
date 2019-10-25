<?php
    include '../config/dbcon.php';

    function register() {
        global $con;
        $u_email = $_POST['email'];
        $u_pass = hash('whirlpool', $_POST['userpass']);
        $get_data = $con->prepare("SELECT * FROM users WHERE email=?")
        $get_data->execute([$email]);
        $user_data = $get_data->fetch();
        if (empty($user_data) || $u_email != $user_data['email'] || $u_pass != $user_data['userpass']) {
            echo "<script>window.alert('Incorrect password or email!)</script>";
        }

        if ($u_email == $user_data['email'] && $u_pass == $user_data['userpass']) {
            $_SESSION['email'] = $u_email;
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['username'] = $get_data->fetch();
            echo "<script>window.open('$u_email Logged In')</script>";
        }
    }
    
?>