<?php
function update_pass($new_pass, $vkey) {
    include 'includes/connect.php';
    $u_email = $_POST['user_email'];
    $get_data = $con->prepare("SELECT * FROM users WHERE user_email=?");
    $get_data->execute([$u_email]);
    $user_data = $get_data->fetch();
    if ($vkey != $user_data['token']) {
        echo "window.alert('Hol\' up. It wasn't you who reset the password, was it?')";
        exit();
    }
    $update = $con->prepare("UPDATE users SET user_passwd=:new_pass WHERE user_email=:u_email");
    if ($update->execute(array(':new_pass'=>$new_pass, ':u_email'=>$u_email)))
        return true;
    else
        return false;
}
?>