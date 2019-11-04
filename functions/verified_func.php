<?php
function verify()
{
    include '../includes/connection.php';
    if (isset($_GET['ver_key'])) {
        $get_user = $con->prepare("SELECT * FROM users WHERE token=?");
        $get_user->execute([$_GET['ver_key']]);
        $user_data = $get_user->fetch();
        print_r($user_data);
        if ($user_data['verified'] == 1) {
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['user_id'] = $user_data['user_id'];
            echo "<p style=\"color:aqua; font-size:20px; margin-top: 10%\">Your Account has already been verified before, please proceed to the login page.</p>";
            echo '<a href="../users/login.php">';
            return true;
        } else {
            $u_email = $user_data['email'];
            $ver_key = $user_data['vkey'];
            $update = $con->prepare("UPDATE users SET verified=1 WHERE email=?");
            $update->execute([$u_email]);
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['user_id'] = $user_data['user_id'];
            echo "<p style=\"color:aqua; font-size:20px; margin-top: 10%\">Your Account has been verified. You may now login!</p>";
            echo '<a href="../users/login.php"</a>';
            return true;
        }
    } else {
        echo "<p style=\"color:aqua; font-size:20px; margin-top: 10%\">No verification code found! Please click the link in your email!</p>";
        return false;
    }
}
?>