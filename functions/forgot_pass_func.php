<?PHP
function reset_passwd() {
    include '../includes/connection.php';
    $u_email = $_POST['user_email'];
    $get_udata = $con->prepare("SELECT * FROM users WHERE user_email=?");
    $get_udata->execute([$u_email]);
    $user_data = $get_udata->fetch();
    // if (verif_user($user_data['user_id'])) {
    $ver_code = hash('whirlpool', time().$u_email);
    $updt_verif = $con->prepare('UPDATE users SET token=:ver_code WHERE user_email=:u_email');
    $updt_verif->execute(array(':ver_code'=>$ver_code, ':u_email'=>$user_data['user_email']));
    $subject = "Reset your password with Camagru.";
    $body = "Forgot your password, did you? Please click <a href='http://localhost:8080/Camagru/passwd_reset.php?ver_key=".$ver_code."'>here</a> to reset your password.\r\nIf this wasn't you, call the internet police.";
    $headers = "From: camagru.rigardt@gmail.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    if (mail($u_email,$subject,$body,$headers)) {
        return true;
    }
    return false;
    }
?>