<?PHP
function update_user($user_id) {
	if (isset($_POST['username'])) {
		validate_name($_POST['username']);
		update_name($user_id, $_POST['userame']);
	}
	if (isset($_POST['new_pass'])) {
		validate_password($_POST['new_pass']);
		update_passwd($user_id, hash('whirlpool',$_POST['new_pass']));
	}
	if (isset($_POST['updt_notif'])) {
		$user = $_SESSION['user_id'];
		update_notify($user);
	}
	echo "<script>window.open('user_account.php', '_self')</script>";
}
?>