<?PHP
function update_username($user_id, $new_name) {
    include '../includes/connection.php';
		$updt_sql = "UPDATE users SET username=:u_name WHERE user_id=:u_id";
		$updt_name = $con->prepare($updt_sql);
		$updt_name->execute(array(':u_name'=>$new_name, ':u_id'=>$user_id));
		$_SESSION['username'] = $new_name;
}

function update_email($user_id, $new_email) {
    include '../includes/connection.php';
		$_SESSION['email'] = $new_email;
		$updt_sql = "UPDATE users SET email=:u_email WHERE user_id=:u_id";
		$updt_email = $con->prepare($updt_sql);
		$updt_email->execute(array(':u_email'=>$new_email, ':u_id'=>$user_id));
}

function update_pass($user_id, $new_pass) {
	include '../includes/connection.php';
		$updt_sql = "UPDATE users SET userpass=:u_pass WHERE user_id=:u_id";
		$updt_passwd = $con->prepare($updt_sql);
		$updt_passwd->execute(array(':u_pass'=>$new_pass, ':u_id'=>$user_id));
}

 function update_notify($user_id) {
     include '../includes/connection.php';
 	if (isset($_POST['notif'])) {
 		$updt_sql = "UPDATE users SET notify=1 WHERE user_id=:u_id";
 		$updt_notif = $con->prepare($updt_sql);
 		$updt_notif->execute([':u_id'=>$user_id]);
 		$_SESSION['notif'] = 1;
 	} else {
 		$updt_sql = "UPDATE users SET notify=0 WHERE user_id=:u_id";
 		$updt_notif = $con->prepare($updt_sql);
 		$updt_notif->execute([':u_id'=>$user_id]);
 		$_SESSION['notif'] = 0;
 	}
 }
?>