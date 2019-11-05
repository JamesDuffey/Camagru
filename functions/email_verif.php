<?PHP
    function email_verif($email, $user, $key) {
        $subject = "Activate your Camagru account.";
	    $body = "Welcome ".$user."\n\nPlease click here to activate your account.\nhttp://localhost:8080/Camagru/users/email_verified.php?ver_key=".$key;
	    $headers = "From: camagru@gmail.com\r\n";
	    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	    mail($email,$subject,$body," ");
    }
?>