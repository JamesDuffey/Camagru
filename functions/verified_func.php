<?php
function verify()
{
    include '../includes/connection.php';
    if (isset($_GET['ver_key'])) {
        
        $get_user = $con->prepare("SELECT * FROM users WHERE vkey=?");
        $get_user->execute([$_GET['ver_key']]);
        $user_data = $get_user->fetch();
        if ($user_data['verified'] == 1) {
            echo "<p style=\"color:aqua; font-size:20px; margin-top: 10%\">Your Account has already been verified before, please proceed to the login page.</p>";
            echo '<a href="../users/login.php">';
        } else if ($user_data){
            $u_email = $user_data['email'];
            $ver_key = $user_data['vkey'];
            $update = $con->prepare("UPDATE users SET verified=1 WHERE email=?");   
            $update->execute([$u_email]);
            echo "<p style=\"color:aqua; font-size:20px; margin-top: 10%\">Your Account has been verified. You may now login!</p>";
            echo '<a href="../users/login.php"</a>';
        }
        else if (!$user_data)
        {
            echo "<p style=\"color:aqua; font-size:20px; margin-top: 10%\">No Account could be found</p>";
        }
    } else {
        echo "<p style=\"color:aqua; font-size:20px; margin-top: 10%\">No verification code found! Please click the link in your email!</p>";
    }
}
?>