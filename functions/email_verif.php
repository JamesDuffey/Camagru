<?PHP
    function email_verif($u_email, $vkey) {
        $subject = "Activate your Camagru account.";
	    $body = "Please click <a href='http://localhost:8080/Camagru/client/verify_email.php?ver_key=".$vkey."'>here</a> to activate your account.";
	    $headers = "From: camagru@gmail.com\r\n";
	    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	    if (mail($u_email,$subject,$body,$headers))
		    return true;
	    else
		    return false;
    }
?>