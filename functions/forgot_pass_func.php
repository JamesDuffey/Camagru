<?PHP
function forgot_pass() {
   include '../includes/connection.php';
    $u_email = $_POST['email'];
    $get_data = $con->prepare("SELECT * FROM users WHERE email=?");
    $get_data->execute([$u_email]);
    $user_data = $get_data->fetch();
    if (!$user_data) {
        echo "<script>window.alert('User does not exists!')</script>";
        exit();
    }
    $ver_key = hash('whirlpool', time().$u_email);
    $update = $con->prepare('UPDATE users SET vkey=:ver_key WHERE email=:u_email');
    $update->execute(array(':ver_key'=>$ver_key, ':u_email'=>$user_data['email']));
    $subject = "Reset your Camagru password";
    $body = "Greetings from Camagru "."\n\n"."To reset your password please click <a href='http://localhost:8080/Camagru/users/reset_pass.php?ver_key=".$ver_key."'>Here</a>";
    $headers = "From: camagru@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0"."\r\n";;
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    mail($u_email,$subject,$body,$headers);
}
?>