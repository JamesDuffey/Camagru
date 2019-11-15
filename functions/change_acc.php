<?PHP
function update_user($user_id) {
	include_once 'update_acc.php';
	if (isset($_POST['username'])) {
		include_once 'validation.php';
		validate_name($_POST['username']);
		update_username($user_id, $_POST['userame']);
	}
	if (isset($_POST['email'])) {
		include_once 'validation.php';
		validate_password($_POST['new_pass']);
		update_email($user_id, $_POST['new_email']);
	}
	if (isset($_POST['new_pass'])) {
		include 'validation.php';
		validate_password($_POST['new_pass']);
		update_pass($user_id, hash('whirlpool',$_POST['new_pass']));
	}
	if (isset($_POST['updt_notif'])) {
		$user = $_SESSION['user_id'];
		update_notify($user);
	}
	echo "<script>window.open('user_account.php', '_self')</script>";
}
?>