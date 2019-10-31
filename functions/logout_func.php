<?PHP
function log_out($page){
	if ($_GET['session_status'] == "logout") {
		session_destroy();
		if ($page == "my_account" || $page == "verify_email") {
			echo "<script>window.open('../index.php', '_self')</script>";
		}
		else if ($page == "index") {
			echo "<script>window.open('../index.php', '_self')</script>";
		}
	}
}
?>