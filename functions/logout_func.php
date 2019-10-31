<?PHP
function log_out($page){
	if ($_GET['session_status'] == "logout") {
		session_destroy();
		if ($page == "user_account") {
			echo "<script>window.open('../index.php', '_self')</script>";
		}
		else if ($page == "index") {
			echo "<script>window.open('index.php', '_self')</script>";
		}
	}
}
?>