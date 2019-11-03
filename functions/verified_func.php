<?php
function verify()
{
    include '../includes/connection.php';
    if (isset($_GET['ver_key'])) {
        $get_user = $con->prepare("SELECT * FROM users WHERE token=?");
        $get_user->execute([$_GET['ver_key']]);
        $user_data = $get_user->fetch();
        if ($user_data['verified'] == 1) {
            $_SESSION['user_name'] = $user_data['user_name'];
            $_SESSION['user_email'] = $user_data['user_email'];
            $_SESSION['user_id'] = $user_data['user_id'];
            echo "<p style=\"color:aqua; font-size:20px; margin-top: 10%\">Your Account has already been verified before, please proceed to the login page.</p>";
            echo '<a href="../users/login.php">';
        } else {
            $u_email = $user_data['user_email'];
            $ver_key = $user_data['token'];
            $update = $con->prepare("UPDATE users SET verified=1 WHERE user_email=?");
            $update->execute([$u_email]);
            $_SESSION['user_name'] = $user_data['user_name'];
            $_SESSION['user_email'] = $user_data['user_email'];
            $_SESSION['user_id'] = $user_data['user_id'];
            echo "<p style=\"color:aqua; font-size:20px; margin-top: 10%\">Your Account has been verified. You may now login!</p>";
            echo '<a href="../users/login.php"</a>';
        }
    } else {
        echo "<p style=\"color:aqua; font-size:20px; margin-top: 10%\">No verification code found! Please click the link in your email!</p>";
    }
}
?>