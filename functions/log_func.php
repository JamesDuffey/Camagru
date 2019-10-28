<?php
    

    function log_in() {
        include '../config/dbcon.php';
        $u_username = $_POST['username'];
        $u_pass = hash('whirlpool', $_POST['userpass']);
        $get_data = $con->prepare("SELECT * FROM users WHERE username=?");
        $get_data->execute([$u_username]);
        $user_data = $get_data->fetch();
        if (empty($user_data) || $u_username != $user_data['username']) {
            echo "<script>window.alert('Incorrect username or password!)</script>";
        }
        else{
            echo "<script>window.alert('Logged In!)</script>";
        }

        if ($u_username == $user_data['username'] && $u_pass == $user_data['userpass']) {
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['user_id'] = $user_data['user_id'];
            $_SESSION['username'] = $u_username;
            echo "<script>window.open('Logged In')</script>";
        }
    }
    $con = null;
?>