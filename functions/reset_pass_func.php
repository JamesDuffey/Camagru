<?PHP
function reset_pass($new_pass, $ver_key, $u_email) {
    include '../includes/connection.php';
	$get_data = $con->prepare("SELECT * FROM users WHERE email=:u_email");
	$get_data->execute(array(':u_email'=>$u_email));
    $user_data = $get_data->fetch();
	if ($ver_key != $user_data['vkey']) {
		echo "window.alert('verification key doesn't match')";
		exit();
    }
    else {
	 $update = $con->prepare("UPDATE users SET userpass=:new_pass WHERE email=:u_email");
     $update->execute(array(':new_pass'=>$new_pass, ':u_email'=>$u_email));
     echo "<script>window.alert('Your password has been reset. Please log in.')</script>";
     echo "<script>window.open('login.php', '_self')</script>";
    }
    }
    ?>