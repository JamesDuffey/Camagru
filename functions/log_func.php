<?php
    function log_in() {
        include "../includes/connection.php";
        $u_username = $_POST['username'];
        $u_pass = hash('whirlpool', $_POST['password']);
        $get_data = $con->prepare("SELECT * FROM users WHERE username=:username");
        $get_data->execute(['username' => $u_username]);
        $user_data = $get_data->fetch();
        if ($user_data['verified'] == 0){
            echo "<script>window.alert('Your account has not been verfied yet! Please check your email to verify your account!')</script>";
        }
        else if (empty($user_data) || $u_username != $user_data['username'] || $u_pass != $user_data['userpass']) {
            echo "<script>window.alert('Incorrect username or password!')</script>";
        }

        else if ($u_username == $user_data['username'] && $u_pass == $user_data['userpass']) {
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['username'] = $u_username;
            $_SESSION['notif'] = $user_data['notif'];
            echo "<script>window.alert('Logged In')</script>";
            echo "<script>window.location.replace('../index.php')</script>";
        }
    }
    $con = null;
?>