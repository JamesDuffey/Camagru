<?php
function update_pass($new_pass, $vkey) {
    include 'includes/connect.php';
    $u_email = $_POST['email'];
    $get_data = $con->prepare("SELECT * FROM users WHERE email=?");
    $get_data->execute([$u_email]);
    $user_data = $get_data->fetch();
    if ($vkey != $user_data['vkey']) {
        echo "window.alert('Hol\' up. It wasn't you who reset the password, was it?')";
        exit();
    }
    $update = $con->prepare("UPDATE users SET userpass=:new_pass WHERE email=:u_email");
    $update->execute(array(':new_pass'=>$new_pass, ':u_email'=>$u_email));
}
?>